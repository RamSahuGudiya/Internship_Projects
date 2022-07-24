<?php
require 'core.php';

require 'dbconnect.php';
//require 'index1.html';

$logout_txt='<p style="text-align:right;"><a href="logout.php">Logout</a></p>';
if(loggedin()){
	
	$username=getuserfield('firstname');
	$lastname=getuserfield('lastname');
	
	echo 'you are logged in, '.$username.' '.$lastname.' ' .$logout_txt;
	//require 'index1.html';
}else{ 
     require 'loginform.php';
	
}
//require 'index1.html';
?>