<?php
include_once "resource/session.php";
$page_title = "search page";
include_once "partials/headers.php";
?>
<html>
	<body>
	<div class="row">
		<div class="col col-lg-7">
			<section>
				<form class="form-horizontal">
					<div class="form-group">
						<label for="keywordInput" class="col-sm-2 control-label">Search</label>
						<div class="col-sm-5">
							<input type="text" class="form-control keyWord" id="keywordInput" placeholder="Input keyword">
						</div>
						<div class="col-sm-3">
							<button class="search btn btn-default" type="button">Search</button>
						</div>
					</div>
	  			</form>
			</section>
		</div>
		<div class="col-lg-12">
			<ul class="search-list">
			</ul>
		</div>
	</div>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
			$(".search").click(function() {
				console.log($(".keyWord").val());
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

						for (var i = 0; i < data["recipes"].length; i++) {
							var list = document.createElement("li");
							var link = document.createElement("a");
							$(link).attr('href', "recipe-front.php");
							$(link).text(data["recipes"][i]["title"]);
							$(list).append($(link));
							$(list).attr('id', data["recipes"][i]["rid"]);
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

						for (var i = 0; i < data["meeting"].length; i++) {
							var list = document.createElement("li");
							$(list).text(data["meeting"][i]["mname"]);
							$(".search-list").append($(list));
						}

					},
					dataType: "json"
				});
			});

			$.ajax({
				type: "GET",
				url: "search.php",
				success: function(data) {
					console.log(data);
					if (data == "") {
						return;
					}
					$(".search-list").html('');
					$data = $.parseJSON(data);
					for (var i = 0; i < $data["recipes"].length; i++) {
						var list = document.createElement("li");
						var link = document.createElement("a");
						$(link).attr('href', "recipe-front.php");
						$(link).text($data["recipes"][i]["title"]);
						$(list).append($(link));
						$(list).attr('id', $data["recipes"][i]["rid"]);
						$(".search-list").append($(list));
						$(list).click(function() {
							$.ajax({
								type: "POST",
								url: "resource/set-session.php",
								data: {'rid': $(this).attr('id')},
								success: function(data) {
									console.log($data);
								},
								dataType: "json"
							});
						});
					}
				}
			});
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>