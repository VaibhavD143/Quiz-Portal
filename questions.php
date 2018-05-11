<h1>Questions</h1>

<form action="quizSubmit()">
	<div class="row">
	<?php for($i=1 ; $i<=10 ; $i++) {?>
		<div class="col s12 m12 white-text">
			<div class="card horizontal hoverable indigo lighten-3">
				<div class="card-image">
					<!--<img src="imageset/dashboard-background.jpeg">-->
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<span class="badge indigo white-text hoverable"><?php echo $i; ?></span>
						<p>I am a very simple card. I am good at containing small bits of information.</p>
					</div>
					<div class="card-action">
						<div class="row">
							<?php for($j=1 ; $j<=4 ; $j++) {?>
								<label class="col s6 white-text">
									<input name="question<?php echo $i; ?>" type="radio" value="option<?php echo $j; ?>"/>
									<span>Option <?php echo $j; ?></span>
								</label>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
	<div class="fixed-action-btn">
		<a class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="left" data-tooltip="Submit Quiz"><i class="material-icons">check</i></a>
	</div>
	</div>
</form>
