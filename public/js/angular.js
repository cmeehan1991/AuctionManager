var app = angular.module('auctionManager', ["ngRoute"]);

app.config(function($routeProvider, $locationProvider){
	$routeProvider
	.when('/', {
		templateUrl: 'http://localhost/auctionmanager/resources/views/page-templates/home.php',
		controller: 'DashboardController'
	})
	.when("/auction-manager", {
		templateUrl: "/auctionmanager/resources/views/page-templates/home.php",
		controller: "DashboardController"
	})
	.when("/auctions", {
		templateUrl: "/auctionmanager/resources/views/page-templates/auctions.php",
		controller: "DashboardController"
	})
	.when('/auction-items', {
		templateUrl: "/auctionmanager/resources/views/page-templates/auction-items.php",
		controller: "AuctionItemsController"
	})
	.when('/auction-items/edit/:id', {
		templateUrl: '/auctionmanager/resources/views/page-templates/auction-item.php',
		controller: 'AuctionItemController'
	})
	.when('/auction-items/edit', {
		templateUrl: '/auctionmanager/resources/views/page-templates/auction-item.php',
		controller: 'AuctionItemController'
	})
	.when('/auction-items/attendees', {
		templateUrl: '/auctionmanager/resources/views/page-templates/attendees.php', 
		controller: 'AuctionAttendeesController'
	})
	.otherwise('/');
});

app.controller('AuctionAttendeesController', function($scope){
	window.getAttendees();
});

app.controller('AuctionItemController', function($scope, $routeParams){
	console.log('auction item controller');
	console.log($routeParams.id);
	window.getSingleItem($routeParams.id);
})

app.controller("AuctionItemsController", function($scope){
	window.getItems();	
});

app.controller("DashboardController", function($scope){
	console.log('dashboard controller');
});