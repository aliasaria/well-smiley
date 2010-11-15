<?
# this function is used to check if a given ticket id, customer service id
# and supplied hash are valid.
# returns true if valid, else false
function validate_hash($tid, $csid, $hash)
{
	//here is where you can put in your own custom function
	//the following is only a sample
	
	$md5 = md5($tid.$csid.VALIDATION_SALT);
	$md5 = substr($md5,0,6);
	
	if ($md5 == $hash)
	{
		return true;
	}
	
	//else
	return false;
}

?>