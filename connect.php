<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a connection to the database
    $servername = "localhost"; // Change this if your database is hosted elsewhere
    $username_db = "root"; // Change this to your database username
    $password_db = ""; // Change this to your database password
    $dbname = "backend"; // Change this to your database name
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL INSERT query
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
