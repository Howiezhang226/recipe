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
				<label for="Title">Title</label>
				<input id="Title" class="form-control title" type="text" value="" name="title">
			</div>
			
			<div class="form-group">
				<label for="Description">Description</label>
				<textarea rows="4" cols="50" id="Description" class="form-control description" type="text" value="" name="Description"></textarea>
			</div>

			<div class="form-group">
				<label for="Serving">Serving</label>
				<input id="Serving" class="form-control serving" value="" name="Serving" type="number" min="0" step="1">
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
				if (!$(".title").val() || !$(".description").val() || !$(".serving").val()) {
					alert("Please make sure all area are not empty");
					return;
				}

				$newRecipe = {
					title : $(".title").val(),
					description : $(".description").val(),
					serving : $(".serving").val()
				};
				$.ajax({
					type: "POST",
					url: "create.php",
					data: {'create_recipe': $newRecipe},
					success: function(data) {

					},
					error: function (textStatus, errorThrown) {
	            		console.log(textStatus);
	            		console.log(errorThrown);
	        		},
					dataType: "json"
				});
				location.href = "user-front.php";
			});
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>