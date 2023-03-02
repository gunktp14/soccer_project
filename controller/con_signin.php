<?php
    session_start();
    include_once '../model/connect.php';
    include_once '../model/method_stmt.php';
    
    $obj = new method_stmt();

    $username = $_POST['username'];
    $upassword = $_POST['upassword'];

    $rs2 = $obj->login($username,$upassword);
    if($rs2 == true){
        $row = $check_Admin = $obj->checkAdmin($username);
        if($row['urole'] == "admin"){
            $_SESSION['admin_login'] = "คุณได้ทำการเข้าสู่ระบบ เป็นที่เรียบร้อยเเล้ว Role: Admin";
            header("location: ../view/view_admin/admin.php");
        }else if($row['urole'] == "user"){
            $_SESSION['user_login'] = "คุณได้ทำการเข้าสู่ระบบ เป็นที่เรียบร้อยเเล้ว";
            header("location: ../view/view_user/user.php");
        }else {
            header("location: ../index.php");
        }
    }else if(empty($username)){
        $_SESSION['error'] = "กรุณากรอก username";
        header("location: ../signin.php"); 
    }else if(empty($upassword)){
        $_SESSION['error'] = "กรุณากรอก password";
        header("location: ../signin.php"); 
    }else {
        $_SESSION['error'] = "username หรือ password ของคุณไม่ถูกต้อง";
        header("location: ../signin.php");  
    }
    

?>