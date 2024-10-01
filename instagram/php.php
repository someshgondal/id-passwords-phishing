<?php
// database connection code
$con = mysqli_connect('localhost', 'root', '', 'db_contact');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// get the post records
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement
$stmt = $con->prepare("INSERT INTO `tdb_contact` (`userName`, `password`) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed_password);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "<h1 style='padding-top: 210px; padding-left: 379px; font-size: xxx-large;'>Hello $username, your account has been created.</h1>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$con->close();
?>


<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'db_contact');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];


// Prepare the SQL statement to prevent SQL injection
$stmt = $con->prepare("INSERT INTO `tdb_contact` (`userName`, `password`) VALUES (?, ?)");
$stmt->bind_param("s", $username);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "<h1>Username $username has been successfully registered!</h1>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$con->close();
?>

