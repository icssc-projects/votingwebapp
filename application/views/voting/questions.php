<?php
// Notes:
// $uid == Userid
// $team->tid == Team ID
// $question->qid == Question ID

foreach($teams->result() as $team) {
?>
<div data-role="page" data-add-back-btn="true" id="team<?php echo $team->number;?>">

	<div data-role="header">
		<h1>Team <?php echo $team->number; ?> - <?php echo $team->name; ?></h1>
		<div data-role="button" data-icon="alert" data-theme="e" class="ui-btn-right" data-iconpos="left" id="countDownTimer"></div>
		<!--<a href="#" data-icon="alert" data-theme="e" class="ui-btn-right" id="countDownTimer"></a>-->
	</div><!-- /header -->

	<div data-role="content">	
			<p>Team <?php echo $team->number; ?> - <?php echo $team->name; ?></p>
			<?php
			foreach($questions->result() as $question) {
			?>
			<fieldset data-role="controlgroup" data-mini="true">
				<legend><?php echo $question->question; ?></legend>
					<?php
					for($i = $question->minValue; $i <= $question->maxValue; $i++) {
						if($i == $question->minValue)
							$label = "- Poor";
						elseif($i == ceil(($question->maxValue - $question->minValue) / 2))
							$label = "- Average";
						elseif($i == $question->maxValue)
							$label = "- Excellent";
						else
							$label = "";
					?>

			     	<input type="radio" name="<?php echo $team->number; ?>[<?php echo $question->number; ?>]" id="<?php echo $team->number; ?>[<?php echo $question->number; ?>][<?php echo $i; ?>]" value="<?php echo $i; ?>" onchange="updateScore(<?php echo $uid; ?>, <?php echo $team->tid; ?>, <?php echo $question->qid; ?>, this);" />
			     	<label for="<?php echo $team->number; ?>[<?php echo $question->number; ?>][<?php echo $i; ?>]"><?php echo $i; ?> <?php echo $label; ?></label>
			<!-- <div id="state" style="color:red;">Updated!</div> -->
			<?php
				} // ends $i
			?>
			<br /><br />
			</fieldset>
			<?php
			} // ends $questions
			?>
		</div><!-- /content -->

		<div data-role="footer">
			<h4>Created by Adam Brenner for MedAppJam</h4>
		</div><!-- /footer -->
</div><!-- /page -->
<?php
} // ends $teams
?>