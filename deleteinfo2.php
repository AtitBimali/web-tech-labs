<?php
// Establish a connection to the MySQL server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle record deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $idToDelete = $_POST['delete'];

    // Delete the selected record from the "student_info" table
    $deleteSql = "DELETE FROM student_info WHERE id = $idToDelete";
    
    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


?>
