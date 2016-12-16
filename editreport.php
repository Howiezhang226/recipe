<?php
$page_title = "Edit Report";
include_once "resource/database.php";
include_once "resource/session.php";
include_once "partials/headers.php";
if(isset($_GET['mid']))
    $mid = $_GET['mid'];
else
    $mid = 1;
if (isset($mid)) {


    $sqlQuery = "SELECT description  FROM recipe.report WHERE mid = :mid AND uname = :uname";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':mid' => $mid,
                    'uname' => $_SESSION['uname']
    ));

    while ($row = $statement->fetch()) {
        $description = $row['description'];
    }
}
if (isset($_POST['editreport'])) {
    $sqlQuery = "UPDATE recipe.report  SET description = :description  WHERE mid = :mid AND uname = :uname";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(
        array(':mid' => $mid,
            ':description' => $_POST['description'],
            ':uname' => $_SESSION['uname']
        ));
    header("location:editreport.php");
}
?>


<div class="container">

    <form method="post" action="">
        <div></div>
        <div class="form-group">
            <label for="Description">Content</label>
            <textarea class="form-control" name="description" rows="8"><?php
                if(isset($description))
                    echo $description;
                ?></textarea>
        </div>

        <button type="submit"  class="btn btn-primary pull-right" name="editreport" value="editreport">Update</button>
    </form>

</div><!-- /.container -->

<?php
include_once "partials/footers.php"
?>
