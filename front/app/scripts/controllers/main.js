'use strict';

angular.module('frontApp').controller('MainCtrl', function ($scope, Player) {
    $scope.players = Player.query();

    $scope.saveScore = function(winner, looser) {
        if (angular.isObject(winner) && angular.isObject(looser)) {
            if (winner == looser) {
                console.log(alert('Arrêtes de jouer seul, serieux !'));
            }

            winner.score += 10;
            looser.score -= 20;

            Player.update(winner);
            Player.update(looser);
        }
    };

    $scope.createNew = function(player) {
        var p = angular.copy(player);
        p.score = 1000;
        
        $scope.players.push(p);

        Player.save(player);
        player.name = '';
    };
});
