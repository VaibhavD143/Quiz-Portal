<html>

	<?php
		$title = "Available Quizzes";
		include("header.php");
	?>
	<body>
		<nav>
			<div class="nav-wrapper indigo darken-3">
				<a href="#" class="brand-logo center">Available Quizzes</a>
			</div>
		</nav>
		<div class="container" style="padding-top: 2%;">

			<div class="row">
  				<div class="col card hoverable s6 offset-s3 ">
					<div class="center-align">
						<img src="imageset/csi-logo.png" alt="" class="circle responsive-img hoverable" style="padding-top: 2%; max-width: 40%;">
					</div>
					<div class="card-content center-align">
						<span class="card-title blue-text text-darken-4"><h4>Select</h4></span>
						<div class="row">
							<div class="col s12">
								<div class="collection center-align">
									<!--<div class="collection-header blue-text text-darken-4"><h4>Select</h4></div>-->
									<?php $quizzes=array("Quiz1"=>"1", "Quiz2"=>"2");
									foreach($quizzes as $name => $id) { ?>
										<a href="login.php?qid=<?php echo $id; ?>" class="collection-item waves-effect waves-light indigo darken-1 white-text"><?php echo $name; ?></a>
									<?php } ?>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>


		</div>
	</body>
</html>
