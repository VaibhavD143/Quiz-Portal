<?php
$selected_quiz=$_POST['selected_quiz'];
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$passwd = $_POST['passwd'];
$time_started = $_POST['time_started'];
$time_finished = $_POST['time_finished'];
$score = $_POST['score'];
 


 require_once('connect.php');
      $sql="UPDATE `user` SET  `name` = '$name', `lastname` = '$lastname', `password` = '$passwd', `time_started` = '$time_started', `time_finished` = '$time_finished', `score` = '$score' WHERE `user_id` = '$user_id'";
                           
  if (!$database_handler->query($sql) === TRUE)  {
                                $msg = "Query Error Try again";
                                
			                 }
else
$msg = "Data Updated";
                          
 include 'monitor.php'; 
                           


?>