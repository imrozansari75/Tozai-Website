<?php
session_start();
include 'db_connect.php'; // Include database connection

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if 'id' is set in the URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo '<div class="container mx-auto p-5"><p class="text-red-500">Invalid Career ID.</p></div>';
    exit();
}

$id = intval($_GET['id']);

// Fetch the career data from the database
$sql = "SELECT * FROM careers WHERE id = ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $title = htmlspecialchars($row['title']);
    $requirements = htmlspecialchars($row['requirements']);
    $qualifications = htmlspecialchars($row['qualifications']);
    $location = htmlspecialchars($row['location']);
    $icon_class = htmlspecialchars($row['icon_class']);
} else {
    echo '<div class="container mx-auto p-5"><p class="text-red-500">Career not found.</p></div>';
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Career</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-2xl font-bold mb-5">Career Details</h1>
        <a href="career.php" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mb-4 inline-block">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold mb-4"><?php echo $title; ?></h2>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Requirements</h3>
                <p><?php echo nl2br($requirements); ?></p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Qualifications</h3>
                <p><?php echo nl2br($qualifications); ?></p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Location</h3>
                <p><?php echo $location; ?></p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Icon Class</h3>
                <p><i class="<?php echo $icon_class; ?>"></i></p>
            </div>
        </div>
    </div>
</body>
</html>
