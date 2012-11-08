<div data-role="page" id="selectTeams" data-dom-cache="false">

	<div data-role="header">
		<h1>VotingApp</h1>
		<a href="#" data-icon="alert" data-theme="e" class="ui-btn-right"><?php echo $timeLeft; ?></a>
	</div><!-- /header -->

	<div data-role="content">	
		<ul data-role="listview" data-theme="c" data-divider-theme="b" data-count-theme="e">
			<?php
			foreach($teams->result() as $row) {
			?>
			<li data-role="list-divider">Team <?php echo $row->number; ?><?php echo $votingStatus[$row->number] ? '<span class="ui-li-count" style="border:1px solid green;text-shadow:none;background:green;color:white">Completed</span>' : '<span class="ui-li-count">Pending</span>' ?></li>
			<li><a href="<?php echo $siteurl; ?>index.php/voting/team/<?php echo $row->number; ?>/" data-transition="slide">
				<h3><?php echo $row->name; ?></h3>
				<p><?php echo $row->description; ?></p>
				<p class="ui-li-aside"><strong><?php echo $row->location; ?></strong></p>
				</a>
			</li>
			<?php
			}
			?>
		</ul>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Created by Adam Brenner for AppJam+</h4>
	</div><!-- /footer -->
</div><!-- /page -->