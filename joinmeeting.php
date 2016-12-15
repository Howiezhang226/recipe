<?php
include_once "resource/database.php";
include_once "resource/session.php";

if (isset($_POST['mid'])) {
    try{
        $mid = $_POST['mid'];

        $checkGroup = "SELECT uname from recipe.meeting natural join recipe.groups natural join recipe.join_groups where mholder=gid and mid = :mid and uname=:uname";
        $statement = $db -> prepare($checkGroup);
        $statement -> execute(
        array(
            ':uname' => $_SESSION['uname'],
            ':mid'=> $mid
        ));
        $queryResult['join'] = $statement->fetchAll();
        if (sizeof($queryResult['join']) != 0) {
            $sqlInsert = "INSERT INTO recipe.rsvpmeeting (mid, uname, rsvptime) 
                      VALUES (:mid, :uname, now())";
            //use prepared sql to avoid sql injection
            $statement = $db -> prepare($sqlInsert);
            $statement -> execute(
            array(
                ':uname' => $_SESSION['uname'],
                ':mid'=> $mid
            ));
            if ($statement -> rowCount() == 1) {
                // $result =  "<p> registeration successful! <p>";
            }
        }
        echo json_encode($queryResult);
    } catch (PDOException $pdoex) {
        echo $pdoex -> getCode();
        $result = "<p> An error! <p>";
    }
}
