<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
            <form action="register_user.php" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold mb-2">Email Address:</label>
                    <input type="email" name="email" id="email" class="border rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-bold mb-2">Password:</label>
                    <input type="password" name="password" id="password" class="border rounded px-4 py-2 w-full" required>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
