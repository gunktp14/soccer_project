<?php
    $identifier = $_GET['identifier'];

    if(!isset($_SESSION['admin_login'])){
        header("location: ../../signin.php");
    }

    include_once '../model/connect.php';
    include_once '../model/method_stmt.php';
    $obj = new method_stmt();
    $rs2 = $obj->getDeletePlayer($identifier);
    if($rs2 == true){
        header("location: ../signin.php");
    }
?>