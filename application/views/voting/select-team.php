<div data-role="page" data-add-back-btn="true" id="selectTeams">

	<div data-role="header">
		<h1>VotingApp</h1>
		<a href="#" data-icon="alert" data-theme="e" class="ui-btn-right">2 Hours, 59 minutes, 59 seconds</a>
	</div><!-- /header -->

	<div data-role="content">	
		<ul data-role="listview" data-theme="c" data-divider-theme="b" data-count-theme="e">
			<?php
			foreach($teams->result() as $row) {
			?>
			<li data-role="list-divider">Team <?php echo $row->number; ?><span class="ui-li-count">Pending</span></li>
			<li><a href="#team<?php echo $row->number; ?>" data-transition="slide">
				<h3><?php echo $row->name; ?></h3>
				<p><?php echo $row->description; ?></p>
				<p class="ui-li-aside"><strong><?php echo $row->location; ?></strong></p>
				</a>
			</li>
			<?php
			}
			?>

			<li data-role="list-divider">Team 3<span class="ui-li-count" style="border:1px solid green;text-shadow:none;background:green;color:white">Completed</span></li>
			<li><a href="#team3" data-transition="slide">
				<h3>Awk Talk</h3>
				<p>Group of blah blah blah</p>
				<p class="ui-li-aside"><strong>Table 3</strong></p>
				</a>
			</li>
		</ul>
	</div><!-- /content -->

</div><!-- /page -->