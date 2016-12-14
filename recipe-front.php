<?php
include_once "resource/session.php";
$page_title = "recipe page";
include_once "partials/headers.php";
?>
<html>
	<body>
		<style>

		</style>

		<div class="recipe">
			<p class="recipe-title"></p>
			<p class="recipe-description"></p>
			<p class="recipe-serving-number"></p>

			<a href="main-page-front.php">back</a>

			<ul class="ingredients"></ul>

			<ul class="tags"></ul>
			<hr>
			
			<ul class="reviews"></ul>
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
			$.ajax({
				type: "GET",
				url: "recipe.php",
				success: function(data) {
					$data = $.parseJSON(data);
					$(".recipe-title").text($data["recipe"][0]["title"]);
					$(".recipe-description").text($data["recipe"][0]["description"]);
					$(".recipe-serving-number").text($data["recipe"][0]["number_of_serving"]);
					
					for (var i = 0; i < $data["ingredients"].length; i++) {
						$ing = $data["ingredients"][i];
						var list = document.createElement("li");
						$(list).text($ing["quantities"] + " " + $ing["unit"] + " of " + $ing["iname"]);
						$(".ingredients").append($(list));
					}

					for (var i = 0; i < $data["tags"].length; i++) {
						var list = document.createElement("li");
						var link = document.createElement("a");

						$(link).attr('href', "search-front.php");
						$(link).text($data["tags"][i]["tname"]);
						$(list).attr('id', $data["tags"][i]["tid"]);
						$(list).append($(link));
						$(".tags").append($(list));

						$(list).click(function() {
							$.ajax({
								type: "POST",
								url: "resource/set-session.php",
								data: {'search_tag': $(this).attr('id')},
								success: function(data) {
									// console.log(data);
								},
								dataType: "json"
							});
						});

					}

					for (var i = 0; i < $data["reviews"].length; i++) {
						$review = $data["reviews"][i];
						var list = document.createElement("li");
						var review = document.createElement("div");
						$(review).append('<p>' + $review["uname"] + '</p>');
						$(review).append('<p>' + $review["content"] + '</p>');
						$(review).append('<p>' + $review["suggestion"] + '</p>');
						$(review).append('<p>' + "rating: " + $review["rating"] + '</p>');
						$(list).append($(review));
						$(".reviews").append($(list));
					}
					console.log(data);
				}
			});
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>