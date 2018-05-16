 <!--------------------- Header and Side nav bar code ---------------->
<?php
if(!isset($_SESSION["uname"]))
session_start();
    if(!isset($_SESSION["uname"]))
    {
        $msg = 'Enter Username and Password First to monitor Portal';
        include 'wrong_login.php';
    }
    else
    {
        $name = 'Monitor';
        include 'side_nav_and_header.php'; 
?>
<!---------------------------Main Body--------------------------->

<?php 
        if(isset($_POST['selected_quiz']) || isset($selected_quiz))
        {
            if(isset($_POST['selected_quiz']))
            $selected_quiz=$_POST['selected_quiz'];
                
        }
        
?>
<div  style="background-color:">
		<div class="row">
			<div class="hoverable col s12 center">
				<div class="row"></div>
				
			
<!----------------------------------------list of quiz -------------------->
    
                <form action="monitor.php" method="post">
                <div class="col s6 offset-s1">
                    <?php include 'quiz_list.php'; ?>
                </div>
                <div class="col s1">
                        <button class="btn waves-effect waves-light" type="submit" name="action">GO
                        <i class="material-icons right">send</i>
                        </button> 
                </div>
                </form>
                </div>
		</div>
	</div>	
<?php if(isset($selected_quiz))if($selected_quiz!=-1){?> 

<!---------------------------------------Print Status Message--------------------------------------------->

           <div class="center"><h5>
               <span class="card-title activator grey-text text-darken-4"><b style="color:red"><?php if(isset($msg)){?><i class="material-icons prefix">priority_high</i> <?php echo $msg; } if(isset($selected_quiz)){?></b></span></h5>
</div>
	

<!------------------------------------------ User Informztion Table --------------------------------->
	
    <div class="row">
        <style>
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
    opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: red;
}

::-ms-input-placeholder { /* Microsoft Edge */
    color: red;
               }</style>
	<div class="col s10  offset-s1">
      <table class="striped">
        <thead>
          <tr style="background-color:skyblue" class="z-depth-2">
              <th style="width:4%">ID</th>
              <th style="width:11%">First Name</th>
              <th style="width:11%">Last Name</th>
			  <th style="width:11%">Username</th>
			  <th style="width:11%">Password</th>
			  <th style="width:11%">Start time</th>
			  <th style="width:11%">Finished</th>
			  <th style="width:11%">Time_Elapsed</th>
              <th style="width:11%">Score</th>
			  <th style="width:11%">Update</th>
          </tr>
        </thead>
                        <?php
                            
                            if(!$resultset = $database_handler->query("SELECT * from user where quiz_id = $selected_quiz;"))
                            {
			                     die("Query error");
                            }
                            $count=1;
                            
                            while($row = $resultset->fetch_assoc())
                            {
                            
                        
                        ?>              
        <tbody>
          <form action="monitor_action.php" method="post">
          <input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>">
          <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
          <tr class="hoverable" style="border-bottom:none">
              <th><?php echo $count; ?></th>
              <th style="width:9%"><input style="width:100%"  type="text" name="firstname" value="<?php echo $row['firstname']; ?>" /></th>
              <th style="width:9%"><input style="width:100%"  type="text" name="lastname" value="<?php echo $row['lastname']; ?>" /></th>
              <th style="width:9%"><input style="width:100%"  type="text" name="username" value="<?php echo $row['username']; ?>" /></th>
              <th style="width:9%"><input style="width:100%"  type="text" name="passwd" value="<?php echo $row['password']; ?>" /></th>
              <th style="width:9%"><input style="width:100%"  type="text" name="time_started" value="<?php echo $row['time_started']; ?>" /></th>
              <th style="width:9%"><input style="width:100%"  type="text" name="time_finished" value="<?php echo $row['time_completed']; ?>" /></th>
              <th style="width:9%"><input style="width:100%"  type="text" name="time_elapsed" placeholder="<?php echo $row['time_elapsed']; ?>" /></th>
              <th style="width:9%"><input style="width:100%"  type="text" name="score" value="<?php echo $row['score']; ?>" /></th>
              <th ><button type="submit" value="submit" class="waves-effect waves-light btn-small">Change</button></th>
			  </tr>
          </form>
            <?php $count++;   } } }?>
        
        </tbody>
      </table>
	</div>
</div>




<?php  }?>
                		
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
 </html>
        
	