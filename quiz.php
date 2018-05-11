<html>
	<?php
		$title = "Quiz";
		include("header.php");
	?>

	<body>
		<?php
			$heading = "Quiz Name";
			$menu = array("Questions"=>"#", "Profile"=>"#", "Rules"=>"#");
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
		</main>

	</body>
</html>
