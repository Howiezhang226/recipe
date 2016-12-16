<?php
$page_title = "Edit Review";
include_once "resource/database.php";
include_once "resource/session.php";
include_once "partials/headers.php";
if(isset($_GET['rid'])) 
    $rid = $_GET['rid'];
else
    $rid = 1;
if (isset($rid)) {


    $sqlQuery = "SELECT content, suggestion, rating  FROM recipe.review WHERE rid = :rid";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':rid' => $rid));

    while ($row = $statement->fetch()) {
        $content = $row['content'];
        $suggestion = $row['suggestion'];
        $rating= $row['rating'];
    }
}
if (isset($_POST['editreview'])) {
    $sqlQuery = "UPDATE recipe.review  SET content = :content , suggestion = :suggestion, rating = :rating  WHERE rid = :rid";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(
        array(':rid' => $rid,
        ':content' => $_POST['content'],
        ':suggestion' => $_POST['suggestion'],
        ':rating' => $_POST['rating'],
        ));
    header("location:editreview.php");

}
?>


<div class="container">
<?php
echo $rid;
?>
    <form method="post" action="">
        <div></div>
        <div class="form-group">
            <label for="Content">Content</label>
            <textarea class="form-control" name="content" rows="3"><?php
                 if(isset($content))
                    echo $content;
                ?></textarea>
        </div>
        <div class="form-group">
            <label for="Suggestion">Suggestion</label>
            <textarea class="form-control" name="suggestion" rows="3"><?php
                                 if(isset($suggestion))
                                     echo $suggestion;
                                 ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleSelect1">Rating</label>
            <select class="form-control" name="rating">

                <option  <?php if(isset($rating) && $rating == 1){echo("selected");}?>>1</option>
                <option <?php if(isset($rating) && $rating == 2){echo("selected");}?>>2</option>
                <option <?php if(isset($rating) && $rating == 3){echo("selected");}?>>3</option>
                <option <?php if(isset($rating) && $rating == 4){echo("selected");}?>>4</option>
                <option <?php if(isset($rating) && $rating == 5){echo("selected");}?>>5</option>
            </select>
        </div>
        <button type="submit"  class="btn btn-primary pull-right" name="editreview" value="editreview">Update</button>
    </form>

</div><!-- /.container -->

<?php
include_once "partials/footers.php"
?>
