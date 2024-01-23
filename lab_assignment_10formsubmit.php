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

// Process form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $course = $_POST["course"];
    $semester = $_POST["semester"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phoneNo"];

    // Insert data into the "student_info" table
    $sql = "INSERT INTO student_info (fullName, course, semester, email, phoneNo) VALUES ('$fullName', '$course', '$semester', '$email', '$phoneNo')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method";
}

// Close the database connection
$conn->close();
?>
