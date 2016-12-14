<?php
include_once "resource/session.php";
$page_title = "main page";
include_once "partials/headers.php";
?>
<html>
	<body>
		<style>
			body {
			    margin: 0;
			}
			.navi-bar {
				list-style-type: none;
    			margin: 0;
    			padding: 0;
    			position: fixed;
			    top: 0;
			    width: 100%;
			}

			.navi-bar li {
				float: left;
			}

			.verti-bar {
				list-style-type: none;
			    margin-top: 2%;
			    padding: 0;
			    width: 10%;
			    background-color: #f1f1f1;
			    height: 100%; /* Full height */
			    position: fixed; /* Make it stick, even on scroll */
			    overflow: auto; /* Enable scrolling if the sidenav has too much content */
			}

			.verti-bar li {

			}

			#main-body {
				position: absolute;
				margin-top: 2%;
				margin-left: 10%;
			}
		</style>

			<ul class="navi-bar">
				<li><a herf="">Recent view</a></li>
				<li><a herf="">User</a></li>
			</ul>

			<ul class="verti-bar">
				<li>Groups</li>
			</ul>

			<div id="main-body">
				<ul class="recipes">
					
				</ul> 
				<ul class="meetings">
					
				</ul>
				<ul class="Group act">
					
				</ul>
			</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
			$.ajax({
				type: "GET",
				url: "main-page.php",
				success: function(data) {
					$recipeList = $(".recipes");
					$meetingsList = $(".meetings");
					$groups = $(".verti-bar");
					// $data = $.parseJSON(data);
					for (var i = 0; i < data["recipes"].length; i++) {
						var list = document.createElement("li");
						var link = document.createElement("a");

						$(link).attr('href', "recipe-front.php");
						$(link).text(data["recipes"][i]["title"]);

						$(list).append($(link));
						$(list).attr('id', data["recipes"][i]["rid"]);

						$recipeList.append($(list));

						$(list).click(function() {
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
					for (var i = 0; i < data["meetings"].length; i++) {
						var list = document.createElement("li");
						$(list).text(data["meetings"][i]["uname"] + " rsvp to " + data["meetings"][i]["mname"]);
						$(list).attr('id', data["meetings"][i]["mid"]);
						$meetingsList.append($(list));

						$(list).click(function() {
							console.log(this);
						});
					}
					for (var i = 0; i < data["groups"].length; i++) {
						var list = document.createElement("li");
						$(list).text(data["groups"][i]["gname"]);
						$(list).attr('id', data["groups"][i]["gid"]);
						$groups.append($(list));
						$(list).click(function() {
							console.log(this);
						});
					}
				},
				dataType: "json"
			});
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>
