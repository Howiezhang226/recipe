<?php
include_once "resource/session.php";
$page_title = "create page";
include_once "partials/headers.php";
?>
<html>
	<body>
	<div class="container">
		<section class="col col-lg-7">
		<h3>Create Recipe</h3>


		<form method="post" action="">
			<div class="form-group">
				<label for="Gname">Group Name</label>
				<input id="Gname" class="form-control Gname" type="text" value="" name="Gname">
			</div>

			<a class="create btn btn-primary pull-right">Create</a>

		</form>
		<p><a href="user-front.php" >Back</a></p>
		
		</section>

		</div>
		</div>
		<div>

	</div>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
			$(".create").click(function() {
				console.log($(".Gname").val());
				if (!$(".Gname").val()) {
					alert("Please make sure all area are not empty");
					return;
				}

				$newGroup = {
					gname : $(".Gname").val(),
				};
				$.ajax({
					type: "POST",
					url: "create.php",
					data: {'create_group': $newGroup},
					success: function(data) {
						console.log(data);
					},
					error: function (textStatus, errorThrown) {
	            		console.log(textStatus);
	            		console.log(errorThrown);
	        		},
					dataType: "json"
				});
				// location.href = "user-front.php";
			});
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>