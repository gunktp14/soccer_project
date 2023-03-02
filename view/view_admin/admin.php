<?php
    session_start();

    if(!isset($_SESSION['admin_login'])){
        header("location: ../../signin.php");
    }

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
    <link rel="stylesheet" href="../../style.css">
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
        #center-form{
            background-color: white;
            border-radius:20px;
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
        a#right {
            position:absolute;
            right:560px;
        }
        a{
          text-decoration: none;
        }
        .title{
          text-align: center;
          background-color: none;
        }
        #customers th {
          text-align: center;
          background-color: #04AA6D;
          color: white;
        }
        td{
          text-align: center;
        }
        .team_td{
          justify-content: space-between;
          display:flex;
        } 
    </style>
</head>
<body>
    <div class="container">
    <br><br><br><br>
        <div class="row align-items-start">
            <div class="col-2">
                <!--Null col --><p></p>
            </div>
    <div id="center-form" class="col-8">
    <br>
    <h1 class="title">All Player</h1>
    <p class="title small-font">รายละเอียด Player ทั้งหมด <i class="bi bi-journals"></i></p> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
        <!--navbar-->
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> 
      </ul>
      <div class="right">
      <!-- <form action="./view_search_year.php" method="POST" class="d-flex">  -->
        <!--<input class="form-control me-2" type="search" placeholder="Search" name="cs_year"aria-label="Search">-->
                        <!-- <select class="col-sm-8 custom-select custom-select-sm" name="cs_year"> 
                            <option value="all" selected>all</option>
                            <option value="2023" >2023</option>
                            <option value="2022">2022</option> 
                            <option value="2021">2021</option>  
                        </select>
        <button style="font-size:small;"class="btn btn-dark btn-sm" type="submit">Search</button>      -->
      <!-- </form> -->
      </div>
    </div>
  </div>
</nav>

<!--navbar-->

    <!-- Start of center form-->
    <?php 
      include_once "../../model/connect.php";
      include_once  "../../model/method_stmt.php";
      $obj = new method_stmt();
      $result2 = $obj->getPlayer();
      $no = 1;
      echo "<table id='customers'>
      <tr>
        <th width='4%'>No</th>
        <th width='20%'><a style='color:white;'href='view_list_name.php'>Player name</a></th>
        <th width='19%'><a style='color:white;'href='view_list_team.php'>Team</a></th>
        <th width='8%'></th>
        <th width='5%'></th>
        <th width='5%'></th>
      </tr>
      ";
      
      foreach($result2 as $row){
        ?>
        <tr> 
            <td width='2%'><?=$no?>.</td>
            <td width="15%"><a style="color: black;" href=""><?=$row['first_name']?> <?=$row['last_name']?></a></td>
            <td width="19%"><a style="color: black;" href="">
            <div class="team_td">
            <?php
              switch($row['team']){ 
                  case "Arsenal":
                    echo $row['team'] . "&nbsp<img src='./images/arsenal.png' width='20px' alt=''>";
                  break;
                  case "Chelsea": 
                    echo $row['team'] . "&nbsp<img src='./images/Chelsea.png' width='20px' alt=''>";
                  break; 
                  case "Crystal Palace": 
                    echo $row['team'] . "&nbsp<img src='./images/Crystal Palace.png' width='20px' alt=''>";
                  break; 
                  case "Leicester": 
                    echo $row['team'] . "&nbsp<img src='./images/Leicester.png' width='20px' alt=''>";  
                  break; 
                  case "Manchester City": 
                    echo $row['team'] . "&nbsp<img src='./images/ManchesterCity.png' width='20px' alt=''>";  
                  break; 
                  case "Stoke": 
                    echo $row['team'] . "&nbsp<img src='./images/Stoke.png' width='20px' alt=''>";  
                  break;  
                  case "Tottenham": 
                    echo $row['team'] . "&nbsp<img src='./images/Tottenham.png' width='20px' alt=''>";   
                  break; 
                  case "West Brom": 
                    echo $row['team'] . "&nbsp<img src='./images/WestBromwich.png' width='20px' alt=''>";  
                  break; 
                  case "Manchester United": 
                    echo $row['team'] . "&nbsp<img src='./images/man_u.png' width='20px' alt=''>";  
                  break; 
                  default;
              } 
            ?>
              </div></td>
            <td width="8%"></td>  
            <td width="5%"><button class="btn btn-primary btn-sm"><a  href="../.././view/view_admin/view_edit_player.php?identifier=<?=$row['identifier']?>" style="color: white;">เเก้ไข</a></button></td>   
            <td width="5%"><button class="btn btn-danger btn-sm"><a href="../.././controller/con_delete_player.php?identifier=<?=$row['identifier']?>" style="color: white;" onclick="return confirm('คุณต้องการลบ ผู้เล่น คนนี้ใช่หรือไม่?')">ลบ</a></button></td> 
              
          </tr> 
        <?php
          $no++;
          }
        ?>
        </table>
        <br>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <form action="view_add_player.php">
        <input type="submit" class="btn btn-secondary btn-sm btn-block" value="เพิ่มผู้เล่นของคุณ +" id="submit_buttons"> 
      </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form action="../../controller/con_logout.php">
        <input style="font-size:small;" type="submit" class="btn" value="ออกจากระบบ"><i style="font-size:small;" class="bi bi-box-arrow-right"></i>   
      </form>
    </div>
  </div>
</nav>

      
      
        
        <br>
        

      
      <!-- End of center form--> 
            </div>
            <div class="col-2">
                <!--Null col -->
            </div>
            
     </div>
    </div>
    <br><br><br><br><br><br><br><br>

    
</body>
</html>