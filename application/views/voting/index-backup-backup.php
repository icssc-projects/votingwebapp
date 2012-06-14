
<div id="container">
	<!--<h1>AppJam Voting</h1>-->
	
	<div id="body">
	<img src ="/img/logo.png"/>
		<p>
			<ul class="breadcrumb">
				<?php foreach($teams->result_array() as $row){?>
				<li id="tab<?php echo $row['id']; ?>"><a href="#"><?php echo $row['name']; ?></a></li>
				<?php } ?>
				<br/><br />
				<li id="submit"><a href="#">Submit</a></li>
				<!--<li class ="blank"><a href="#">&nbsp;</a></li>-->
			</ul>
			<div id="info"></div>
			<div id="forms">
			Higher score = Better Score <br /> Make sure you vote on every category on every team before you submit!<br />
			The submit button will show up once you have completed the form for every team.<br />
				<form id="judging-form" name="judging-form" method="POST" action="<?php echo $siteurl;?>index.php/voting/verifySubmission/">

					<?php foreach($teams->result_array() as $row){?>
					<span id="<?php echo $row['id']; ?>">
						<h2><?php echo $row['name']; ?></h2>
							<div id="total<?php echo $row['id']; ?>"Total for this Team: <br/><h2>0 out of 42 points</h2></div>	
							<table>
								<tr>How well does the application fulfill the theme of self-improvement?</tr>
								<tr>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="3" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="4" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="5" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="6" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="7" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="8" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="9" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[1]" value="10" /></td>
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
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[2]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[2]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[2]" value="3" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[2]" value="4" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[2]" value="5" /></td>
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
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[3]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[3]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[3]" value="3" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[3]" value="4" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[3]" value="5" /></td>
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
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[4]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[4]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[4]" value="3" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[4]" value="4" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[4]" value="5" /></td>
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
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[5]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[5]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[5]" value="3" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[5]" value="4" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[5]" value="5" /></td>
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
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[6]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[6]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[6]" value="3" /></td>
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
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[7]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[7]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[7]" value="3" /></td>
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
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[8]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[8]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[8]" value="3" /></td>
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
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[9]" value="1" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[9]" value="2" /></td>
									<td><input class="radio" type="radio" name="<?php echo $row['id']; ?>[9]" value="3" /></td>
								</tr>
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
								</tr>
							</table>
									
					</span>
					<?php } ?>
					<span id="verify">Submit!
						<input id="saveForm" type="submit" value="Submit" />
						</span>
				</form>
			</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
		$("span").hide();
		$("#submit").hide();
		
		<?php foreach($teams->result_array() as $row){?>
		$("#<?php echo $row['id']; ?>").hide();
		var team<?php echo $row['id']; ?>total = 0;
		<?php } ?>

		<?php foreach($teams->result_array() as $row){?>
		
		$("#tab<?php echo $row['id']; ?>").click(function(){
			$("span").hide();
			$("#<?php echo $row['id']; ?>").fadeIn(1000);
			
			
		});
		<?php } ?>


		$("#submit").click(function()
		{
			$("span").hide();
			$("#verify").fadeIn(1000);
		});
		

		<?php foreach($teams->result_array() as $row){?>
			<?php for ($i = 1; $i <= 9; $i++) {?>
			$("input[name='<?php echo $row['id'];?>[<?php echo $i;?>]']").click(function()
			{
				team<?php echo $row['id']; ?>total = 0;
				<?php for ($j=1; $j<=9; $j++) {?>
					if($("input[name='<?php echo $row['id']; ?>[<?php echo $j;?>]']").is(":checked"))
					{
						team<?php echo $row['id']; ?>total += parseInt($("input[name='<?php echo $row['id']; ?>[<?php echo $j;?>]']:checked").val());
					}
				<?php } ?>
				
				 $('#total<?php echo $row['id']; ?>').html('<h2>'+team<?php echo $row['id']; ?>total+' out of 42 points</h2>');
			 });
			<?php } ?>
		<?php } ?>
		
		
		<?php foreach($teams->result_array() as $row){?>
		$('input').click(function()
		{
			if (($("input[name='<?php echo $row['id']; ?>[1]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[2]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[3]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[4]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[5]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[6]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[7]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[8]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[9]']").is(':checked')))
					{
						$("#tab<?php echo $row['id']; ?>").addClass("complete");
						
					}
		
			if(($("#tab1").hasClass("complete")) &&
				($("#tab2").hasClass("complete")) &&
				($("#tab3").hasClass("complete")) &&
				($("#tab4").hasClass("complete")) &&
				($("#tab5").hasClass("complete")) &&
				($("#tab6").hasClass("complete")) &&
				($("#tab7").hasClass("complete")) &&
				($("#tab8").hasClass("complete")) &&
				($("#tab9").hasClass("complete")) &&
				($("#tab10").hasClass("complete")))
				{
					$("#submit").fadeIn(1000);
				}
		});
		<?php } ?>



	});
</script>