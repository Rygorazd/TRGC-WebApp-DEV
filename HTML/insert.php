<?php
require_once 'config.php';
$user_id = $_SESSION['user_login'];
$_SESSION['user_id']=$user_id;

// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO bookings (booking_id, user_id, book_date, book_slot) VALUES (:booking_id, :user_id, :book_date, :book_slot)";
    $stmt = $db->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':booking_id', $_REQUEST['booking_id']);
    $stmt->bindParam(':user_id', $_REQUEST[$user_id]);
    $stmt->bindParam(':book_date', $_REQUEST['book_date']);
    $stmt->bindParam(':book_slot', $_REQUEST['book_slot']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($db);
/*
// Prepare an insert statement
$sql = "INSERT INTO bookings (booking_id, user_id, book_date, book_slot) VALUES (?, ?, ?, ?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $booking_id, $user_id, $book_date, $book_slot);
    
    // Set parameters
    $boking_id = $_REQUEST['booking_id'];
    $user_id = $_REQUEST['user_id'];
    $book_date = $_REQUEST['book_date'];
    $book_slot = $_REQUEST['book_slot'];
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}
 
// Close statement
mysqli_stmt_close($stmt);
 
// Close connection
mysqli_close($link);
*/

?>