<?php session_start(); ?>
<!DOCTYPE html>
<html ng-app="auctionManager">
	<head>
		@include('../partials.meta')
		@include('../partials.assets')
		
        <title>{{config('app.name')}}</title>
        
	</head>
	<body ng-app="auction-manager">