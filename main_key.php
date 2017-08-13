<?php
// Set the maximum number of attempts to visit the url of page (actually, the number of page loads i.e refresh)
$maxdownloads = "2";
// Set the key's viable duration in seconds i.e session time of page url, it will expire after provided time (86400 seconds = 24 hours)
$maxtime = "300";

require ('dbconnect.php');

	if(get_magic_quotes_gpc()) {
        $id = stripslashes($_GET['id']);
	}else{
		$id = $_GET['id'];
	}

	// Get the key, timestamp, and number of downloads (attempts) from the database
	$query = sprintf("SELECT * FROM downloadkey WHERE uniqueid= '%s'",
	mysql_real_escape_string($id, $link));
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	if (!$row) { 
		echo "The download key you are using is invalid.";
	}else{
		$timecheck = date('U') - $row['timestamp'];
		
		if ($timecheck >= $maxtime) {
			echo "This session has expired (exceeded time allotted) ! Contact your Owner.<br />";
		}else{
			$downloads = $row['downloads'];
			$downloads += 1;
			if ($downloads > $maxdownloads) {
				echo "This session has expired (exceeded allowed Attempts) ! Contact your Owner.<br />";
			}else{
				$sql = sprintf("UPDATE downloadkey SET downloads = '".$downloads."' WHERE uniqueid= '%s'",
	mysql_real_escape_string($id, $link));
				$incrementdownloads = mysql_query($sql) or die(mysql_error());
				
// Debug		echo "Key validated.";


/*
	Variables: 
		$file = real name of actual download file on the server
		$filename = new name of local download file - this is what the visitor's file will actually be called when he/she saves it
*/

   ob_start();
 
   $file = "index.php"; // input file's location with type
   $filename = "index.php"; // input filename
 
   header("Cache-Control: public, must-revalidate");
   header("Pragma: no-cache");

 
   ob_end_clean();
   readfile($file);

			}
		}
	}
?>
