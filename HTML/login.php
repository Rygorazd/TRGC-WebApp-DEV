<?php

require_once 'config.php';

session_start();

if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
	header("location: booking.php");
}

if(isset($_REQUEST['btn_login']))	//button name is "btn_login" 
{
	$username	=strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
	$email		=strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
	$password	=strip_tags($_REQUEST["txt_password"]);			//textbox name "txt_password"
		
	if(empty($username)){						
		$errorMsg[]="please enter username or email";	//check "username/email" textbox not empty 
	}
	else if(empty($email)){
		$errorMsg[]="please enter username or email";	//check "username/email" textbox not empty 
	}
	else if(empty($password)){
		$errorMsg[]="please enter password";	//check "passowrd" textbox not empty 
	}
	else
	{
		try
		{
			$select_stmt=$db->prepare("SELECT * FROM tbl_user WHERE username=:uname OR email=:uemail"); //sql select query
			$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email));	//execute query with bind parameter
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
			
			if($select_stmt->rowCount() > 0)	//check condition database record greater zero after continue
			{
				if($username==$row["username"] OR $email==$row["email"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
				{
					if(password_verify($password, $row["password"])) //check condition user taypable "password" are match from database "password" using password_verify() after continue
					{
						$_SESSION["user_login"] = $row["user_id"];	//session name is "user_login"
						$loginMsg = "Login Successful ... redirecting";		//user login success message
						header("refresh:1; profile.php");			//refresh 1 second after redirect to "profile.php" page
					}
					else
					{
						$errorMsg[]="Incorrect credentials, please try again.";
					}
				}
				else
				{
					$errorMsg[]="Wrong username or email";
				}
			}
			else
			{
				$errorMsg[]="Wrong username or email";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
}
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            <a class="nav-item nav-link active" href="login.php">Login <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="register.php">Register</a>
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
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($loginMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<h2>Login</h2>
			<p>Please enter your credentials to login.</p>
			<form method="post" class="form-horizontal">	
				<div class="form-group">
				<label>Username</label>
				<input type="text" name="txt_username_email" class="form-control" placeholder="enter username" />
				</div>			
				<div class="form-group">
				<label>Password</label>
				<input type="password" name="txt_password" class="form-control" placeholder="enter password" />
				</div>			
				<div class="form-group">
				<input type="submit" name="btn_login" class="btn btn-primary" value="Login">
				</div>				
				<div class="form-group">
				<p>Don't have an account? <a href="register.php">Sign up here</a></p>		
				</div>
			</form>	
		</div>
	</div>
		
    <!-- footer -->
    <div class="wrapper">
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
      <!-- footer end -->
</body>
</html>
