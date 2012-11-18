<?php
// Notes:
// $uid == Userid
// $team->tid == Team ID
// $question->qid == Question ID

foreach($teams->result() as $team) {
?>
<div data-role="page" id="team<?php echo $team->number;?>" data-dom-cache="false">

	<div data-role="header">
		<a href="<?php echo $siteurl;?>index.php/voting/index/" data-icon="arrow-l" data-theme="a" data-transition="slide" data-direction="reverse" class="ui-btn-left">Back</a>
		<h1>Team <?php echo $team->number; ?> - <?php echo $team->name; ?></h1>
		<a href="#" data-icon="alert" data-theme="e" class="ui-btn-right"><?php echo $timeLeft; ?></a>
	</div><!-- /header -->

	<div data-role="content">	
			<p><?php echo $team->name; ?></p>
			<?php
			foreach($questions->result() as $question) {
			?>
			<fieldset data-role="controlgroup" data-mini="true">
				<legend><?php echo $question->question; ?></legend>
					<?php
					for($i = $question->minValue; $i <= $question->maxValue; $i++) {
						if($i == $question->minValue)
							$label = "- Poor";
						elseif($i == floor(($question->maxValue + $question->minValue) / 2))
							$label = "- Average";
						elseif($i == $question->maxValue)
							$label = "- Excellent";
						else
							$label = "";
					?>

			     	<input type="radio" name="<?php echo $team->number; ?>[<?php echo $question->number; ?>]" id="<?php echo $team->number; ?>[<?php echo $question->number; ?>][<?php echo $i; ?>]" value="<?php echo $i; ?>" onchange="updateScore(<?php echo $uid; ?>, <?php echo $team->tid; ?>, <?php echo $question->qid; ?>, this);" <?php echo $results[$question->number] != 0 && $i == $results[$question->number] ? 'checked="checked"' : ''; ?> />
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