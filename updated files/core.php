<?php 
ob_start();  
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
function loggedin(){
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
		return true; 
	}else {
		return false;
	}
}

function getuserfield($field){
	global $mycon;
	$id = $_SESSION['user_id'];
	$query="SELECT `$field` FROM `users` WHERE `id`=$id";
	if($query_run=mysqli_query($mycon, $query)){
		$num_rows=mysqli_num_rows($query_run);
		if($num_rows==1){
			$row= mysqli_fetch_row($query_run);
			return $row[0];
		}
	}
}
 
?>