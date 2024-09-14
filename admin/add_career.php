<?php
session_start();
include 'db_connect.php'; // Include database connection

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Initialize a variable to hold the message and redirect URL
$message = '';
$redirect_url = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $requirements = $_POST['requirements'];
    $qualifications = $_POST['qualifications'];
    $location = $_POST['location'];
    $icon_class = $_POST['icon_class'];

    // Insert data into the database
    $sql = "INSERT INTO careers (title, requirements, qualifications, location, icon_class) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $title, $requirements, $qualifications, $location, $icon_class);
    
    if (mysqli_stmt_execute($stmt)) {
        $message = 'Career added successfully!';
        $redirect_url = 'career.php'; // Replace with your grid view page URL
    } else {
        $message = 'Error adding career. Please try again.';
        $redirect_url = 'add_career.php'; // Redirect to the same page for retry
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Career</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <script>
        // Function to show alert and redirect based on PHP variables
        function showAlertAndRedirect(message, redirectUrl) {
            alert(message);
            window.location.href = redirectUrl;
        }

        // Check if message and redirect URL are set
        <?php if ($message && $redirect_url): ?>
            window.onload = function() {
                showAlertAndRedirect('<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($redirect_url, ENT_QUOTES, 'UTF-8'); ?>');
            };
        <?php endif; ?>
    </script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5 flex justify-center items-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-2xl font-bold mb-5 text-center">Add New Career Opportunity</h1>
            <form action="add_career.php" method="POST">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" class="border rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="requirements" class="block text-sm font-bold mb-2">Requirements:</label>
                    <textarea id="requirements" name="requirements" class="border rounded px-4 py-2 w-full" rows="4" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="qualifications" class="block text-sm font-bold mb-2">Qualifications:</label>
                    <textarea id="qualifications" name="qualifications" class="border rounded px-4 py-2 w-full" rows="4" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-sm font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" class="border rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="icon_class" class="block text-sm font-bold mb-2">Icon Class:</label>
                    <input type="text" id="icon_class" name="icon_class" class="border rounded px-4 py-2 w-full" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded w-full">
                    Add Career
                </button>
            </form>
        </div>
    </div>
</body>
</html>
