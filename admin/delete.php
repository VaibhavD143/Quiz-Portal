<?php

if(!isset($_POST['selected_quiz']))
{
    $msg="Select Your Quiz First";
}
else
{
    $selected_quiz=$_POST['selected_quiz'];
    include 'connect.php';
  
    $sql="DELETE FROM `quiz` WHERE `quiz_id` = '$selected_quiz'";
      
    
      if (!$database_handler->query($sql) === TRUE)  {
                                $msg = "Query Error Try again";
                                
			                 }
else
$msg = "quiz is Deleted";
}
include 'edit.php';
?>
