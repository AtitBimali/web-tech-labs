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

// Retrieve data from the "student_info" table
$sql = "SELECT * FROM student_info";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Information</title>
</head>
<body>

  <h2>Student Information</h2>

  <?php
    // Display data in a table
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Course</th><th>Semester</th><th>Email</th><th>Phone Number</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["fullName"]."</td>";
            echo "<td>".$row["course"]."</td>";
            echo "<td>".$row["semester"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["phoneNo"]."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }

    // Close the database connection
    $conn->close();
  ?>

</body>
</html>
