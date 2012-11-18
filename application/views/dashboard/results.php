<div data-role="page" id="results" data-dom-cache="false">

	<div data-role="header">
		<h1>VotingApp - Results</h1>
		<a href="<?php echo $siteurl;?>" data-icon="alert" data-theme="a" class="ui-btn-right">Login</a>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Voting Results</h2>
			<ol data-role="listview" data-inset="true" data-count-theme="b" data-split-theme="d">
				<?php
				$count = 0;
				foreach($results->result() as $result){
				?>
				<li data-theme="<?php if($count++ < 3) echo "e"; else echo "c"; ?>">
					<a href="#">
						<?php echo $result->name; ?>
						<p><br />Total Responses: <?php echo $result->count; ?></p>
						<span class="ui-li-count"><?php echo $result->total; ?></span>
					</a>
				</li>
				<?php
				}
				?>
			</ol>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Created by Adam Brenner for MedAppJam</h4>
	</div><!-- /footer -->
</div><!-- /page -->