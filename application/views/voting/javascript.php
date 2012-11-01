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
		xmlhttp.open("GET", "<?php echo $siteurl; ?>index.php/voting/votingAjax/uid/" + judge + "/tid/" + team + "/question/" + question + "/value/" + value,true);
		xmlhttp.send();
}

$(document).ready(function() {
$("#state").hide();

$(function () {
	var startTime = new Date("Oct 30, 2012 13:34:00");

	$('#countDownTimer').countdown({
		until: startTime,
		format: 'hms',
		expiryText: 'Hurry Up!',
		alwaysExpire: true,
		/* 
		{d<} == start tag for days 
		{dn} == days left
		{dl} == the acutal word "days" or "day"
		{d>} == close tag for days
		*/
		layout: '{h<}{hn}{hl}{h>}, {m<}{mn}{ml}{m>}, {s<}{sn}{sl}{s>}'
	});
});

});

</script>
