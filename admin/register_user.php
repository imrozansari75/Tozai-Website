<!-- register_user.php -->
<?php
include 'db_connect.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

    if (mysqli_query($connect, $sql)) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
