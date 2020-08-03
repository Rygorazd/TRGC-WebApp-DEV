<?php
// INIT
				
require_once 'config.php';
				
session_start();

if(!isset($_SESSION['user_login']))	//check if unauthorized user has no access to "booking.php" page
{
	header("location: login.php");
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

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
.wrapper {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
}
* {box-sizing: border-box;}

.wrapper {
  border: 2px solid #ded1c8;
  border-radius: 5px;
  background-color: #fff4e6;
}

.wrapper > div {
  border: 2px solid #f7ede1;
  border-radius: 5px;
  background-color: #f7f3ed;
  padding: 1em;
  color: #080707;
}
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
         <a class="nav-item nav-link" href="login.php">Login </a>
         <a class="nav-item nav-link" href="register.php">Register</a>
         <a class="nav-item nav-link active" href="contact.php">Contact Us<span class="sr-only">(current)</span></a>
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

    <h1>Booking</h1>
        Unfortunately we are almost fully booked for next 2 months.
        Below are only available slots - please choose one and click on 'Book'
        <br>

    </div>

    <div class="wrapper">

    <div>
    <form action="insert.php" method="post">
    <p> 
    <p>Date: 12/08/2020</p>
    <p>Time: 10am</p>

        <input type="hidden" id="booking_id" name="booking_id" value="">
    </p>
    <p>
        <input type="hidden" id="user_id" name="user_id" value="">
    </p>
    <p>
        <input type="hidden" id="book_date" name="book_date" value="2020-08-12">
    </p>
    <p>
        <input type="hidden" id="book_slot" name="book_slot" value="10am">
    </p>
    <input type="submit" value="Book">
    </form>
    </div>

    <div>
    <form action="insert.php" method="post">
    <p> 
    <p>Date: 13/08/2020</p>
    <p>Time: 2pm</p>

        <input type="hidden" id="booking_id" name="booking_id" value="">
    </p>
    <p>
        <input type="hidden" id="user_id" name="user_id" value="">
    </p>
    <p>
        <input type="hidden" id="book_date" name="book_date" value="2020-08-13">
    </p>
    <p>
        <input type="hidden" id="book_slot" name="book_slot" value="2pm">
    </p>
    <input type="submit" value="Book">
    </form>
    </div>

    <div>
    <form action="insert.php" method="post">
    <p> 
    <p>Date: 16/08/2020</p>
    <p>Time: 9am</p>

        <input type="hidden" id="booking_id" name="booking_id" value="">
    </p>
    <p>
        <input type="hidden" id="user_id" name="user_id" value="">
    </p>
    <p>
        <input type="hidden" id="book_date" name="book_date" value="2020-08-16">
    </p>
    <p>
        <input type="hidden" id="book_slot" name="book_slot" value="9am">
    </p>
    <input type="submit" value="Book">
</form>
    </div>

    <div>
    <form action="insert.php" method="post">
    <p> 
    <p>Date: 16/08/2020</p>
    <p>Time: 1pm</p>

        <input type="hidden" id="booking_id" name="booking_id" value="">
    </p>
    <p>
        <input type="hidden" id="user_id" name="user_id" value="">
    </p>
    <p>
        <input type="hidden" id="book_date" name="book_date" value="2020-08-17">
    </p>
    <p>
        <input type="hidden" id="book_slot" name="book_slot" value="1pm">
    </p>
    <input type="submit" value="Book">
    </form>
    </div>

    <div>
    <form action="insert.php" method="post">
    <p> 
    <p>Date: 20/08/2020</p>
    <p>Time: 11am</p>

        <input type="hidden" id="booking_id" name="booking_id" value="">
    </p>
    <p>
        <input type="hidden" id="user_id" name="user_id" value="">
    </p>
    <p>
        <input type="hidden" id="book_date" name="book_date" value="2020-08-20">
    </p>
    <p>
        <input type="hidden" id="book_slot" name="book_slot" value="11am">
    </p>
    <input type="submit" value="Book">
    </form>
    </div>

    <div>
    <form action="insert.php" method="post">
    <p> 
    <p>Date: 20/08/2020</p>
    <p>Time: 3pm</p>

        <input type="hidden" id="booking_id" name="booking_id" value="">
    </p>
    <p>
        <input type="hidden" id="user_id" name="user_id" value="">
    </p>
    <p>
        <input type="hidden" id="book_date" name="book_date" value="2020-08-20">
    </p>
    <p>
        <input type="hidden" id="book_slot" name="book_slot" value="3pm">
    </p>
    <input type="submit" value="Book">
    </form>
    </div>

    <div>
    <form action="insert.php" method="post">
    <p> 
    <p>Date: 21/08/2020</p>
    <p>Time: 10am</p>

        <input type="hidden" id="booking_id" name="booking_id" value="">
    </p>
    <p>
        <input type="hidden" id="user_id" name="user_id" value="">
    </p>
    <p>
        <input type="hidden" id="book_date" name="book_date" value="2020-08-21">
    </p>
    <p>
        <input type="hidden" id="book_slot" name="book_slot" value="10am">
    </p>
    <input type="submit" value="Book">
    </form>
    </div>

     <div>
    <form action="insert.php" method="post">
    <p> 
    <p>Date: 23/08/2020</p>
    <p>Time: 4pm</p>

        <input type="hidden" id="booking_id" name="booking_id" value="">
    </p>
    <p>
        <input type="hidden" id="user_id" name="user_id" value="">
    </p>
    <p>
        <input type="hidden" id="book_date" name="book_date" value="2020-08-23">
    </p>
    <p>
        <input type="hidden" id="book_slot" name="book_slot" value="4pm">
    </p>
    <input type="submit" value="Book">
    </form>
    </div>

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
      <!-- footer end -->
</body>
</html>
