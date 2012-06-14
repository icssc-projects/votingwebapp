<?php

print_r($_POST);

?>

<form id="judging-form" name="judging-form" method="POST" action="posting.php">
	<table>
									<tr>How well does the application fulfill the theme of self-improvement?</tr>
									<tr>
										<td><input type="radio"  name="team1[q1]" value="1" /></td>
										<td><input type="radio"  name="team1[q1]" value="2" /></td>
										<td><input type="radio"  name="team1[q1]" value="3" /></td>
										<td><input type="radio"  name="team1[q1]" value="4" /></td>
										<td><input type="radio"  name="team1[q1]" value="5" /></td>
										<td><input type="radio"  name="team1[q1]" value="6" /></td>
										<td><input type="radio"  name="team1[q1]" value="7" /></td>
										<td><input type="radio"	 name="team1[q1]" value="8" /></td>
										<td><input type="radio"  name="team1[q1]" value="9" /></td>
										<td><input type="radio"  name="team1[q1]" value="10" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
										<td>5</td>
										<td>6</td>
										<td>7</td>
										<td>8</td>
										<td>9</td>
										<td>10</td>
									</tr>
								</table>
								<table>
									<tr>Is the application user friendly?</tr>
									<tr>
										<td><input type="radio"  name="team1[q2]" value="1" /></td>
										<td><input type="radio"  name="team1[q2]" value="2" /></td>
										<td><input type="radio"  name="team1[q2]" value="3" /></td>
										<td><input type="radio"  name="team1[q2]" value="4" /></td>
										<td><input type="radio"  name="team1[q2]" value="5" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
										<td>5</td>
									</tr>
								</table>
								<table>
									<tr>Does the application meet its own requirements?</tr>
									<tr>
										<td><input type="radio"  name="team[]" value="1" /></td>
										<td><input type="radio"  name="team[]" value="2" /></td>
										<td><input type="radio"  name="team[]" value="3" /></td>
										<td><input type="radio"  name="team[]" value="4" /></td>
										<td><input type="radio"  name="team[]" value="5" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
										<td>5</td>
									</tr>
								</table>
								<table>
									<tr>How complete and robust is the application?</tr>
									<tr>
										<td><input type="radio"  name="team[]" value="1" /></td>
										<td><input type="radio"  name="team[]" value="2" /></td>
										<td><input type="radio"  name="team[]" value="3" /></td>
										<td><input type="radio"  name="team[]" value="4" /></td>
										<td><input type="radio"  name="team[]" value="5" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
										<td>5</td>
									</tr>
								</table>
								<table>
									<tr>How unique is this application?</tr>
									<tr>
										<td><input type="radio" name="team[]" value="1" /></td>
										<td><input type="radio" name="team[]" value="2" /></td>
										<td><input type="radio" name="team[]" value="3" /></td>
										<td><input type="radio" name="team[]" value="4" /></td>
										<td><input type="radio" name="team[]" value="5" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
										<td>5</td>
									</tr>
								</table>
								<table>
									<tr>Does the technological/design innovation provide a sustainable,</tr><tr> competitive advantage in the given theme?</tr>
									<tr>
										<td><input type="radio" name="team[]" value="1" /></td>
										<td><input type="radio" name="team[]" value="2" /></td>
										<td><input type="radio" name="team[]" value="3" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
									</tr>
								</table>
								<table>
									<tr>Does a competitive advantage exist over other applications in the given theme?</tr>
									<tr>
										<td><input type="radio" name="team[]" value="1" /></td>
										<td><input type="radio" name="team[]" value="2" /></td>
										<td><input type="radio" name="team[]" value="3" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
									</tr>
								</table>
								<table>
									<tr>Is the application description clear and detailed?</tr>
									<tr>
										<td><input type="radio" name="team[]" value="1" /></td>
										<td><input type="radio" name="team[]" value="2" /></td>
										<td><input type="radio" name="team[]" value="3" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
									</tr>
								</table>
								<table>
									<tr>Are the benefits to the user clear and sufficient?</tr>
									<tr>
										<td><input type="radio" name="team[]" value="1" /></td>
										<td><input type="radio" name="team[]" value="2" /></td>
										<td><input type="radio" name="team[]" value="3" /></td>
									</tr>
									<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
									</tr>
								</table>
	<input id="saveForm" class="bluebutton" type="submit" value="Submit" />
</form>