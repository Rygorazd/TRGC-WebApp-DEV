<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
require_once 'config.php';

session_start();

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
//}

$sql = "SELECT booking_id, user_id, book_date, book_slot FROM tbl_bookings";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Booking ID</th><th>User ID</th><th>Date</th><th>Time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["booking_id"]. "</td><td>" . $row["user_id"]. " " . $row["book_date"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$db->close();
?>

</body>
</html>