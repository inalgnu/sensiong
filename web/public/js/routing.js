define(['app'], function (app) {
    app.config(function($stateProvider, $urlRouterProvider, RestangularProvider){
        RestangularProvider.setBaseUrl('/app_dev.php/api/');

        $urlRouterProvider.otherwise('/');

        $stateProvider.state('home', {
            url: '/',
            templateUrl: 'public/views/player.html',
            controller: 'PlayerController',
            resolve: {
                players: function(RestPlayer){
                    return RestPlayer.getList();
                }
            }
        })
    });
});