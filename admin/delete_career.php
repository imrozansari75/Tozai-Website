<?php
session_start();
include 'db_connect.php'; // Include database connection

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if the 'id' parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SQL statement
    $sql = "DELETE FROM careers WHERE id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>
                alert("Career deleted successfully!");
                window.location.href = "career.php";
              </script>';
    } else {
        echo '<div class="container mx-auto p-5"><p class="text-red-500">Error deleting career. Please try again.</p></div>';
    }
    mysqli_stmt_close($stmt);
} else {
    echo '<div class="container mx-auto p-5"><p class="text-red-500">No career ID provided.</p></div>';
}

// Close the database connection
mysqli_close($connect);
?>
