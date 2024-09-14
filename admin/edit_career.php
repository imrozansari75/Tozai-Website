<?php
session_start();
include 'db_connect.php'; // Include database connection

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Initialize variables
$id = $_GET['id'] ?? '';
$title = '';
$requirements = '';
$qualifications = '';
$location = '';
$icon_class = '';

// Fetch career details if ID is provided
if ($id) {
    $sql = "SELECT * FROM careers WHERE id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $requirements = $row['requirements'];
        $qualifications = $row['qualifications'];
        $location = $row['location'];
        $icon_class = $row['icon_class'];
    } else {
        echo '<div class="container mx-auto p-5"><p class="text-red-500">Career not found.</p></div>';
        exit();
    }
    mysqli_stmt_close($stmt);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $requirements = $_POST['requirements'];
    $qualifications = $_POST['qualifications'];
    $location = $_POST['location'];
    $icon_class = $_POST['icon_class'];

    $sql = "UPDATE careers SET title = ?, requirements = ?, qualifications = ?, location = ?, icon_class = ? WHERE id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssi', $title, $requirements, $qualifications, $location, $icon_class, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>
                alert("Career updated successfully!");
                window.location.href = "career.php";
              </script>';
    } else {
        echo '<div class="container mx-auto p-5"><p class="text-red-500">Error updating career. Please try again.</p></div>';
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Career</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5 flex justify-center items-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-2xl font-bold mb-5 text-center">Edit Career Opportunity</h1>
            <form action="edit_career.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" class="border rounded px-4 py-2 w-full" value="<?php echo htmlspecialchars($title); ?>" required>
                </div>
                <div class="mb-4">
                    <label for="requirements" class="block text-sm font-bold mb-2">Requirements:</label>
                    <textarea id="requirements" name="requirements" class="border rounded px-4 py-2 w-full" rows="4" required><?php echo htmlspecialchars($requirements); ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="qualifications" class="block text-sm font-bold mb-2">Qualifications:</label>
                    <textarea id="qualifications" name="qualifications" class="border rounded px-4 py-2 w-full" rows="4" required><?php echo htmlspecialchars($qualifications); ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-sm font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" class="border rounded px-4 py-2 w-full" value="<?php echo htmlspecialchars($location); ?>" required>
                </div>
                <div class="mb-4">
                    <label for="icon_class" class="block text-sm font-bold mb-2">Icon Class:</label>
                    <input type="text" id="icon_class" name="icon_class" class="border rounded px-4 py-2 w-full" value="<?php echo htmlspecialchars($icon_class); ?>" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded w-full">
                    Update Career
                </button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($connect);
?>
