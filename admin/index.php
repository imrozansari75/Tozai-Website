<?php
session_start();
include 'db_connect.php'; // Include database connection

// Check if user is logged in and is an admin
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Fetch some statistics (example queries, adapt as needed)
$careerCountResult = mysqli_query($connect, "SELECT COUNT(*) AS total FROM careers");
$careerCount = mysqli_fetch_assoc($careerCountResult)['total'];

$userCountResult = mysqli_query($connect, "SELECT COUNT(*) AS total FROM users");
$userCount = mysqli_fetch_assoc($userCountResult)['total'];

// Close the database connection
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        .card {
            background: #fff;
            border-radius: 0.5rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
                <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">Logout</a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow p-5">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Career Statistics -->
                <div class="card">
                    <h2 class="text-xl font-semibold mb-4">Total Careers</h2>
                    <p class="text-4xl font-bold"><?php echo $careerCount; ?></p>
                    <a href="view_career.php" class="mt-4 text-blue-500 hover:underline">View Careers</a>
                </div>

                <!-- User Statistics -->
                <div class="card">
                    <h2 class="text-xl font-semibold mb-4">Total Users</h2>
                    <p class="text-4xl font-bold"><?php echo $userCount; ?></p>
                    <a href="view_users.php" class="mt-4 text-blue-500 hover:underline">View Users</a>
                </div>

                <!-- Settings -->
                <div class="card">
                    <h2 class="text-xl font-semibold mb-4">Settings</h2>
                    <a href="settings.php" class="text-blue-500 hover:underline">Manage Settings</a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white text-center p-4">
            <p>&copy; <?php echo date('Y'); ?> Your Company. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
