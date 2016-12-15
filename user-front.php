<?php
include_once "resource/session.php";
$page_title = "User page";
include_once "partials/headers.php";
?>
<html>
	<body>
	<div class="container">
		
	</div>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
		$.ajax({
				type: "GET",
				url: "main-page.php",
				success: function(data) {

				},
				dataType: "json"
			});
		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>