'use strict';

angular.module('frontApp', [
  'ngResource'
]).config(function ($routeProvider, $httpProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'views/main.html',
                controller: 'MainCtrl'
            })
            .otherwise({
                redirectTo: '/'
    });

    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

angular.module('frontApp')
    .factory('Player', function ($resource) {
        return $resource('http://sensiong.local/app_dev.php/players/:id', { id:'@id' }, {
            'update': { method: 'PUT', params: {id: '@id'} },
            'query' : { method: 'GET', isArray : true },
            'get'   : { method: 'GET', params: {id: '@id'} },
            'save'  : { method: 'POST' }
        })
    });
