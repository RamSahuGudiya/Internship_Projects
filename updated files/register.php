<?php
ob_start();
require 'core.php';
require 'dbconnect.php';
if(loggedin()){
	echo 'You are already loggedin';
}else if(!loggedin()){
	



if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['pass_again'])&&isset($_POST['firstname'])&&isset($_POST['lastname'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$pass_again=$_POST['pass_again'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$pass_hash=md5('$password');
	
	if(!empty($username)&&!empty($password)&&!empty($pass_again)&&!empty($firstname)&&!empty($lastname)){
		if($password!=$pass_again){
			echo 'Password dont match';
		}else{
		$query="SELECT `username` FROM `users` WHERE `username`='$username'";
		if($query_run=mysqli_query($mycon, $query)){
			$num_rows=mysqli_num_rows($query_run);
			if($num_rows==1){
				echo 'user name already existed';
			}else if($num_rows==0){
				$myquery="INSERT INTO `users`(`id`, `username`, `password`, `firstname`, `lastname`)VALUES(NULL, '$username', '$pass_hash', '$firstname', '$lastname')";
				
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

                     <input type="text" name="username" placeholder="user name"/>    
                 <input type="password" name="password" placeholder="password"/>
				 <input type="password" name="pass_again" placeholder="Re-enter">
                <input type="text" name="firstname" placeholder="enter firstname"/>  
				<input type="text" name="lastname" placeholder="Enter lastname"/>
                  <input type="submit" name="signup-button" value="sign up"/>
</div>
               
</form>

</body>

<?php
}
?>





