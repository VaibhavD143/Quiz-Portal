<html>

	<?php
		$title = "Login";
		include("header.php");
	?>
	<body>
		<nav>
			<div class="nav-wrapper indigo darken-3">
				<a href="#" class="brand-logo center">Login To Attempt Quiz</a>
			</div>
		</nav>
		<div class="container" style="padding-top: 2%;">

			<div class="row">
  				<div class="col card hoverable s6 offset-s3 ">
    				<form method="POST" action="">
						<div class="center-align">
							<img src="imageset/csi-logo.png" alt="" class="circle responsive-img hoverable" style="padding-top: 2%; max-width: 40%;">
						</div>
						<div class="card-content center-align">
							<!--<span class="card-title">Login Details</span>-->
							<div class="row">
								<div class="input-field col s12">
									<label for="username">Username</label>
									<input type="text" class="validate" name="username" id="username" />
								</div>
								<div class="input-field col s12">
									<label for="password">Password </label>
									<input type="password" class="validate" name="password" id="password" />
								</div>
							</div>
						</div>
						<div class="card-action right-align">
							<button class="btn waves-effect waves-light indigo darken-1" type="reset" name="action">Reset
								<i class="material-icons right">restore</i>
							</button>
							<button class="btn waves-effect waves-light indigo darken-4" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
						</div>
			    	</form>
				</div>
			</div>

		</div>
	</body>
</html>
