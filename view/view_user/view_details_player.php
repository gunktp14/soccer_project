<?php
    session_start();

    if(!isset($_SESSION['user_login'])){
        header("location: ../../signin.php");
    }

    $id = $_GET['id'];

    include_once '../../model/connect.php';
    include_once '../../model/method_stmt.php';
    $obj = new method_stmt();
    $rs2 = $obj->getPlayerDetails($id);
    
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
            background-size: 100%; 
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
        .alert {
            height: 10%;   
            text-align:center; 
        }
        .details-group {
            background-color:white;
            border-radius:20px;
        }
        .detail-text{
            color:#4b4b4b;
        }
        
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="nav-link active" aria-current="page" href="user.php"><img width="30" src="https://seeklogo.com/images/P/premier-league-logo-E8E0CE3AE6-seeklogo.com.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="user.php"></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item dropdown">
                    
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#"></a></li>
                    <li><a class="dropdown-item" href="#"></a></li>
                    <li><hr class="dropdown-divider"></li> 
                    <li><a class="dropdown-item" href="#"></a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                </li>
            </ul>
            <form action="view_search_name.php" method="POST" class="d-flex">
                <input class="form-control me-2" name="search_name" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button> 
            </form>
            </div>
        </div>
        </nav>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-3"> </div>
                <div class="col-6 details-group">
                <br>
                <h6>รายละเอียดผู้เล่น <i class="bi bi-person-fill"></i></h6>
                <hr>
                    <img width="100%" src='<?= $rs2['image']?>'>
                        <br><br>
                        <h5><?=$rs2['first_name']?> <?=$rs2['last_name']?></h5>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">รายละเอียด</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Reviews</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                        </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                                <h6><b>First name</b></h6>
                                <p class="detail-text"><?php echo"&nbsp&nbsp&nbsp&nbsp".$rs2['first_name']."";?></p><br>
                                <h6><b>Last name</b></h6>
                                <p class="detail-text"><?php echo"&nbsp&nbsp&nbsp&nbsp ".$rs2['last_name']."";?></p><br>
                                <h6><b>Team</b></h6>
                                <p class="detail-text">&nbsp&nbsp&nbsp&nbsp <?php
                                switch($rs2['team']){ 
                                    case "Arsenal":
                                      echo $rs2['team'] . "&nbsp<img src='./images/arsenal.png' width='20px' alt=''>";
                                    break;
                                    case "Chelsea": 
                                      echo $rs2['team'] . "&nbsp<img src='./images/Chelsea.png' width='20px' alt=''>";
                                    break; 
                                    case "Crystal Palace": 
                                      echo $rs2['team'] . "&nbsp<img src='./images/Crystal Palace.png' width='20px' alt=''>";
                                    break; 
                                    case "Leicester": 
                                      echo $rs2['team'] . "&nbsp<img src='./images/Leicester.png' width='20px' alt=''>";  
                                    break; 
                                    case "Manchester City": 
                                      echo $rs2['team'] . "&nbsp<img src='./images/ManchesterCity.png' width='20px' alt=''>";  
                                    break; 
                                    case "Stoke": 
                                      echo $rs2['team'] . "&nbsp<img src='./images/Stoke.png' width='20px' alt=''>";  
                                    break;  
                                    case "Tottenham": 
                                      echo $rs2['team'] . "&nbsp<img src='./images/Tottenham.png' width='20px' alt=''>";   
                                    break; 
                                    case "West Brom": 
                                      echo $rs2['team'] . "&nbsp<img src='./images/WestBromwich.png' width='20px' alt=''>";  
                                    break; 
                                    case "Manchester United": 
                                      echo $rs2['team'] . "&nbsp<img src='./images/man_u.png' width='20px' alt=''>";  
                                    break; 
                                    default;
                                } 
                                ?></p><br>
                                <h6><b>Position</b></h6>
                                <p class="detail-text"><?php echo"&nbsp&nbsp&nbsp&nbsp".$rs2['position']."";?></p><br>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">coming soon!<br></div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">coming soon!<br></div>
                        </div>
                </div>
                <div class="col-3"> </div>


        </div>
        </div>
        <br><br>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    
                </a>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                </li>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                </li>
            </ul>
                <form action="../../controller/con_logout.php">
                    <input style="font-size:small;" type="submit" class="btn" value="ออกจากระบบ"><i style="font-size:small;" class="bi bi-box-arrow-right"></i>   
                </form>
            </div>
        </div>
        </nav>
</body>
</html>