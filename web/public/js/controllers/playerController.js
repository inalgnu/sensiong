define(['app'], function (app) {
    'use strict';

    app.controller('PlayerController', function ($scope, RestPlayer, players) {
        $scope.players = players;

        $scope.create = function(player) {
            player.score = 1000;
            $scope.players.push(angular.copy(player));

            RestPlayer.post(player).then(function(data) {
                player.name = '';
            });
        };

        $scope.saveScore = function(winner, looser) {
            winner.score += 10;
            looser.score -= 20;

            winner.put();
            looser.put();
        };
    });
});