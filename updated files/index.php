<?php
require 'core.php';

require 'dbconnect.php';

$logout_txt='<a href="logout.php">Logout</a>';

if(loggedin()){
	$username=getuserfield('firstname');
	$lastname=getuserfield('lastname');
	
	echo 'you are logged in, '.$username.' '.$lastname.' ' .$logout_txt;
}else{ 
     include 'loginform.php';
}
?>