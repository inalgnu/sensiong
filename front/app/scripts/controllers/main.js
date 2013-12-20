'use strict';

angular.module('frontApp').controller('MainCtrl', function ($scope, Player) {
    $scope.players = Player.query();

    $scope.updateScore = function(player, score) {
        if (angular.isObject(player)) {
            player.score += score;
            Player.update(player);
        }
    };

    $scope.saveScore = function(winner, looser) {
        $scope.updateScore(winner, 10);
        $scope.updateScore(looser, -20);
    };

    $scope.createNew = function(player) {
        Player.save(player, function(data){
            $scope.players.push(data);
            player.name = '';
        });
    };
});


