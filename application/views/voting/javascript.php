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
		xmlhttp.open("GET", "<?php echo $siteurl; ?>/index.php/voting/votingAjax/uid/" + judge + "/tid/" + team + "/question/" + question + "/value/" + value,true);
		xmlhttp.send();
}
</script>
