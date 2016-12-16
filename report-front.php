<?php
include_once "resource/session.php";
$page_title = "User page";
include_once "partials/headers.php";
?>
<html>
	<body>
	<div class="container">
		<h4 class="title">
		</h4>
		<div class="descr"></div>
	</div>
	<div>
	<p><a href="groups-front.php" >Back</a></p>
	</div>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
		$.ajax({
				type: "GET",
				url: "report.php",
				success: function(data) {
					console.log(data);
					$(".title").text("Report of: " + data["report"][0]["mname"]);
					$(".descr").append(
						$(document.createElement("h3"))
						.text(data["report"][0]["description"]));
					if (data['uname'] == data['report'][0]['uname']) {
						$link = $(document.createElement("a"))
							.text("edit")
							.addClass("btn btn-primary")
							// .attr('href', "editReview.php")
							.attr('id', data["report"][0]['mid'])
							.click(function() {
								location.href = "editreport.php" + "?mid=" + $(this).attr('id');
							});
							$(".descr").append($link);
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