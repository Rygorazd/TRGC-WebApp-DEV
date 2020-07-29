<?php
require_once 'config.php';
session_start();

    $id = $_SESSION['user_login'];
				
				$select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
				$select_stmt->execute(array(":uid"=>$id));
	
				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
				
				if(isset($_SESSION['user_login']))
				{
					$user_id = $row['user_id'];
                }
               				
// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO tbl_bookings (booking_id, user_id, book_date, book_slot) VALUES (:booking_id, :user_id, :book_date, :book_slot)";
    $stmt = $db->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':booking_id', $_REQUEST['booking_id']);
    $stmt->bindParam(':user_id', $row['user_id']);
    $stmt->bindParam(':book_date', $_REQUEST['book_date']);
    $stmt->bindParam(':book_slot', $_REQUEST['book_slot']);

  
    // Execute the prepared statement
    $stmt->execute();
    echo "Your booking was successfull.";
     //echo $row['user_id'];
     //$loginMsg = "Successfully Login...";		//user login success message
	header("refresh:1; profile.php");			//refresh 1 second after redirect to "profile.php" page

} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($db);

?>