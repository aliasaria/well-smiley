<?php
include "includes/config.php";
include "includes/db.php";
include "includes/storage.php";
include "includes/validation.php";
?>
<html>
<head>
<title>Feedback</title>
<link rel="stylesheet" href="css/screen.css" type="text/css"/>  
</head>
<div class="topbar">&nbsp;</div>
<div id="content">
        <div id="header">
			<h1>Thanks! Honestly, we really appreciate your input.</h1>
		</div>
<body>
</body>
</html>
<?php
//write this comment to the db
$tid = isset($_POST['tid'])?(int)$_POST['tid']:null;
$csid = isset($_POST['csid'])?(int)$_POST['csid']:null;
$hash = isset($_POST['hash'])?db_clean_input($_POST['hash']):null;

if (validate_hash($tid, $csid, $hash))
{
	store_long_feedback($tid, $comments);
}
?>