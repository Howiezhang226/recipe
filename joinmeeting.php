<?php
include_once "resource/database.php";
include_once "resource/session.php";

try{
    $mid = $_POST['mid'];
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
        $result =  "<p> registeration successful! <p>";
    }
} catch (PDOException $pdoex) {
    echo $pdoex -> getCode();
    $result = "<p> An error! <p>";
}