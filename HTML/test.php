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
$servername = "trgc-mysql.mysql.database.azure.com"; //host server 
$username = "student";	//database username
$password = "T0r0nt057";	//database password  
$dbname = "trgcdev";	//database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT booking_id, user_id, book_date, book_slot FROM tbl_bookings";
$result = $conn->query($sql);

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

$conn->close();
?>

</body>
</html>