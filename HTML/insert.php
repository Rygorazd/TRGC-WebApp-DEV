<?php
require_once 'config.php';

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) 
try{
    $pdo = new PDO("mysql:host=localhost;dbname=demo", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
} */
 
// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO bookings (booking_id, user_id, book_date, book_slot) VALUES (:booking_id, :user_id, :book_date, :book_slot)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':booking_id', $_REQUEST['booking_id']);
    $stmt->bindParam(':user_id', $_REQUEST['user_id']);
    $stmt->bindParam(':book_date', $_REQUEST['book_id']);
    $stmt->bindParam(':book_slot', $_REQUEST['book_slot']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);

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


?>