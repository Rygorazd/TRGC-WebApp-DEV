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
        <a class="nav-item nav-link" href="index.html">Home </a>
        <a class="nav-item nav-link" href="booking.php">Book </a>
        <a class="nav-item nav-link" href="login.php">Login</a>
        <a class="nav-item nav-link active" href="register.php">Register<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="contact.html">Contact Us</a>
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
    <div class="container body-content" style="padding-top:35px";>
        <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="Name">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Phone</label>
                  <input type="text" class="form-control" id="inputPhone" placeholder="Phone number">
                </div>
              </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" id="inputPassword5" placeholder="Confirm Password">
            </div>
        </div>

            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
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
