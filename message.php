<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "texting";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user input from the form
$message = $_POST['message'];

// Insert the message into the database
$sql = "INSERT INTO messages (message) VALUES ('$message')";
if (mysqli_query($conn, $sql)) {
  echo "Message sent!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
