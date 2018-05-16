<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	require_once('authenticate.php');

	if(!isLoggedIn()){
		header("location: index.php");
		exit();
	}

	if(isset($_COOKIE['time_completed'])){
		echo "<meta http-equiv='refresh' content='0;url=finish.php'>";
		exit();
	}
?>
<html>
	<?php
		$title = "Quiz";
		include("header.php");
	?>
	<body>
		<script src="js/jquery.deserialize.js"></script>
		<script src="js/quiz.js"></script>
		<?php
			$heading = $_COOKIE['quiz_name'];
			$menu = array("Profile"=>"#", "Rules"=>"#", "Questions"=>"#");
			include("dashboard.php");
		?>
		<main class="center-align">
			<div class="container" id="Questions" style="display: none;">
				<?php include("questions.php"); ?>
			</div>

			<div class="container" id="Profile" style="display: none;">
				<?php include("profile.php"); ?>
			</div>

			<div class="container" id="Rules" style="display: block;">
				<?php include("rules.php"); ?>
			</div>

			<div id="auto-finish-modal" class="modal">
				<div class="modal-content">
					<h4>Quiz Finished</h4>
					<p>Your quiz time is over</p>
					<p>All the selected answers are submitted.</p>
				</div>
				<div class="modal-footer">
					<a href="#" id="auto-finish" class="waves-effect waves-green btn-flat">Finish</a>
				</div>
			</div>

			<div id="forced-finish-modal" class="modal">
				<div class="modal-content">
					<h4>Finish Quiz</h4>
					<p>Do you really want to end the quiz?</p>
					<p>All the selected answers will be submitted.</p>
				</div>
				<div class="modal-footer">
					<a href="#" id="forced-finish" class="waves-effect waves-green btn-flat">Finish</a>
					<a href="#" class="modal-close waves-effect waves-green btn-flat">Dismiss</a>
				</div>
			</div>
		</main>

	</body>
</html>
