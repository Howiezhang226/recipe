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
			<div class="form-group">
				<div class="row">
					<input type="hidden" name="count" value="1" />
			        <div class="control-group" id="fields">
			            <label class="control-label" for="field1">Tag</label>
			            <div class="controls" id="profs"> 
			                <form class="input-append all-tag">
			                    <div id="tags" class="tags">
			                    <input autocomplete="off" class="input tags1" 
			                    id="tags1" name="prof1" type="text" placeholder="Tags" data-items="8"/>
			                    <button id="b1" class="btn btn-primary add-more" type="button">+</button>
			                    </div>
			                </form>
			            </div>
			        </div>
				</div>	
			</div>
		</form>
		<a class="create btn btn-primary pull-right">Create</a>
		<p><a href="user-front.php" >Back</a></p>
		</section>
		</div>
		<div>

	</div>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>

			$(".add").click(function() {
				count = $(".tags input").length;
				console.log($(".tags input").length);
				$tag = [];
				for (var i = 1; i <= count; i++) {
					$tag.push($(".tags"+i).val());
				}
				console.log($tag);
			});

			$(".create").click(function() {
				if (!$(".title").val() || !$(".description").val() || !$(".serving").val()) {
					alert("Please make sure all area are not empty");
					return;
				}
				count = $(".tags input").length;

				for (var i = 1; i <= count; i++) {
					if (!$(".tags"+i).val()) {
						alert("Please make sure all area are not empty");
						return;
					}
				}

				$tags = [];

				for (var i = 1; i <= count; i++) {
					$tags.push($(".tags"+i).val());
				}

				$newRecipe = {
					title : $(".title").val(),
					description : $(".description").val(),
					serving : $(".serving").val(),
					tags : $tags
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

			$(document).ready(function(){
			    var next = 1;
			    $(".add-more").click(function(e){
			        e.preventDefault();
			        var addto = "#tags" + next;
			        var addRemove = "#tags" + (next);
			        next = next + 1;
			        var newIn = '<input autocomplete="off" class="input tags' + next + '" id="tags' + next + '" name="tags' + next + '" type="text">';
			        var newInput = $(newIn);
			        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="tags">';
			        var removeButton = $(removeBtn);
			        $(addto).after(newInput);
			        $(addRemove).after(removeButton);
			        $("#tags" + next).attr('data-source',$(addto).attr('data-source'));
			        $("#count").val(next);  
			        
			            $('.remove-me').click(function(e){
			                e.preventDefault();
			                var fieldNum = this.id.charAt(this.id.length-1);
			                var fieldID = "#tags" + fieldNum;
			                $(this).remove();
			                $(fieldID).remove();
			            });
			    });			    
			});


		</script>
	</body>
</html>
<?php
include_once "partials/footers.php"
?>