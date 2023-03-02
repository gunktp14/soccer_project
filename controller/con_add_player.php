<?php

    session_start();

    if(!isset($_SESSION['admin_login'])){
        header("location: ../../signin.php");
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $team = $_POST['team'];
    $position = $_POST['position'];
    $image = $_POST['image'];

    include_once '../model/connect.php';
    include_once '../model/method_stmt.php';
    $obj = new method_stmt();

    if(isset($_POST['submit'])){
        if(empty($first_name)){
            $_SESSION['error'] = "กรุณากรอก first name";
            header('location: ../view/view_admin/view_add_player.php');
        }else if(strlen($first_name) < 5){
            $_SESSION['error'] = "ชื่อของผู้เล่นของคุณต้องมากกว่า 4 ตัวขึ้นไป";
            header('location: ../view/view_admin/view_add_player.php');
        }else if(empty($last_name)){
            $_SESSION['error'] = "กรุณากรอก last name";
            header('location: ../view/view_admin/view_add_player.php');
        }else if(strlen($last_name) < 5){
            $_SESSION['error'] = "ชื่อของผู้เล่นของคุณต้องมากกว่า 4 ตัวขึ้นไป";
            header('location: ../view/view_admin/view_add_player.php');
        }else if(empty($team)){
            $_SESSION['error'] = "กรุณากรอกชื่อ team";
            header('location: ../view/view_admin/view_add_player.php');
        }else if(empty($position)){
            $_SESSION['error'] = "กรุณากรอก position";
            header('location: ../view/view_admin/view_add_player.php');
        }else if(empty($image)){
            $_SESSION['error'] = "กรุณากรอก image";
            header('location: ../view/view_admin/view_add_player.php');
        }else if(empty($_SESSION['error'])){
            $rs2 = $obj->addPlayer($first_name,$last_name,$team,$position,$image);
            if($rs2 == true){
                $_SESSION['success'] = "ได้ทำการเพิ่มข้อมูลผู้เล่นเรียบร้อยเเล้ว";
                header('location: ../view/view_admin/view_add_player.php');
            }
        }
        
    }












?>