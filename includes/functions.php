<?PHP

  // Copyright Daniel Blanchette
	

	if(!defined('IN_SITE'))
		die("Acess Denied");

	// Fetch Unix time and format it in human time
	function getmicrotime() \\From PHP manual
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
	
	function fullscreen_message($title, $text, $redirect="") // used for status or error messages
	{
	global $template;
	global $config;
	global $userdata;
	global $num_queries;
	global $base_dir;
	global $link_dir;
	
	if($redirect)
		header("Refresh: 2;URL=".$config['board_url']."/".$redirect);
	$template -> assign(array( // leaving common data in this because it can be called before it's assigned (i.e. from the common file itself)
		"Y" => date("Y"),
		"Mo" => date("n"),
		"D" => date("j"),
		"H" => date("G"),
		"Mi" => date("i"),
		"S" => date("s"),
		"DateTime" => date("l, F jS, Y, g:i:s A"),
		"BoardName" => $config['board_name'],
		"BoardURL" => $link_dir,
		"SecondName" => $title,
		"StyleLoc" => $userdata['user_current_layer'],
		"StyleSheetLoc" => $link_dir."/templates/".$userdata['user_current_layer']."/".$userdata['user_current_layer'].".css",
		"UserData" => $userdata,
		"LinkDir" => $link_dir,
		"NumQueries" => $num_queries,
		"GenTime" => gentime(),
		"Message" => $text)
	);
	$template -> display(style_check()."/fullscreen_message.tpl");
	exit();
}

function fullscreen_die($errormsg) // quick wrapper to fullscreen_message, die replacement
{
	global $template;
	global $config;
	global $userdata;
	global $num_queries;
	
	return fullscreen_message("Error", $errormsg);
}

	
	
	
	
	
?>
