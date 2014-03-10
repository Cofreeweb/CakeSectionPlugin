adminApp.controller( 'SectionsCtrl', function( $scope, $http, $rootScope) {
    $http.get('/rest/section/sections/get.json').success( function(data) {
      $scope.sections = data.sections;
      $rootScope.section = $scope.sections;
      $scope.options = {
        accept: function(data, sourceItemScope, targetScope) {
          // console.log("target level: " + targetScope.level());
          // console.log("parent data: ", targetScope.parentItemScope() ? targetScope.parentItemScope().itemData() : "null");
          return true;
        },
        orderChanged: function(scope, sourceItem, sourceIndex, destIndex) {
          $http.post( '/rest/section/sections/sort', {sections: scope.sections});
        },
        itemRemoved: function(scope, sourceItem, sourceIndex, destIndex) {
          $http.post( '/rest/section/sections/sort', {sections: scope.sections});
        }
      };
    });    
});

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