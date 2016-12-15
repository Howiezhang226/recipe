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
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        <p>
        <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#next" aria-expanded="false" aria-controls="next">
	    next
	  </button>
	  </p>
	  <div class="collapse" id="next">
	  <div class="card card-block">
	  	ahahahahahahahahahaahahha
	  </div>
	  </div>

      </div>
    </div>
  </div>
  
</div>

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