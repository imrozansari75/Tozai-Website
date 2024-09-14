<!-- dashboard.php -->
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-bold">Welcome to the Tozai Career Dashboard</h1>
    <p class="mb-5">You are logged in as <?php echo htmlspecialchars($_SESSION['email']); ?></p>

    <!-- Add Career Button -->
    <a href="career.php" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded mr-4 mb-4 inline-block">
        Add Career
    </a>

    <!-- Logout Button -->
    <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded inline-block">
        Logout
    </a>
</div>

</body>
</html>
