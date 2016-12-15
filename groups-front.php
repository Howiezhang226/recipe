<?php
include_once "resource/session.php";
$page_title = "group page";
include_once "partials/headers.php";
?>
<html>
	<body>
		<style>

		</style>

		<div class="group">
			<p class="group-name"></p>
			<p class="group-creator"></p>

			<a href="main-page-front.php">back</a>
						
			<ul class="meetings"></ul>
		</div>
		<div id="accordion" role="tablist" aria-multiselectable="true">
 

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
			$.ajax({
				type: "GET",
				url: "groups.php",
				success: function(data) {
					console.log(data);
					// $data = $.parseJSON(data);
					$(".group-name").text(data["group"][0]["gname"]);
					$(".group-creator").text(data["group"][0]["creator"]);
					
					for (var i = 0; i < data["meetings"].length; i++) {
						$meeting = data["meetings"][i];
						var list = document.createElement("li");
						var meeting = document.createElement("div");
						var rsvp = document.createElement("ul");
						var reports = document.createElement("ul");
						for (var j = 0; j < data["rsvp"].length; j++) {
							if (data["rsvp"][j]["mid"] == $meeting["mid"]) {
								var member = document.createElement("li");
								$(member).text(data["rsvp"][j]["uname"] + " rsvp at " + data["rsvp"][j]["rsvptime"]);
								$(rsvp).append($(member));
							}
						}
						for (var j = 0; j < data["report"].length; j++) {
							if (data["report"][j]["mid"] == $meeting["mid"]) {
								var report = document.createElement("li");
								$(report).text(data["report"][j]["uname"] + " post report");
								$(reports).append($(report));
							}
						}
						$(meeting).append('<p>' + $meeting["mname"] + '</p>');
						$(meeting).append('<p>' + $meeting["mtime"] + '</p>');
						$(meeting).append('<p>' + $meeting["mlocation"] + '</p>');
						$(meeting).append($(rsvp));
						$(meeting).append($(reports));


						$(list).append($(meeting));
						$(".meetings").append($(list));
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