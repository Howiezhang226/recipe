<?php
include_once "resource/session.php";
$page_title = "search page";
include_once "partials/headers.php";
?>
<html>
	<body>
	<div class="row">
		<div class="search-box col-lg-12">
			<ul class="search-list card-columns">
			</ul>
		</div>
	</div>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
		<?php if(isset($page_title) && $page_title == "search page"): ?>
			$(".search").click(function() {
				// console.log($(".keyWord").val());
				$.ajax({
					type: "POST",
					url: "search.php",
					data: {'search_info': $(".keyWord").val()},
					success: function(data) {
						console.log(data);
						if (data == "") {
							return;
						}
						$(".search-list").html('');
						displayData(data);
					},
					error: function (textStatus, errorThrown) {
                		console.log(textStatus);
                		console.log(errorThrown);
            		},
					dataType: "json"
				});
			});
		<?php endif?>

			$.ajax({
				type: "GET",
				url: "search.php",
				success: function(data) {
					console.log(data);
					if (data == "") {
						return;
					}
					$(".search-list").html('');
					// $data = $.parseJSON(data);
					displayData(data);
				},
				dataType: "json"
			});

			function displayData(data) {
				if ("recipes" in data) {
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
						$(".search-list").append($(card));

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
				}
				if ("reviews" in data) {
					for (var i = 0; i < data["reviews"].length; i++) {
						var list = document.createElement("li");
						var link = document.createElement("a");
						$(link).attr('href', "recipe-front.php");
						$(link).text(data["reviews"][i]["uname"] + " review for " + data["reviews"][i]["title"]);
						$(list).append($(link));
						$(list).attr('id', data["reviews"][i]["rid"]);
						$(".search-list").append($(list));
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
				}
				if ("meeting" in data) {
					for (var i = 0; i < data["meeting"].length; i++) {
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
						$(title).text(data["meeting"][i]["mname"]);
						$(content).text(data["meeting"][i]["uname"] + " rsvp to " + data["meeting"][i]["mname"]);
						$(link).attr('href', "#");
						$(link).text("check");

						$(link).attr('id', data["meeting"][i]["mid"]);

						$(card_block).append($(title));
						$(card_block).append($(content));
						$(card_block).append($(link));
						$(card).append($(card_header));
						$(card).append($(card_block));
						$(".search-list").append($(card));

						$(link).click(function() {
							console.log(this);
						});
					}
				}

				if ("recipes_tag" in data) {
					for (var i = 0; i < data["recipes_tag"].length; i++) {
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
						$(title).text(data["recipes_tag"][i]["title"]);
						$(content).text(data["recipes_tag"][i]["description"]);
						$(link).attr('href', "recipe-front.php");
						$(link).text("check");

						$(link).attr('id', data["recipes_tag"][i]["rid"]);

						$(card_block).append($(title));
						$(card_block).append($(content));
						$(card_block).append($(link));
						$(card).append($(card_header));
						$(card).append($(card_block));
						$(".search-list").append($(card));

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
				}
			}
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>