<!--------------------- Header and Side nav bar code ---------------->
<?php
session_start();
if(!isset($_SESSION["uname"]))
    {
        $msg = 'Enter Username and Password First to creat new quiz';
        include 'wrong_login.php';
    }
    else
    {
        $name = 'Create a New Quiz';
        include 'side_nav_and_header.php'; 
?>
<!---------------------------Main Body--------------------------->

    <div class="row">
	   <div class="col s4 offset-s4">
           <div class="card hoverable" >
               <div class="card-image" style="width:70%; left:15%;" >
				    <img  src="images/quiz-back.jpg">
					<span class="card-title">Create Your Quiz</span>
				</div>
				<div class="card-content">
				    <form action="./add.php" method="post">
                        <div class="input-field">
                            <i class="material-icons prefix">title</i>
							<input id="icon_prefix" name='name' type="text" class="validate" required>
							<label for="icon_prefix">QuizName</label>
						</div>
                     
				        <div class="input-field">
						  <i class="material-icons prefix">query_builder</i>
						  <input id="icon_prefix" type="number" name="duration" min="0" class="validate" required>
						  <label for="icon_prefix">Duration</label>
						</div>
                        <div class="card-action">
						<button class="btn waves-effect dark-blue waves-light"  type="submit" name="action">Submit
                            <i class="material-icons right">send</i></button>
				        </div>
				    </form>
                </div>
            </div>
        </div>
    </div>
		
	


<!---------------------- Footer--------------------------------------->
<?php include 'footer.php'; }?>
	