<?PHP

  // Copyright Daniel Blanchette
	

	if(!defined('IN_SITE'))
		die("Acess Denied");

	// Fetch Unix time and format it in human time
	function getmicrotime()
	{
		list($usec,$sec) = explode(" ",microtime());
		return((float)$usec + (float)$sec);
		
	}
	
	// Generate time to make the page
	function gentime()
	{
		global $start_time;
		$end_time = getmicrotime();
		return number_format(($end_time - $start_time), 3);
	}
	
	
	
	// SQL query wrapper
	function sql_query($query)
	{
		global $num_queries;
		
		if(!isset($num_queries))
			$num_queries = 0;
			
		$result = mysql_query($query);
		
		if(!$result)
		{
			$backtrace = debug_backtrace();
			die("Error in SQL query on line ".$backtrace[0]['line']." in file ".$backtrace[0]['file'].": ".mysql_error());
			
		}
		
		else
		{
			$num_queries++;
			return $result;
		}
	}
	
	
	
	
	
?>
