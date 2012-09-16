<div id="container">
	<h1>AMASE Results</h1>

<?php

function number_suffix($number){
 
    // Validate and translate our input
    if ( is_numeric($number)){
 
        // Get the last two digits (only once)
        $n = $number % 100;
 
    } 
    else {
        // If the last two characters are numbers
        if ( preg_match( '/[0-9]?[0-9]$/', $number, $matches )){
 
            // Return the last one or two digits
            $n = array_pop($matches);
        } 
        else {
 
            // Return the string, we can add a suffix to it
            return $number;
        }
    }
 
    // Skip the switch for as many numbers as possible.
    if ( $n > 3 && $n < 21 )
        return $number . 'th';
 
    // Determine the suffix for numbers ending in 1, 2 or 3, otherwise add a 'th'
    switch ( $n % 10 ){
        case '1': return $number . 'st';
        case '2': return $number . 'nd';
        case '3': return $number . 'rd';
        default:  return $number . 'th';
    }
}

?>
	<div id="body">
		<p>Results: - CS-190<br /></p>
		
		<table border="1" cellpadding="5" cellspacing="5" width="100%">
		<tr>
			<th>Team</th>
			<th>Rank</th>
		</tr>
		
		<?php
		$rank = 1;
		foreach($resultsCS190->result_array() as $row){
		?>
		<tr>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo number_suffix($rank++); ?></td>
		</tr>
		<?php
		}
		?>

		</table>
		
		<br /><hr /><br />
			<p>Results: - General<br /></p>

			<table border="1" cellpadding="5" cellspacing="5" width="100%">
			<tr>
				<th>Team</th>
				<th>Rank</th>
			</tr>

			<?php
			$rank = 1;
			foreach($resultsGeneral->result_array() as $row){
			?>
			<tr>
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo number_suffix($rank++); ?></td>
			</tr>
			<?php
			}
			?>

			</table>

	</div>
