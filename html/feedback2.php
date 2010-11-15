<?php
include "includes/config.php";
include "includes/db.php";
include "includes/storage.php";
include "includes/validation.php";

//Get the mood parameter from the request URL
//and clean it up so it can be used in future database queries
//by only allowing a few set values
$mood = null;
if (isset($_GET['mood']))
{
	switch ($_GET['mood'])
	{
		case "happy":
			$mood = "happy";
			break;
		case "sad":
			$mood = "sad";
			break;
		case "neutral":
			$mood = "neutral";
			break;
		default:
			$mood = null;
			break;
	}
}

//process input
$tid = isset($_GET['tid'])?(int)$_GET['tid']:null;
$csid = isset($_GET['csid'])?(int)$_GET['csid']:null;
$hash = isset($_GET['hash'])?db_clean_input($_GET['hash']):null;

include "includes/template_feedback2.php";

//write to db
if (validate_hash($tid, $csid, $hash))
{
	# validate will effectively also check if all the params are
	# set (otherwise it wouldn't validate). so we don't check if
	# there are values to store.
	# @TODO: actually -- it doesn't check the mood is okay. this is
	# should be fixed later (validate input)
	store_feedback($tid, $csid, $mood);
}
else
{
	//echo "failed to validate, so not writing";
}
?>