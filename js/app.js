(function() {
    var app = angular.module('trelloCMS', []);

    app.controller('TrelloController', ['$http', '$location', '$scope', function($http, $location, $scope) {
            var trello = this;

            trello.board = [];
            $http.get('trello.json').success(function(data) {
                trello.board = data;
                // For reasons i dont understand it gets called too often
                console.log(trello.board);
            });
            $scope.currList = function(lists) {
                console.log(lists);
                trello.currListId = $location.path().replace("/", "");
                lists.some(function(el) {
                    if (trello.currListId === el.id) {
                        trello.currListName = el.name;
                        // For reasons i dont understand it gets called too often
                        return true;
                    }
                });
                templateProposition =  'templates/' + trello.currListName + '.html';
                trello.currTemplate = pageExists(templateProposition) ? templateProposition : "templates/default.html";
            };
            function pageExists(url)
            {
                var http = new XMLHttpRequest();
                http.open('HEAD', url, false);
                http.send();
                return http.status != 404;
            }
        }]);
    app.directive("trelloMenu", function() {
        return {
            restrict: "E",
            templateUrl: "trello-menu.html"
        };
    });
})();
