

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
				<li id="submit"><a href="#">COMPLETED!</a></li>
				<!--<li class ="blank"><a href="#">&nbsp;</a></li>-->
			</ul>
			<div id="info"></div>
			<div id="forms">
			Higher score = Better Score <br /> Make sure you vote on every category on every team!<br />
			Each team will turn <font color="#8ad354">green</font> when all questions have been completed<br />
				<form id="judging-form" name="judging-form" method="POST" action="<?php echo $siteurl;?>index.php/voting/verifySubmission/">

					<?php foreach($teams->result_array() as $row){?>
					<span id="<?php echo $row['id']; ?>">
						<h2><?php echo $row['name']; ?></h2>
							<div id="total<?php echo $row['id']; ?>"><h2>0 out of 50 points</h2></div>	
							<table>
								<tr>Creativity: How creative is this application comparing to existing apps?</tr>
								<tr>
									<?php for($i = 1; $i <= 10; $i++) {?>
									<td><input class="radio" type="radio" onchange="updateScore(<?php echo $uid; ?>, <?php echo $row['id']; ?>, 1, this);" name="<?php echo $row['id']; ?>[1]" value="<?php echo $i; ?>" <?php echo $responses[$row['id']][1][$i]." "; ?>/></td>
									<?php } ?>

								</tr>
								
								<tr>
									<?php for($i = 1; $i <= 10; $i++) {?>
									<td><?php echo $i; ?></td>
									<?php } ?>
								</tr>
							</table>
							<table>
								<tr>Market: How much do you think it will be successful in the market?</tr>
								<tr>
									<?php for($i = 1; $i <= 15; $i++) {?>
									<td><input class="radio" type="radio" onchange="updateScore(<?php echo $uid; ?>, <?php echo $row['id']; ?>, 2, this);" name="<?php echo $row['id']; ?>[2]" value="<?php echo $i; ?>" <?php echo $responses[$row['id']][2][$i]." "; ?>/></td>
									<?php } ?>
								</tr>
								<tr>
									<?php for($i = 1; $i <= 15; $i++) {?>
									<td><?php echo $i; ?></td>
									<?php } ?>
									
								</tr>
							</table>
							<table>
								<tr>Technology: How high is the level of technologies applied in this application?</tr>
								<tr>
									<?php for($i = 1; $i <= 15; $i++) {?>
									<td><input class="radio" type="radio" onchange="updateScore(<?php echo $uid; ?>, <?php echo $row['id']; ?>, 3, this);" name="<?php echo $row['id']; ?>[3]" value="<?php echo $i; ?>" <?php echo $responses[$row['id']][3][$i]." "; ?>/></td>
									<?php } ?>
								</tr>
								<tr>
									<?php for($i = 1; $i <= 15; $i++) {?>
									<td><?php echo $i; ?></td>
									<?php } ?>
								</tr>
							</table>
							<table>
								<tr>Usability: Is this app user-friendly?</tr>
								<tr>
									<?php for($i = 1; $i <= 10; $i++) {?>
									<td><input class="radio" type="radio" onchange="updateScore(<?php echo $uid; ?>, <?php echo $row['id']; ?>, 4, this);" name="<?php echo $row['id']; ?>[4]" value="<?php echo $i; ?>" <?php echo $responses[$row['id']][4][$i]." "; ?>/></td>
									<?php } ?>
								</tr>
								<tr>
									<?php for($i = 1; $i <= 10; $i++) {?>
									<td><?php echo $i; ?></td>
									<?php } ?>
								</tr>
							</table>
							
									
					</span>
					<?php } ?>
					<span id="verify">
						<br /><br />
						
						THANK YOU for submitting your votes. They have been added to the database. Please return this device back to AMASE.
						
						
						</span>
				</form>
							<div id="state" style="color:red;">Updated!</div>
			</div>
	</div>
</div>
<script type="text/javascript">

/* Uncomment this to enable Ajax update*/
function updateScore(judge, team, question, elem)
{
 var xmlhttp;
 value = elem.getAttribute("value");
 if (window.XMLHttpRequest)
	   	{// code for IE7+, Firefox, Chrome, Opera, Safari
	     	xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp.onreadystatechange=function()
		{
		    if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		         document.getElementById("state").innerHTML=xmlhttp.responseText + "<br />";
				 $("#state").show(500);
				 $("#state").hide(500);
			}
		}
		xmlhttp.open("GET", "/index.php/voting/votingAjax/?j=" + judge + "&t=" + team + "&q=" + question + "&v=" + value,true);
		xmlhttp.send();
}

$(document).ready(function() {
		$("#state").hide();
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
				
				 $('#total<?php echo $row['id']; ?>').html('<h2>'+team<?php echo $row['id']; ?>total+' out of 50 points</h2>');
			 });
			<?php } ?>
		<?php } ?>
		
		
		<?php foreach($teams->result_array() as $row){?>
		$('input').click(function()
		{
			if (($("input[name='<?php echo $row['id']; ?>[1]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[2]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[3]']").is(':checked')) &&
					($("input[name='<?php echo $row['id']; ?>[4]']").is(':checked')))
					{
						$("#tab<?php echo $row['id']; ?>").addClass("complete");
						
					}
		
		
		// one for each team  
			if(($("#tab1").hasClass("complete")) &&
				($("#tab2").hasClass("complete")) &&
				($("#tab3").hasClass("complete")) &&
				($("#tab4").hasClass("complete")) &&
				($("#tab5").hasClass("complete")) &&
				($("#tab6").hasClass("complete")) &&
				($("#tab7").hasClass("complete")) &&
				($("#tab8").hasClass("complete")) &&
				($("#tab9").hasClass("complete")) &&
				($("#tab10").hasClass("complete")) &&
				($("#tab11").hasClass("complete")) &&
				($("#tab12").hasClass("complete")) &&
				($("#tab13").hasClass("complete")) &&
				($("#tab14").hasClass("complete")) &&
				($("#tab15").hasClass("complete")) &&
				($("#tab16").hasClass("complete")) &&
				($("#tab17").hasClass("complete")) &&
				($("#tab18").hasClass("complete")) &&
				($("#tab19").hasClass("complete")) &&
				($("#tab20").hasClass("complete")) &&
				($("#tab21").hasClass("complete")))
				{
					$("#submit").fadeIn(1000);
				}
		});
		<?php } ?>



	});
</script>
