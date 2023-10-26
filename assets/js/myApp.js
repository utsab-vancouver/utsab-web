
(function(angular) {
  'use strict';
angular.module('myApp',['ngRoute'])
  .controller('myController', ['$rootScope','$scope', '$route', '$routeParams', '$location','$templateCache',function($rootScope,$scope, $route, $routeParams, $location,$templateCache) {
    /*
      location change handling
    */
    $scope.page     = 'pages/home.html';
    $scope.$on('$locationChangeStart', function(event) {

        console.log($location.hash());
        if($location.hash()==""){
            $scope.page     = 'pages/home.html';
        }else if($location.hash().indexOf("pages/")>=0){
            $scope.page = $location.hash();
        }
    });
    /* remove cache for ng-include directory
    */
    $scope.$on('$includeContentLoaded',function(event, templateName){
        $templateCache.remove(templateName);
     });
  }]);
})(window.angular);