<?php

function convert_to_nickname($name)
{
	global $nicknames;
	
	if ( array_key_exists($name, $nicknames) )
	{
		return($nicknames[$name]);
	}
	else
	{
		return $name;
	}
}

# returns array with following keys:
#  - count
#  - positive
#  - percent_positive
#  (@TODO)- most_recent_feedback
function get_stats_for($feedback)
{
	$stats = array();
	
	$stats['count'] = count($feedback);
	
	# Count num of positive responses
	$positive = 0;
	foreach ($feedback as $response)
	{
		if ($response['mood'] == "happy") $positive++;
	}
	
	$stats['positive'] = $positive;
	
	# calculate percentage
	$stats['percent_positive'] = round($stats['positive'] / $stats['count'],2);
	
	return($stats);
	
	
}
?>