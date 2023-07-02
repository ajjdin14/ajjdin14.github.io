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

// Fetch user from the database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $hashedPassword = $row['password'];

  // Verify the password
  if (password_verify($password, $hashedPassword)) {
    // Set username in session
    $_SESSION['username'] = $username;
    echo "Log in successful!";
  } else {
    echo "Invalid username or password.";
  }
} else {
  echo "Invalid username or password.";
}

// Close the database connection
mysqli_close($conn);
?>
