<?php
    session_start();

    if(!isset($_SESSION['admin_login'])){
        header("location: ../../signin.php");
    }
    

    $identifier = $_SESSION['edit_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $position = $_POST['position'];
    $team = $_POST['team'];
    $image = $_POST['image'];

    include_once '../model/connect.php';
    include_once '../model/method_stmt.php';
    $obj = new method_stmt();
    $result = $obj->editPlayer($identifier,$first_name,$last_name,$team,$position,$image);
    if($result == true){
        unset($_SESSION['edit_id']);
        header("location: ../signin.php");
    }else {
        
    }









?>