<div id="container">
	<h1>AppJam Results</h1>

	<div id="body">
		<p>Results:<br /></p>
		
		<table border="1" cellpadding="5" cellspacing="5" width="100%">
		<tr>
			<th>Team</th>
			<th>Score</th>
			<th>Responses</th>
		</tr>
		
		<?php
		foreach($results->result_array() as $row){
		?>
		<tr>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["score"]; ?></td>
			<td><?php echo $row["responseCount"]; ?></td>
		</tr>
		<?php
		}
		?>

		</table>

	</div>
