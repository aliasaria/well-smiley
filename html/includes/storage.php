<?php


function create_tables()
{
	global $database;
	
	$query = 
	  'CREATE TABLE feedback (tid INTEGER, csid INTEGER, mood TEXT, date TEXT, longfeedback TEXT) ';
		
	if(!$database->queryExec($query, $error))
	{
	  die($error);
	}
}


function store_feedback($ticket_id, $customer_service_representative, $mood)
{
	global $database;
		
	# First let's check if anything's been recorded for this ticket_id
	$sql = 'SELECT COUNT(*) AS count FROM feedback WHERE tid=' . $ticket_id;
	$result = $database->query($sql);

	$a = $result->fetch(SQLITE_ASSOC);
	//print_r($a);
	if ($a['count'] > 0)
	{
		# it exists, so just update the existing one. if it is in the db multiple times, this
		# won't fix it.
		//echo "exists " . $a['count'];
		$sql = 'UPDATE feedback SET mood = "' . $mood . '" WHERE tid = "' . $ticket_id . '"';
		$database->queryExec($sql);
	}
	else
	{
		$query = 
		  'INSERT INTO feedback (tid, csid, mood, date) ' .
		  'VALUES ("' . $ticket_id . '", "'
		. $customer_service_representative. '", "' 
		. $mood . '",' 
		. '"' . date("Y-m-d H:i:s") . '")';
		//echo $query;
		if(!$database->queryExec($query, $error))
		{
			//create_tables();
		 	die($error);
		}
	}
}

function store_long_feedback($ticket_id, $long_feedback)
{
	global $database;
	
	$ticket_id = db_clean_input($ticket_id);
	$long_feedback = db_clean_input(long_feedback);
		
	# First let's check if anything's been recorded for this ticket_id
	$sql = 'SELECT COUNT(*) AS count FROM feedback WHERE tid=' . $ticket_id;
	$result = $database->query($sql);

	$a = $result->fetch(SQLITE_ASSOC);
	//print_r($a);
	if ($a['count'] > 0)
	{
		# it exists, so just update the existing one. if it is in the db multiple times, this
		# won't fix it.
		$sql = 'UPDATE feedback SET longfeedback = "' . $long_feedback . '" WHERE tid = "' . $ticket_id . '"';
		$database->queryExec($sql);
	}
	else
	{
		//don't store feedback if there is no short feedback associated with this ticket
	}
}

function get_all_unique_csids()
{
	global $database;
		
	$sql = 'SELECT DISTINCT csid FROM feedback';
	$result = $database->query($sql);

	$a = $result->fetchAll(SQLITE_ASSOC);
	
	foreach ($a as $row)
	{
		$b[] = $row['csid'];
	}
	
	return($b);
}

function get_feedback_for($csid, $limit = 32)
{
	global $database;
		
	# First let's check if anything's been recorded for this ticket_id
	$sql = 'SELECT * FROM feedback WHERE csid="'. $csid . '" ORDER BY date DESC LIMIT ' . $limit;
	$result = $database->query($sql);

	$a = $result->fetchAll(SQLITE_ASSOC);
	
	return($a);
}

?>