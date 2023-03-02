<?php
    session_start();

    if(!isset($_SESSION['admin_login'])){
        header("location: ../../signin.php");
    }

    $identifier = $_GET['identifier'];
    $_SESSION['edit_id'] = $identifier;
    include_once '../.././model/connect.php';
    include_once '../.././model/method_stmt.php';
    $obj = new method_stmt();
    $result = $obj->getPlayerDetails($identifier);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcourse</title>
    <link rel = "icon" href = "https://seeklogo.com/images/P/premier-league-logo-E8E0CE3AE6-seeklogo.com.png" type = "image/x-icon">
    <!--CSS Bootstrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--JavaScript Bootstrap5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <!-- Link Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <!--Link Style.css-->
    <link rel="stylesheet" href="style.css">
    <!--Icon Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        body{
            background-image: url("images/wall.jpg");   
            background-size: 110% 200%; 
            font-family: 'Kanit', sans-serif;        
            }
        #form-login{
            background-color: white;
            border-radius:25px;
        }
        p.text-small{
            font-size: smaller;
            color:rgb(56, 56, 56);
        }
        a.forget_pass_button{
            font-size: x-small;
            float: right;
        }
        .small-font{
            font-size:smaller;
        }
        .x-small-font{
            font-size:x-small;
        }
        .alert{
            height: 10%;   
            text-align:center; 
        }
        
    </style>
</head>
<body>
        <div class="container">
            <br><br><br><br><br><br>
            <div class="row">
                <div class="col-4"></div> 

                <div id="form-login" class="col-4">
                    <br>
                    <div>
                        <h3>Edit Player&nbsp<i style="font-size:16px" class="bi bi-pencil-square"></i></h3> 
                        
                    </div>
                    <p class="text-small">กรอกข้อมูลเพื่อเปลี่ยนข้อมูลผู้เล่น</p> 
                    <?php
                        if(isset($_SESSION['success'])){
                    ?>
                    <div class="alert-md alert-primary" role="alert">
                       <p style="font-size:small;text-align:center;margin-top:0%;">
                       <?php 
                        echo $_SESSION['success'] . "&nbsp<a href='./admin.php'>view player</a>";
                        unset($_SESSION['success']);
                       ?>
                       </p>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['error'])){
                    ?>
                    <div class="alert-md alert-danger" role="alert">
                       <p style="font-size:small;text-align:center;margin-top:0%;">
                       <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                       ?>
                       </p>
                    </div>
                    <?php 
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['warning'])){
                    ?>
                    <div class="alert-md alert-danger" role="alert">
                       <p style="font-size:small;text-align:center;margin-top:0%;">
                       <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                       ?>
                       </p>
                    </div>
                    <?php
                        }
                    ?>
                    <hr>
                    <form action="../../controller/con_edit_player.php" method="POST"> 
                        <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label small-font">&nbsp&nbsp&nbsp&nbsp&nbspFirst Name</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?=$result['first_name']?>" class="form-control small-font" id="username" name="first_name">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                                <label for="upassword" class="col-sm-4 col-form-label small-font">&nbsp&nbsp&nbsp&nbsp&nbspLast Name</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?=$result['last_name']?>"class="form-control small-font" id="upassword" name="last_name">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                                <label for="cpassword" class="col-sm-4 col-form-label small-font">&nbsp&nbsp&nbsp&nbsp&nbspTeam</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?=$result['team']?>" class="form-control small-font" id="cpassword" name="team" placeholder="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                                <label for="Email" class="col-sm-4 col-form-label small-font">&nbsp&nbsp&nbsp&nbsp&nbspPosition</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?=$result['position']?>" class="form-control small-font" id="Email" name="position">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                                <label for="Email" class="col-sm-4 col-form-label small-font">&nbsp&nbsp&nbsp&nbsp&nbspImages</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?=$result['image']?>" class="form-control small-font" id="Email" name="image">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                            <div class="col-sm-7">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">ยืนยันการเเก้ไข +</button>
                                </div>
                                <p class="x-small-font">*กรุณากรอกข้อมูลจริง</p>
                            </div>
                        </div>
                        <br>
                    </form>
                    </div>
                </div>

                <div class="col-4"></div> 
            
            </div>
        </div>
</body>
</html>