<?php
require 'core.php';

require 'dbconnect.php';
//require 'front.html';

$logout_txt='<p style="text-align:right;"><a href="logout.php">Logout</a></p>';
if(loggedin()){
	//require 'front.html';
	$username=getuserfield('firstname');
	$lastname=getuserfield('lastname');
	
	echo 'you are logged in, '.$username.' '.$lastname.' ' .$logout_txt;
	
}else{ 
     require 'loginform.php';
	
}
//require 'front.html';
?>