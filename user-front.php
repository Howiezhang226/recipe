<?php
include_once "resource/session.php";
$page_title = "User page";
include_once "partials/headers.php";
?>
<html>
	<body>
	<div class="container">
		
	</div>
	<div>
			Recipe Created by me:
			<ul class="recipe"></ul>
		</div>
		<div>
			Group Created by me:
			<div class="group"></div>
		</div>
		<div>
			Meeting RSVP by me:
			<div class="meeting"></div>
		</div>
	<div>
		<a href="createRecipe.php" class="btn btn-primary pull-right">create recipe</a>
		<a href="createGroup.php" class="btn btn-primary pull-right">create group</a>
	</div>	
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
						$list = $(document.createElement("li"));
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
						$list = $(document.createElement("li"));
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
						$link.attr('id', $recipe['mid']);
						$link.text($recipe['mname']);
						$list = $(document.createElement("li"));
						$list.append($link);
						$(".meeting").append($list);

					}


				},
				error: function (textStatus, errorThrown) {
            		console.log(textStatus);
            		console.log(errorThrown);
        		},
				dataType: "json"
			});
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>