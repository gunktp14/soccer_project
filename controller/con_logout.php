<?php
    session_start();
    session_unset();

    if(isset($_POST['submit'])){
        header("location: ../signin.php");
    }else{
        header("location: ../signin.php");
    }



?>