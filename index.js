angular.module('idx', []).controller("NavBarController", function NavBarController(scope) {
    scope.initialize = function () {
        console.log("called");
    }
    scope.data = "sda";
});
