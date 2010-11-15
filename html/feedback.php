<?php
include "includes/db.php";

$tid = isset($_GET['tid'])?(int)$_GET['tid']:null;
$csid = isset($_GET['csid'])?(int)$_GET['csid']:null;
$hash = isset($_GET['hash'])?db_clean_input($_GET['hash']):null;

include "includes/config.php";
include "includes/template_feedback.php";
?>