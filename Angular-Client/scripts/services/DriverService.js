'use strict';
angular.module('Client')
	.factory('DriverResource',function ($resource) {
		return $resource("http://localhost:8000/drivers/:id",{id:"@id"},{update:{method:"PUT"}});
	});
