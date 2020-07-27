<?php

require_once "config.php";

if(isset($_REQUEST['btn_register'])) //button name "btn_register"
{
	$username	= strip_tags($_REQUEST['txt_username']);	//textbox name "txt_email"
	$email		= strip_tags($_REQUEST['txt_email']);		//textbox name "txt_email"
	$password	= strip_tags($_REQUEST['txt_password']);	//textbox name "txt_password"
		
	if(empty($username)){
		$errorMsg[]="Please enter username";	//check username textbox not empty 
	}
	else if(empty($email)){
		$errorMsg[]="Please enter email";	//check email textbox not empty 
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errorMsg[]="Please enter a valid email address";	//check proper email format 
	}
	else if(empty($password)){
		$errorMsg[]="Please enter password";	//check passowrd textbox not empty
	}
	else if(strlen($password) < 6){
		$errorMsg[] = "Password must be atleast 6 characters";	//check passowrd must be 6 characters
	}
	else
	{	
		try
		{	
			$select_stmt=$db->prepare("SELECT username, email FROM tbl_user 
										WHERE username=:uname OR email=:uemail"); // sql select query
			
			$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email)); //execute query 
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);	
			
			if($row["username"]==$username){
				$errorMsg[]="Sorry username already exists";	//check condition username already exists 
			}
			else if($row["email"]==$email){
				$errorMsg[]="Sorry email already exists";	//check condition email already exists 
			}
			else if(!isset($errorMsg)) //check no "$errorMsg" show then continue
			{
				$new_password = password_hash($password, PASSWORD_DEFAULT); //encrypt password using password_hash()
				
				$insert_stmt=$db->prepare("INSERT INTO tbl_user	(username,email,password) VALUES
																(:uname,:uemail,:upassword)"); 		//sql insert query					
				
				if($insert_stmt->execute(array(	':uname'	=>$username, 
												':uemail'	=>$email, 
												':upassword'=>$new_password))){
													
					$registerMsg="Register Successfully..... Please Click On Login Account Link"; //execute query success message
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <meta charset="UTF-8">
    <!-- set initial zoom to 1 and viewport width to device width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap core CSS -->
 <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"> 

<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Custom styles for this template -->
<link href="../CSS/style.css" rel="stylesheet">

<script src="../JavaScript/script.js"></script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
<style type="text/css">
    /* body{ font: 14px sans-serif; } */
    .wrapper{ width: 350px; padding: 20px; margin: 0 auto;}

</style>

</head>
<body>
<!-- navbar-->
<div class="container">
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="#" class="navbar-brand">TRGC</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>    
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="index.php">Home </a>
        <a class="nav-item nav-link" href="booking.php">Book </a>
        <a class="nav-item nav-link" href="login.php">Login</a>
        <a class="nav-item nav-link active" href="register.php">Register<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="contact.php">Contact Us</a>
        </div>
        <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="profile.php">Profile</a>
        <a class="nav-item nav-link" href="logout.php">Logout</a>
        </div>
        </div>
  </nav>
</div>
    
      <!-- main content-->
      <div class="container">
        <div class="wrapper">
		
		<?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong>Error ! <?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($registerMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $registerMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<h2>Register Page</h2>
			<form method="post" class="form-horizontal">
				
				<div class="form-group">
				<label>Username</label>
				<input type="text" name="txt_username" class="form-control" placeholder="enter username" />
				</div>
				
				<div class="form-group">
				<label>Email</label>
				<input type="text" name="txt_email" class="form-control" placeholder="enter email" />
				</div>
					
				<div class="form-group">
				<label>Password</label>
				<input type="password" name="txt_password" class="form-control" placeholder="enter password" />
				</div>
					
				<div class="form-group">
				<input type="submit"  name="btn_register" class="btn btn-primary" value="Register">
				</div>
				
				<div class="form-group">
				Already have an account registered?<a href="index.php"><p class="text-info">Login here</p></a>		
				</div>
					
			</form>
			
		</div>
		

      </div>


    <!-- footer -->
    <div class="container">
        <footer class="fixed-bottom py-3 bg-light">
          <div class="container-fluid text-center">
              <small id="copyright">Copyright &copy; Ryszard Gorazda & TRGC,
                  <script>
                      document.write(new Date().getFullYear());
                  </script>
          </small>
          </div>
      </footer>
    </div>
    </div>
      <!-- footer end -->
</body>
</html>
