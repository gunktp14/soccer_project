<?php
    session_start();
    include_once '../model/connect.php';
    include_once '../model/method_stmt.php';
    $obj= new method_stmt();
    
    if(isset($_POST['sign_up'])){
        $username = $_POST['username'];
        $upassword = $_POST['upassword'];
        $cpassword = $_POST['cpassword'];
        $email = $_POST['email'];
        $urole = "user";

        // $array_info_user = array();
        // $array_info_user['username'] = $username;
        // $array_info_user['upassword'] = $upassword;
        // $array_info_user['email'] = $email;
        // $array_info_user['urole'] = $urole;
        // print_r($array_info_user);

        $check_username = $obj->check_Username($username);
        
        if(empty($username)){
            $_SESSION['error'] = "กรุณากรอก username";  
            header('location: ../index.php');
        }else if($check_username == true){
            $_SESSION['error'] = "username ของคุณถูกนำไปใช้งานเเล้ว กรุณาใช้ username อื่น";
            header('location: ../index.php');
        }else if(strlen($username) < 5|| strlen($username) > 20){
            $_SESSION['error'] = "username ของคุณต้องมีตัวอักษรอยู่ระหว่าง 5 - 20 ตัวอักษร";
            header('location: ../index.php');
        }else if(empty($upassword)){
            $_SESSION['error'] = "กรุณากรอก password";
            header('location: ../index.php');
        }else if(strlen($upassword) < 5 ||strlen($upassword) > 50){
            $_SESSION['error'] = "password ต้องมีตัวอักษรอยู่ระหว่าง 5 - 50 ตัวอักษร";
            header('location: ../index.php');
        }else if($upassword != $cpassword){
            $_SESSION['error'] = "รหัสผ่านของคุณไม่ตรงกัน กรุณากรอกข้อมูลอีกครั้ง";
            header('location: ../index.php');
        }else if(empty($email)){
            $_SESSION['error'] = "กรุณากรอก Email";
            header('location: ../index.php');
        }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = "กรุณากรอก Email ให้ถูกต้อง";
            header('location: ../index.php');
        }else{
            $rs2 = $obj->check_Email($email);
            if($rs2 === true){
                $_SESSION['warning']="This email already has been used!";
                header("location: ../index.php");
            }else{
                $rs2 = $obj->register($username,$upassword,$email,$urole);
                if($rs2){
                    $_SESSION['success']="ได้ทำการสมัครสมาชิกเสร็จเรียบร้อย <a href='signin.php'>เข้าสู่ระบบ</a>";
                    header('location: ../index.php');
                }else{

                }
            }
        }

    }else{
        echo("มีควยไรสัส");
    }



?>