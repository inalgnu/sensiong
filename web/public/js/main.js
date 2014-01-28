require.config({
   paths: {
       'angular'    : '../vendor/angular/angular',
       'uiRouter'  : '../vendor/angular-ui-router/release/angular-ui-router',
       'restangular': '../vendor/restangular/src/restangular',
       'underscore' : '../vendor/underscore/underscore'
   },
   shim: {
       'underscore': {
           exports: '_'
       },
       'angular': {
           exports: 'angular'
       },
       'uiRouter': {
           deps: ['angular']
       },
       'restangular': {
           exports: 'restangular',
           deps: ['angular', 'underscore']
       }
   }
});

define('app', ['angular', 'restangular', 'uiRouter'], function(angular) {
    return angular.module('app', ['restangular', 'ui.router'], function(){});
});

require([
        'angular',
        'app',
        'routing',
        'controllers/playerController',
        'services/playerService',
        'directives/playerDirective'
], function(angular, app) {
    angular.bootstrap(document, [app.name]);
});


