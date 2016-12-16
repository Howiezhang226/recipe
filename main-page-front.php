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

			/*.verti-bar {
				list-style-type: none;
			    margin-top: 2%;
			    padding: 0;
			    width: 10%;
			    background-color: #f1f1f1;
			    height: 100%;  Full height 
			    position: fixed; /* Make it stick, even on scroll 
			    overflow: auto; /* Enable scrolling if the sidenav has too much content 
			}*/

			#main-body {
				position: absolute;
				margin-top: 2%;
				/*margin-left: 10%;*/
			}
		</style>

			<div class="container-fluid">
  				<div class="row">
    				<div class="col-sm-3 col-lg-2">
			<ul class="verti-bar nav">
				<li class="nav-item">Groups</li>
			</ul>
			</div>
			<div class="col-sm-9 col-lg-10">
				<div class="container">
				<div id="main-body" class="card-columns">
					<div class="recipes">
						
					</div>
					<ul class="meetings">
						
					</ul>
					<ul class="Group act">
						
					</ul>
				</div>
			</div>
    		</div>
    		</div>
			</div>
			

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
			$.ajax({
				type: "GET",
				url: "main-page.php",
				success: function(data) {
					console.log(data);
					$recipeList = $(".recipes");
					$meetingsList = $(".meetings");
					$groups = $(".verti-bar");
					for (var i = 0; i < data["recipes"].length; i++) {
						var card = document.createElement("div");
						var card_header = document.createElement("div");
						var card_block = document.createElement("div");
						var title = document.createElement("h4");
						var content = document.createElement("p");
						var link = document.createElement("a");
						$(card).addClass("card");
						$(card_header).addClass("card-header");
						$(card_block).addClass("card-block");
						$(title).addClass("card-title");
						$(content).addClass("card-text");
						$(link).addClass("btn btn-primary");


						$(content).css('line-height', '20px');
						$(content).css('max-height', '40px');
						$(content).css('text-overflow', 'ellipsis');
						$(content).css('overflow', 'hidden');
						
						$(card_header).text("Recipe");
						$(title).text(data["recipes"][i]["title"]);
						$(content).text(data["recipes"][i]["description"]);
						$(link).attr('href', "recipe-front.php");
						$(link).text("check");

						$(link).attr('id', data["recipes"][i]["rid"]);

						$(card_block).append($(title));
						$(card_block).append($(content));
						$(card_block).append($(link));
						$(card).append($(card_header));
						$(card).append($(card_block));
						$recipeList.append($(card));

						$(link).click(function() {
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

						var card = document.createElement("div");
						var card_header = document.createElement("div");
						var card_block = document.createElement("div");
						var title = document.createElement("h4");
						var content = document.createElement("p");
						var link = document.createElement("a");
						$(card).addClass("card");
						$(card_header).addClass("card-header");
						$(card_block).addClass("card-block");
						$(title).addClass("card-title");
						$(content).addClass("card-text");
						$(link).addClass("btn btn-primary");


						$(content).css('line-height', '20px');
						$(content).css('max-height', '40px');
						$(content).css('text-overflow', 'ellipsis');
						$(content).css('overflow', 'hidden');
						
						$(card_header).text("Meeting");
						$(title).text(data["meetings"][i]["mname"]);
						$(content).text(data["meetings"][i]["uname"] + " rsvp to " + data["meetings"][i]["mname"]);
						$(link).attr('href', "#");
						$(link).text("check");

						$(link).attr('id', data["meetings"][i]["mid"]);

						$(card_block).append($(title));
						$(card_block).append($(content));
						$(card_block).append($(link));
						$(card).append($(card_header));
						$(card).append($(card_block));
						$meetingsList.append($(card));

						$(link).click(function() {
							console.log(this);
						});
					}
					for (var i = 0; i < data["groups"].length; i++) {
						var list = document.createElement("li");
						var link = document.createElement("a");
						$(link).attr('href', "groups-front.php")
						.addClass("nav-link active");
						$(link).text(data["groups"][i]["gname"]);
						$(list).append($(link));
						$(list).attr('id', data["groups"][i]["gid"])
						.addClass("nav-item");
						$groups.append($(list));
						$(list).click(function() {
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
				},
				dataType: "json"
			});
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>
