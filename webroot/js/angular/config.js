adminApp.config( ['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/sections/edit/:id', {
        templateUrl: '/angular/template?t=Section.sections/edit',
        controller: 'SectionsEditCtrl'
      }).
      when('/sections/add', {
        templateUrl: '/angular/template?t=Section.sections/add',
        controller: 'SectionsEditCtrl'
      })
  }
]);

adminApp.config(function($stateProvider) {
  $stateProvider
    .state( 'sections', {
      url: "/sections",
      views: {
        "sections": { 
          templateUrl: '/angular/template?t=Section.sections/index',
          controller: 'SectionsCtrl'
        }
      }
    })
});
