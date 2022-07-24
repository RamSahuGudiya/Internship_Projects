<?php

    if(isset($_POST['username'])&&isset($_POST['password'])){
      $username	= $_POST['username'];
      $password = $_POST['password'];	
	 // $pass_hass= md5($password);
     if(!empty($username)&&!empty($password)){
		 $query="SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$password'";
		if($mysqli_run=mysqli_query($mycon, $query)){
			$num_rows=mysqli_num_rows($mysqli_run);
			if($num_rows==0){
				echo 'invalid username and password';
			}else if($num_rows==1){
				$row=mysqli_fetch_row($mysqli_run);
				$id=$row[0];
			$_SESSION['user_id']=$id;
				header('Location:index.php');
			}
		}
	 }else{
		 echo 'please enter a valid pasword and username bro';
	 }
} 
?>
<title>	
          Login-form
</title>
 <link rel="stylesheet"type="text/css"href="styles.css"media="screen">
</head>
          
<body>
<form action="<?php echo $current_file?>" method="POST"
        <div id="Login-box">

             <div class ="right-box">
                  <h1>Login</h1>
                 <input type="text"name="username"placeholder="Enter the username">
                <input type="password"name="password"placeholder="Enter the password">
                 <input type="submit"name="submit"value="LOGIN"class="btn-login">
  
                          
  
                 </form>
          </div>
      </body>
