<?php

// Define database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'astonish_infotech';

// Create a new database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['textName'];
    $email = $_POST['textEmail'];
    $project_type = $_POST['textProject'];
    $msg = $_POST['textMsg'];

    // Create the SQL insert query
    $sql = "INSERT INTO projectform(username, Email, Project, Msg) VALUES (uname,uemail,uproject,umsg)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param('ssss', $name, $email, $project_type, $msg);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to confirmation page
        header('Location: confirmation.html');
        exit;
    } else {
        // Display error message if the query fails
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<html>

<head>
    <title>
        Demo</title>
</head>

</html>