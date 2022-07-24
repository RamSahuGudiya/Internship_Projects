<?php
ob_start();
require 'core.php';
require 'dbconnect.php';

$logout_txt='<p style="text-align:right;"><a href="logout.php">Logout</a></p>';
if(loggedin()){

	
	$username=getuserfield('firstname');
	$lastname=getuserfield('lastname');
	
	 require 'front.html';
	 echo 'you are logged in, '.$username.' '.$lastname.' ' .$logout_txt;
	echo 'You are already loggedin' .$logout_txt;

}else if(!loggedin()){
	



if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['pass_again'])&&isset($_POST['firstname'])&&isset($_POST['lastname'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$pass_again=$_POST['pass_again'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
//	$pass_hash=md5('$password');
	
	if(!empty($username)&&!empty($password)&&!empty($pass_again)&&!empty($firstname)&&!empty($lastname)){
		if($password!=$pass_again){
			echo 'Password dont match ';
		}else{
		$query="SELECT `username` FROM `users` WHERE `username`='$username'";
		if($query_run=mysqli_query($mycon, $query)){
			$num_rows=mysqli_num_rows($query_run);
			if($num_rows==1){
				echo 'user name already existed';
			}else if($num_rows==0){
				$myquery="INSERT INTO `users`(`id`, `username`, `password`, `firstname`, `lastname`)VALUES(NULL, '$username', '$password', '$firstname', '$lastname')";
				
				if($query_run=mysqli_query($mycon, $myquery)){
					header('Location:success.php');
					
			      	}
					
				
			   }  
		    }
		}
		
		
	}else{
		echo 'Enter a valid data form';
	}
}

?>
<head>


<link rel="stylesheet"type="text/css"href="style.css"media="screen">
</head>
<body>
<form action="register.php" method="POST">
   <div id="Login-box">
        <div class ="left-box">
               <h1>sign up</h1>

                 <input type="text" name="username" placeholder="Username"/>    
                 <input type="password" name="password" placeholder="Password"/>
				 <input type="password" name="pass_again" placeholder="Re-enter">
                 <input type="text" name="firstname" placeholder="Enter Firstname"/>  
				 <input type="text" name="lastname" placeholder="Enter Lastname"/>
                 <input type="submit" name="signup-button" value="Sign up"/>
</div>
               
</form>

</body>

<?php
}
?>





