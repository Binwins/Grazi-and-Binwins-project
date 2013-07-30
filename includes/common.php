<?PHP

  // Copyright Daniel Blanchette

	if(!defined('IN_SITE'))
		die("Acess Denied");
	
	// Do we want a debug mode?	
	define("DEBUG_MODE",false);
	
	// Directory locations
	$base_dir = preg_replace('/includes$/', "", preg_replace('/admin$/', "", dirname(__FILE__)));
	$includes_dir = $base_dir."/includes";
	
	chdir($base_dir);
	
	$link_dir = "http://".$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT']!="80"?":".$_SERVER['SERVER_PORT']:"").$local_dir;
	
	require_once($include_dir."/config.php");
	require_once($include_dir."functions.php");
	
	//For XHTML compatibility
	ini_set("session.use_cookies", "1");
	
	$start_time = getmicrotime();
	
	if (!($dblink = mysql_connect( $mysql_host, $mysql_user, $mysql_pass )))
		die("Error connecting to the database");
		
	mysql_select_db( $mysql_db, $dblink ) or die ( "Couldn't select DB." );
		
	
	
	
?>
