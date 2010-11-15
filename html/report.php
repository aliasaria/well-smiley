<?php
include "includes/config.php";
include "includes/db.php";
include "includes/storage.php";
include "includes/report.php";

//do auth
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'You pushed cancel.';
    exit;
} else if (
				$_SERVER['PHP_AUTH_USER'] != REPORT_USER_NAME &&
				$_SERVER['PHP_AUTH_PW']   != REPORT_PASSWORD
		) 
{
	header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Unauthorized";
	exit;
} else {
    //echo "<p style=\"font-family: Zapfino, cursive;\">Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    //echo "<p style=\"font-family: Zapfino, cursive;\">You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
}


$csids = get_all_unique_csids();
?>
<html>
<head>
<title>Report</title>
<link rel="stylesheet" href="css/screen.css" type="text/css"/>  
</head>
<body style="padding: 50px; background: white">
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
	
	echo '<td width=150 class="stat">';
	echo ($stats['percent_positive'] * 100) .'% happy<br />';
	echo $stats['count'] . ' ratings';
	echo '</td>';
	
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