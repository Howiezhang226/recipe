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


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>		<script>
			$.ajax({
				type: "GET",
				url: "groups.php",
				success: function(data) {
					// console.log(data);
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
								$link = $(document.createElement("a"))
								.attr('href', 'report-front.php')
								.attr('id', data["report"][j]["mid"] + " " + data["report"][j]["uname"])
								.text(data["report"][j]["uname"] + " post report");
								$(report).append($link);
								$(reports).append($link);

								$link.click(function() {
									$ids = $(this).attr('id').split(" ");
									$input = {
										mid : $ids[0],
										uname : $ids[1]
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
								})
							}
						}
						$(meeting).append('<p>' + $meeting["mname"] + '</p>');
						$(meeting).append('<p>' + $meeting["mtime"] + '</p>');
						$(meeting).append('<p>' + $meeting["mlocation"] + '</p>');
						$(meeting).append($(rsvp));
						$(meeting).append($(reports));
                        button = $("<button class=\"btn btn-primary\">RSVP</button>");
                        button.attr('id', $meeting["mid"]);
                        button.click(function () {
                            $.ajax({
                                type: "POST",
                                url: "joinmeeting.php",
                                data: {'mid': $(this).attr('id')},
                                success: function(data) {
                                    console.log(data);
                                    if (data['join'] && data['join'].length == 0) {
                                    	alert("Please join group first");
                                    }
                                    else if (data == 23000)
                                        alert("Wrong! You cannot RSVP this meeting. Maybe you have RSVP it before")
                                    else
                                        alert("RSVP Successful!!")

                                },
                                error: function (error) {
                                	console.log(error);
                                    alert("Wrong! You cannot RSVP this meeting. Maybe you have RSVP it before")
                                },
                                dataType: "json"
                            });
                        });
                        $(meeting).append($(document.createElement("p")).append(button));
                        report_button = $(document.createElement("a"))
                        .attr("href", "createReport.php")
                        .addClass("btn btn-primary pull-right")
                        .text("Post Report");
                        report_button.attr('id', $meeting["mid"]);
                        report_button.click(function() {
							$.ajax({
								type: "POST",
								url: "resource/set-session.php",
								data: {'mid': $(this).attr('id')},
								success: function(data) {
									console.log(data);
								},
								dataType: "json"
							});
                        });	
                        $(meeting).append($(document.createElement("p")).append(report_button));



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