<?php
  $host = 'Localhost';
  $user = 'root';
  $password='';
  $dbname='a_database';
  if($mycon= @mysqli_connect($host, $user, $password)){
	  if(!mysqli_select_db($mycon,  $dbname)){
		  echo 'Could not connect to the database';
		  
	  }
  }else{
	  echo 'Could not connected to the server';
  }
	
 

?>