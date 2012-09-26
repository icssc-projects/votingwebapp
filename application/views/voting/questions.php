<?php
foreach($teams->result() as $team) {
//	foreach($questions->result() as $question) {
?>
<div data-role="page" data-add-back-btn="true" id="team<?php echo $team->number;?>">

	<div data-role="header">
		<h1>Team <?php echo $team->number; ?> - <?php echo $team->name; ?></h1>
		<a href="#" data-icon="alert" data-theme="e" class="ui-btn-right">2 Hours, 59 minutes, 59 seconds</a>
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

			     	<input type="radio" name="<?php echo $team->number; ?>[<?php echo $question->number; ?>]" id="<?php echo $team->number; ?>[<?php echo $question->number; ?>]" value="<?php echo $i; ?>" />
			     	<label for="<?php echo $team->number; ?>[<?php echo $question->number; ?>]"><?php echo $i; ?> <?php echo $label; ?></label>
			
			<?php
				} // ends $i
			?>
			<br /><br />
			</fieldset>
			<?php
			} // ends $questions
			?>
		</div><!-- /content -->

</div><!-- /page -->
<?php
} // ends $teams
?>