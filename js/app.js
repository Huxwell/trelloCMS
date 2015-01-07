(function() {
    var app = angular.module('trelloCMS',[]);

    app.controller('TrelloController', ['$http', '$location', '$scope', function($http,$location,$scope) {
            var trello = this;
            this.currListId = $location.path();
            trello.board = [];
            
            $http.get('trello.json').success(function(data) {
                trello.board = data;
            });
            
            $scope.isActive = function(viewLocation) {
              return viewLocation === $location.path();  
            };
            
        }]);
    app.directive("trelloMenu", function() {
      return {
        restrict:"E",
        templateUrl: "trello-menu.html"
      };
    });
    app.directive("trelloList", function() {
      return {
        restrict:"E",
        templateUrl: "trello-list.html"
      };
    });

})();
