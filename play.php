<?php
	$page_title="play page"
	
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
<div class="card-columns">

		<div class="card">
		<!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
			<div class="card-block">
				<h4 class="card-title">Card title</h4>
				<p class="card-text">Some quick example </p>
				<a href="#" class="go btn btn-primary">Go somewhere</a>
			</div>
		</div>	
		<div class="card">
		<!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
			<div class="card-block">
				<h4 class="card-title">Card title</h4>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="go btn btn-primary">Go somewhere</a>
			</div>
		</div>	
		<div class="card">
		<!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
			<div class="card-block">
				<h4 class="card-title">Card title</h4>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="go btn btn-primary">Go somewhere</a>
			</div>
		</div>	
		<div class="card">
		<!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
			<div class="card-block">
				<h4 class="card-title">Card title</h4>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="go btn btn-primary">Go somewhere</a>
			</div>
		</div>	
</div>

</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
		<?php if(isset($page_title) && $page_title == "play page"): ?>
			$(".go").click(function() {
				<?php if (isset($page_title) && $page_title != "play page"): ?>
					location.href = "index.php";
				<?php endif ?>
			});
		<?php endif?>
</script>

</html>