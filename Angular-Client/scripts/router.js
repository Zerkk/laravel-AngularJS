'use strict';
angular.module('Client',['ngResource','ngRoute'])
	.config(function ($routeProvider) {
		$routeProvider
		.when('/drivers',{
			templateUrl:'views/driver/index.html',
			controller:'IndexDriverCtrl'
		})
		.when('/drivers/new',{
			templateUrl:'views/driver/create.html',
			controller:'CreateDriverCtrl'
		})
		.when('/drivers/edit/:id',{
			templateUrl:'views/driver/create.html',
			controller:'EditDriverCtrl'
		})
		.otherwise({
			redirectTo:'/'
		});
	});