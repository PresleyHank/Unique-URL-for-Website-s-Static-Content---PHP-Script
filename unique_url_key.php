<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Your Website Title</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="ilLuSion-007">
<style type="text/css">
#wrapper {
	font: 15px Verdana, Arial, Helvetica, sans-serif;
	margin: 40px 100px 0 100px;
}
.box {
	border: 1px solid #e5e5e5;
	padding: 6px;
	background: #f5f5f5;
}
</style>
</head>

<body>
<div id="wrapper">

<center><h1>Fill your front page with your input description</h1></center>

<?php
// Generate unique keys for the purpose of protecting site's main directory link while using download.php? in prior of every unique key

require ('dbconnect.php');

	if(empty($_SERVER['REQUEST_URI'])) {
    	$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
	}

	// Strip off query string so dirname() doesn't get confused
	$url = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
	$folderpath = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '/').'/';


// Generate the unique download key
	$key = uniqid(md5(rand()));
//	echo "key: " . $key . "<br />";
	
// Get the activation time
	$time = date('U');
//	echo "time: " . $time . "<br />";
	
// Generate the link
	echo "<p>Here's a new download link:</p>";
	header("Location:download.php?id=$key");

	
// Write the key and activation time to the database as a new row
	$registerid = mysql_query("INSERT INTO downloadkey (uniqueid,timestamp) VALUES(\"$key\",\"$time\")") or die(mysql_error());
?>



</div>
</body>
</html> 
