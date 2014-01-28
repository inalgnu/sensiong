define(['app'], function(app){
    app.directive('selectWinner', function() {
        return {
            restrict: 'E',
            template: '<div>'+
                '<select ng-model="winner" class="form-control" ng-options="player.name for player in players" required>'+
                '<option value="" disabled>Qui a gagné</option>'+
                '</select><br/>'+
                '</div>'
        }
        })
        .directive('selectLooser', function() {
            return {
                restrict: 'E',
                template: '<div>'+
                    '<select  ng-model="looser" class="form-control" ng-options="player.name for player in players" required>'+
                    '<option value="" disabled>Qui a perdu ?</option>'+
                    '</select>'+
                    '</div><br/>'
            }
        })
        .directive('acceptTerms', function(){
            return {
                restrict: 'E',
                template: '<div class="checkbox">'+
                    '<label>'+
                    '<input type="checkbox" ng-model="swear" required/>'+
                    'Je jure sur la tête de Fabien que je ne suis pas entrain de tricher.'+
                    '</label>'+
                    '</div>'
            }
        })
        .directive('submitScore', function(){
            return {
                restrict: 'E',
                template: '<div class="pull-right">'+
                    '<input type="submit" value="Valider ce résultat" class="btn btn-sm btn-success" ng-disabled="!swear" ng-click="saveScore(winner, looser)">'+
                    '</div>'
            }
        })
        .directive('panel', function(){
            return {
                restrict: 'E',
                transclude: true,
                scope: {
                    title: "@"
                },
                link: function(scope, element, attrs) {
                    scope.size = (attrs.size)? attrs.size : 4;
                },
                template: '<div class="col-md-{{ size }}">'+
                    '<div class="panel panel-default">'+
                    '<div class="panel-heading">'+
                    '<h4>{{title}}</h4>'+
                    '</div>'+
                    '<div class="panel-body">'+
                    '<div ng-transclude></div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
            }
        });
});