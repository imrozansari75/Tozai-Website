<?php
session_start();
include 'db_connect.php'; // Include database connection

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Fetch careers data from the database
$sql = "SELECT * FROM careers";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Careers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-2xl font-bold mb-5">Careers List</h1>
        <a href="add_career.php" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mb-4 inline-block">
            <i class="fas fa-plus"></i> Add Career
        </a>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Requirements</th>
                        <th class="py-2 px-4 border-b">Qualifications</th>
                        <th class="py-2 px-4 border-b">Location</th>
                        <th class="py-2 px-4 border-b">Icon Class</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['title']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['requirements']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['qualifications']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['location']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['icon_class']); ?></td>
                                <td class="py-2 px-4 border-b flex items-center space-x-2">
                                    <a href="view_career.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="edit_career.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete_career.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="py-2 px-4 border-b text-center">No careers found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($connect);
?>
