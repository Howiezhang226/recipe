<?php
include_once "resource/session.php";
$page_title = "User page";
include_once "partials/headers.php";
?>
<html>
	<body>
	<div class="container">
		
	</div>
	<div class = "row">
		<div class="col-md-3">
			Recipe Created by me:
			<ul class="recipe list-group"></ul>
		</div>
		<div class="col-md-3">
			Group Created by me:
			<ul class="group  list-group"></ul>
		</div>
		<div class="col-md-3">
			Meeting RSVP by me:
			<ul class="meeting  list-group"></ul>
		</div>
		<div class="col-md-3">
			Review post by me:
			<ul class="review  list-group"></ul>
		</div>
		<div class="col-md-3">
			Report post by me:
			<ul class="report  list-group"></ul>
		</div>
	</div>
	<hr/>
	<div>
		<a href="createRecipe.php" class="btn btn-primary pull-right">create recipe</a>
		<a href="createGroup.php" class="btn btn-primary pull-right">create group</a>
	</div>
	<hr/>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
		$.ajax({
				type: "GET",
				url: "user.php",
				success: function(data) {
					console.log(data);
					$(".container").append(
						$(document.createElement("h3"))
						.text("user name: " + data["user"][0]["uname"]));
					$(".container").append(
						$(document.createElement("h4"))
						.text("loggin name: " + data["user"][0]["uloginname"]));
					$(".container").append(
						$(document.createElement("h4"))
						.text("age: " + data["user"][0]["uage"]));
					$(".container").append(
						$(document.createElement("h4"))
						.text("gender: " + data["user"][0]["ugender"]));

					for (var i = 0; i < data["recipe"].length; i++) {
						$recipe = data["recipe"][i];
						$link = $(document.createElement("a"));
						$link.attr('href', "recipe-front.php");
						$link.attr('id', $recipe['rid']);
						$link.text($recipe['title']);
						$list = $(document.createElement("li")).addClass("list-group-item");
						$list.append($link);
						$(".recipe").append($list);
						$link.click(function() {
							$.ajax({
								type: "POST",
								url: "resource/set-session.php",
								data: {'rid': $(this).attr('id')},
								success: function(data) {
									console.log(data);
								},
								dataType: "json"
							});
						});
					}

					for (var i = 0; i < data["group"].length; i++) {
						$recipe = data["group"][i];
						$link = $(document.createElement("a"));
						$link.attr('href', "groups-front.php");
						$link.attr('id', $recipe['gid']);
						$link.text($recipe['gname']);
						$list = $(document.createElement("li")).addClass("list-group-item");
						$list.append($link);
						$(".group").append($list);
						$link.click(function() {
							$.ajax({
								type: "POST",
								url: "resource/set-session.php",
								data: {'gid': $(this).attr('id')},
								success: function(data) {
									console.log(data);
								},
								dataType: "json"
							});
						});
					}

					for (var i = 0; i < data["meeting"].length; i++) {
						$recipe = data["meeting"][i];
						$link = $(document.createElement("a"));
						$link.attr('href', "groups-front.php");
						$link.attr('id', $recipe['mholder']);
						$link.text($recipe['mname']);
						$list = $(document.createElement("li")).addClass("list-group-item");
						$list.append($link);
						$(".meeting").append($list);
						$link.click(function() {
							$.ajax({
								type: "POST",
								url: "resource/set-session.php",
								data: {'gid': $(this).attr('id')},
								success: function(data) {
									console.log(data);
								},
								dataType: "json"
							});
						});

					}

					for (var i = 0; i < data["review"].length; i++) {
						$review = data["review"][i];
						$link = $(document.createElement("a"));
						$link.attr('href', "recipe-front.php");
						$link.attr('id', $review['rid']);
						$link.text("review for " + $review['title']);
						$list = $(document.createElement("li")).addClass("list-group-item");
						$list.append($link);
						$(".review").append($list);
						$link.click(function() {
							$.ajax({
								type: "POST",
								url: "resource/set-session.php",
								data: {'rid': $(this).attr('id')},
								success: function(data) {
									console.log(data);
								},
								dataType: "json"
							});
						});

					}

					for (var i = 0; i < data["report"].length; i++) {
						$report = data["report"][i];
						$link = $(document.createElement("a"));
						$link.attr('href', "report-front.php");
						$link.attr('id', $report['mid']);
						$link.text("report for " + $report['mname']);
						$list = $(document.createElement("li")).addClass("list-group-item");
						$list.append($link);
						$(".report").append($list);
						$link.click(function() {
							$input = {
								uname : $report['uname'],
								mid : $report['mid']
							}
							$.ajax({
								type: "POST",
								url: "resource/set-session.php",
								data: {'report': $input},
								success: function(data) {
									console.log(data);
								},
								dataType: "json"
							});
						});

					}


				},
				error: function (textStatus, errorThrown) {
            		console.log(textStatus);
            		console.log(errorThrown);
        		},
				dataType: "json"
			});
		</script>
	<div class = "row" ng-app="userApp" ng-controller="recentCtrl" ng-init="getRecentActivity()">
	<div class="col-md-4">
		<h5>Recent 5 interested recipes</h5>
		<div ng-repeat="rec in results.recipe">
				<p class="list-group-item">recipe title :{{ rec.title }}</p>
		</div>
	</div>
	<div class="col-md-4">
			<h5>Recent 5 interested tags</h5>
		<div ng-repeat="rec in results.tags">
			<p class="list-group-item">tag name:{{ rec.tname }}</p>
		</div>
	</div>
	
	<div class="col-md-4">
		<h5>Recent 5 interested keywords</h5>
		<div ng-repeat="rec in results.search">
			<p class="list-group-item">keywords:{{ rec.keywords }}</p>
		</div>
	</div>	

	</div>
	<script>
		var app = angular.module('userApp', []);
		app.controller('recentCtrl', function($scope, $http) {
			$scope.getRecentActivity = function () {
				$http.get("recent.php").then(
					function (response) {
						$scope.results = response.data;
					});
			};
			$scope.addGroup = function (gid) {
				data = {
					'gid' : gid
				};
				$http.post('addGroup.php', data)
					.then(function (data) {
						console.log(data);
					},function (data) {
						console.log("error");
					});
			};

			$scope.searchGroup = function (gid) {
				data = {
					'gid' : gid
				};
				$http.post('resource/set-session.php', data)
					.then(function (data) {
						console.log(data);
						window.location.href='groups-front.php';
					},function (data) {
						console.log("error");
					});
			};
		})
	</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>