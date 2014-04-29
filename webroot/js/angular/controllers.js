adminApp.controller( 'SectionsCtrl', function( $scope, $http, $rootScope) {
    $http.get('/admin/section/sections/index.json').success( function(data) {
      $scope.sections = data.sections;
      $rootScope.section = $scope.sections;
      
      $scope.selectedItem = {};

      $scope.treeOptions = {
        dragStop: function( event) {
          $http.post( '/admin/section/sections/sort.json', {sections: $scope.sections}).success( function( data){
            
          })
        },
      };

        
    });    
});

/**
*
* SectionsEditCtrl
*
* Edición de sección
*/
adminApp.controller( 'SectionsEditCtrl', function( $scope, $routeParams, $http) {
    $http.get('/rest/section/sections/get/' + $routeParams.id +'.json').success( function(data) {
      $scope.section = data.section;
      $scope.parents = data.parents;
      $scope.configs = data.configs;
    });
    
    $scope.config = function( config){
      console.log( config)
    }
    
    $scope.submit = function( action){
      $http.post( '/admin/section/sections/' + action + '.json', $scope.section).success( function( data){
          // Redirige a la página si se ha seteado redirect
          if( data.redirect) {
            window.location.href = data.redirect;
          }
      })
    }    
});

// Borrado de secciones
adminApp.run(function( $rootScope, $http){
  $rootScope.deleteSection = function(){
    $http.post( '/rest/section/sections/delete.json', {id: this.section.id})
  }
  
})