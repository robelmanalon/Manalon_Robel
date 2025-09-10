<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.02);
            }
        }
        .button-pulse:hover {
            animation: pulse 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-indigo-50 min-h-screen flex items-center justify-center p-8">
    <div class="w-full max-w-lg mx-auto bg-white rounded-2xl shadow-xl p-8 transform transition duration-500 hover:scale-105">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-indigo-200 pb-2">Add New Student 👨‍🎓</h2>
        <form action="/students/store" method="post" class="space-y-6">
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Last Name</label>
                <input type="text" name="last_name" class="w-full border-2 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg px-4 py-2 transition-all duration-300" required>
            </div>
            <div>
                <label class="block font-semibold text-gray-700 mb-1">First Name</label>
                <input type="text" name="first_name" class="w-full border-2 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg px-4 py-2 transition-all duration-300" required>
            </div>
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full border-2 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg px-4 py-2 transition-all duration-300" required>
            </div>
            <div class="flex justify-between items-center pt-4">
                <a href="/students/index" class="text-indigo-500 hover:text-indigo-700 font-medium transition-colors duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full shadow-lg button-pulse transition-all duration-300 flex items-center">
                    <i class="fas fa-save mr-2"></i> Save
                </button>
            </div>
        </form>
    </div>
</body>
</html>