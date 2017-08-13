<?php
// Connect to database "download" using your own credentials: dbname , username , password 
    $link = mysql_connect('localhost', 'root', 'password') or die("Could not connect: " . mysql_error());
    mysql_select_db("dbname") or die(mysql_error());
?>