<?php
    class method_stmt{
        private $ConDB;

         public function __construct(){
             $con = new ConDB();
             $con->connect();
             $this->ConDB = $con->conn;
            }
        
            
        public function check_Email($email){
            $sql = "SELECT `email` FROM `user_tb` WHERE `email` ='".$email."'";
            $query = $this->ConDB->prepare($sql);
            if( $query->execute()){
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else{
                return false;
            }
        }

        public function check_Username($username){
            $sql = "SELECT `username` FROM `user_tb` WHERE `username` ='".$username."'";
            $query = $this->ConDB->prepare($sql);
            if( $query->execute()){
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else{
                return false;
            }
        }

        public function register($username,$upassword,$email,$urole){
            $sql = "INSERT INTO `user_tb` (`id` , `username` , `upassword` ,`email` ,`urole`)
            VALUES ('',:username,:upassword,:email,:urole)";
            $query = $this->ConDB->prepare($sql);
            $query->bindParam(":username",$username);
            $query->bindParam(":upassword",$upassword);
            $query->bindParam(":email",$email);
            $query->bindParam(":urole",$urole);
            if( $query->execute()){
                return true;
            }else {
                return false;
            }

            
        }

        public function login($username,$upassword){
            $sql = "SELECT `username` FROM `user_tb` WHERE `username` = :username AND `upassword` = :upassword"; 
            $query = $this->ConDB->prepare($sql);
            $query->bindParam(":username",$username);
            $query->bindParam(":upassword",$upassword);
            if( $query->execute()){
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else{
                return false;
            }
        }

        public function checkAdmin($username){
            $sql = "SELECT `urole` FROM `user_tb` WHERE `username` = :username";
            $query = $this->ConDB->prepare($sql);
            $query->bindParam(":username",$username);
            if($query->execute()){
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            } 
        } 

        public function getPlayer(){
            $sql = "SELECT * FROM `soccer_tb`";
            $query = $this->ConDB->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }

        public function getPlayerTeam(){
            $sql = "SELECT * FROM `soccer_tb` ORDER BY `soccer_tb`.`team` ASC";
            $query = $this->ConDB->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }

        public function getPlayerName(){
            $sql = "SELECT * FROM `soccer_tb` ORDER BY `soccer_tb`.`first_name` ASC";
            $query = $this->ConDB->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }


        public function getDeletePlayer($identifier){
            $sql = "DELETE FROM `soccer_tb` WHERE `identifier` = :identifier";
            $query = $this->ConDB->prepare($sql);
            $query->bindParam(":identifier",$identifier);
            if($query->execute()){
                return true;
            }else {
                return false; 
            }
        }

        public function addPlayer($first_name,$last_name,$team,$position,$images){
            $sql = "INSERT INTO `soccer_tb` (`identifier`,`first_name`,`last_name`,`team`,`position`,`image`)
            VALUES ('',:first_name,:last_name,:team,:position,:images)";
            $query = $this->ConDB->prepare($sql);
            $query->bindParam(":first_name",$first_name);
            $query->bindParam(":last_name",$last_name);
            $query->bindParam(":team",$team);
            $query->bindParam(":position",$position);
            $query->bindParam(":images",$images);
            if($query->execute()){
                return $first_name;
                return true;
            }else {
                return false;
            }
        }

        public function getCourseDetails($cs_id){
            $sql = "SELECT * FROM `sci_cs` WHERE `cs_id` = :cs_id";
            $query = $this->ConDB->prepare($sql);
            $query->bindParam(":cs_id",$cs_id); 
            if($query->execute()){
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }

        public function editCourse($cs_id, $cs_name, $cs_img, $cs_date, $cs_wallet, $cs_range_date, $cs_fcourse, $cs_time, $cs_location, $cs_group, $cs_detail, $cs_perform, $cs_reward, $cs_year){
                $sql = "UPDATE `sci_cs` SET `cs_name` = '". $cs_name ."', `cs_img` = '". $cs_img ."', `cs_date` = '". $cs_date ."', `cs_wallet` = '". $cs_wallet ."'
                , `cs_range_date` = '". $cs_range_date ."', `cs_fcourse` = '". $cs_fcourse ."', `cs_time` = '". $cs_time ."', `cs_location` = '". $cs_location ."', `cs_group` = '". $cs_group ."'
                , `cs_detail` = '". $cs_detail ."', `cs_perform` = '". $cs_perform ."', `cs_reward` = '". $cs_reward ."', `cs_year` = '". $cs_year ."' WHERE `cs_id` = '". $cs_id ."'"; 
                $query = $this->ConDB->prepare($sql);
                if( $query->execute()){
                    return true;
                }else {
                    return false;
                }
            }


        public function searchYear($cs_year){
            $sql = "SELECT * FROM `sci_cs` WHERE `cs_year` = :cs_year";
            $query = $this->ConDB->prepare($sql);
            $query->bindParam(":cs_year",$cs_year);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC); 
                return $result;
                return true;
            }else {
                return false;
            }

        }

        public function searchName($search_name){
            $sql = "SELECT * FROM sci_cs WHERE cs_name LIKE '%$search_name%'";
            $query = $this->ConDB->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }

        }

        public function getPlayerDetails($id){
            $sql = "SELECT * FROM `soccer_tb` WHERE `identifier` = :identifier";
            $query = $this->ConDB->prepare($sql);
            $query->bindParam(":identifier",$id); 
            if($query->execute()){
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }

        public function searchPlayer($name){
            $sql = "SELECT * FROM soccer_tb WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%' OR team LIKE '%$name%' OR position LIKE '%$name%'";
            $query = $this->ConDB->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }

        }

        public function editPlayer($identifier,$first_name,$last_name,$team,$position,$image){
            $sql = "UPDATE `soccer_tb` SET `first_name` = '". $first_name ."', `last_name` = '". $last_name ."', `team` = '". $team ."', `position` = '". $position ."'
            , `image` = '". $image ."' WHERE `identifier` = '". $identifier ."'"; 
            $query = $this->ConDB->prepare($sql);
            if( $query->execute()){
                return true;
            }else {
                return false;
            }
        }

        

        

        
        

    }



?>