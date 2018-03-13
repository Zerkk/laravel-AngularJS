'use strict';
angular.module('Client')
	.controller('IndexDriverCtrl',function ($scope, DriverResource,$location,$timeout,$route) {
		$scope.Drivers=DriverResource.query();
		$scope.updateScore=function(id){
			var Driver=DriverResource.get({id:id},function(){
				var valueScore=Driver.score;

				Driver.score=valueScore+1;
				Driver.$update();

			});
			//$scope.Driver.score=$scope.Driver.score+1;
			//DriverResource.update($scope.Driver);
		
			$timeout(function(){
				$route.reload();
			},200);	
		};
		$scope.removeDriver= function(id){
			DriverResource.delete({
				id:id
			});
			
			$timeout(function(){
				$location.path('/drivers');
			},1000);
		};
	})
	.controller('CreateDriverCtrl',function ($scope, DriverResource,$location,$timeout) {
		$scope.title="Create new Driver";
		$scope.button="Save";
		$scope.Driver={};
		$scope.saveDriver=function(){
			DriverResource.save($scope.Driver);
		
			$timeout(function(){
				$location.path('/drivers');
			},1000);
		};
	})
		.controller('EditDriverCtrl',function ($scope, DriverResource,$location,$timeout,$routeParams) {
		$scope.title="Edit Driver";
		$scope.button="Update";
		$scope.Driver=DriverResource.get({id:$routeParams.id});
		$scope.saveDriver=function(){
			DriverResource.update($scope.Driver);
		
			$timeout(function(){
				$location.path('/drivers');
			},1000);
			
		};
	});