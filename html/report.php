<?php
include "includes/config.php";
include "includes/db.php";
include "includes/storage.php";
include "includes/report.php";

$csids = get_all_unique_csids();
?>
<html>
<head>
<title>Report</title>
<link rel="stylesheet" href="css/screen.css" type="text/css"/>  
</head>
<body style="padding: 50px">
<h1>Report</h1>
<br/>
<table>
<?php
foreach($csids as $csid)
{
	$feedback = get_feedback_for($csid);
	$stats = get_stats_for($feedback);
	//print_r($a);
	
	echo '<tr>';
	echo '<td width=150>' . convert_to_nickname($csid) .'</td>';
	echo '<td width=150 class="stat">' . ($stats['percent_positive'] * 100) .'% happy</td>';
	
	# draw smileys
	echo '<td>';
	foreach ($feedback as $response)
	{
		echo '<img src="images/smiley/' . $response['mood'] . '.png" width=40 height=40 ';
		echo 'title="ticket:' . $response['tid'] . '" />';
	}
	echo '</td>';
	
	echo '</tr>';
}
?>
</table>
</body>
</html>