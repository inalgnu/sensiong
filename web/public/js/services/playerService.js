define(['app'], function(app){
    'use strict';

    app.factory('RestPlayer', function(Restangular) {
        return Restangular.all('players');
    });
});