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
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
if (mysqli_query($conn, $sql)) {
  echo "Sign up successful!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
