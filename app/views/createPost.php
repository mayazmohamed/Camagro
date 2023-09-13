<?php
// Sample data
$userProfile = [
    'username' => 'Momayaz',
    'fullName' => 'mohamed mayaz',
    'bio' => 'the best',
];


$notifications = [
    [
        'sender' => 'oussama',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    ],
    [
        'sender' => 'asmae',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    ],
    [
        'sender' => 'houssam',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../public/css/index.css">

    <script>
        function toggleMenu() {
            var menu = document.getElementById('menu');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
                menu.style.justifyContent = 'flex-col';
            } else {
                menu.style.display = 'block';
            }
        }
    </script>
</head>

<body class="bg-[#1F2122] font-sans">

    <!-- Navigation Bar -->
    <nav class="bg-[#1F2122] border-b border-gray-300 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex justify-center items-center  ">
                <img src="../../public/images/logo.png" alt="Logo">
                <p class="text-3xl font-semibold text-[#EB608F] title ">AMAGRU</p>
            </div>
            <button class="lg:hidden" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <div id="menu" class="hidden lg:block space-x-4">
                <?php if ($userProfile['username']) {
                    echo "<a href=\"app/views/settings.php\" class=\"\">Settings</a>";
                    echo "<a href=\"#\" class=\"\">New Post</a>";
                    echo "<a href=\"#\" class=\"\">Logout</a>";
                } else {
                    echo "<a href=\"#\" class=\"\">Login/sign in</a>";
                }
                ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8">
        <div class="flex flex-col lg:flex-row">
            <!-- Left Sidebar -->
            <div class="w-full lg:w-1/4 lg:mr-4">
                <!-- User Profile -->
                <?php if ($userProfile['username']): ?>
                    <div class="bg-[#26292A] p-4 mb-4 profile">
                        <img src="https://via.placeholder.com/150" alt="User Profile"
                            class="w-16 h-16 rounded-full mx-auto mb-2">
                        <p class="text-center text-white text-2xl underline font-semibold">
                            <?php echo $userProfile['fullName']; ?>
                        </p>
                        <p class="text-center text-[#EB608F]">
                            <?php echo $userProfile['bio']; ?>
                        </p>
                    </div>

                    <!-- Notification Links -->
                    <div class="p-4 my-2 notif">
                        <h1 class="text-white text-2xl">Notifications</h1>
                        <?php foreach ($notifications as $notification): ?>
                            <div
                                class="container mx-auto mt-8 max-w-sm hover:transform hover:scale-110 transition-transform duration-300 ease-in-out">
                                <div class="bg-black rounded-lg shadow-md p-4">
                                    <div class="flex items-center">
                                        <div class="rounded-full bg-blue-500 p-2">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 2c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm-1 13h2v2h-2zm0-4h2v6h-2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-white hover:underline cursor-pointer">
                                                <?php echo $notification['sender'] ?>
                                            </p>
                                            <p class="text-xs text-gray-600">
                                                <?php echo $notification['text'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Main Feed -->
            <div class="w-full lg:w-1/2   ">
                <div class="container mx-auto p-8 edit ">
                    <h1 class="text-3xl font-semibold mb-4 underline text-[#EB608F] title">Image Editor</h1>

                    <form class="mb-4">
                        <div class="mb-4">
                            <label for="image" class="block text-lg mb-2 text-white underline">Upload an Image:</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="border rounded-lg p-2 w-full">
                        </div>
                        <button type="submit"
                            class="bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600 text-white underline">Upload and
                            Edit</button>
                    </form>

                    <hr class="my-8">

                    <h2 class="text-2xl font-semibold mb-4 text-white underline">Or</h2>

                    <button id="captureButton"
                        class="bg-green-500  px-4 py-2 rounded-lg hover:bg-green-600 text-white underline">Capture
                        Image</button>
                    <canvas id="canvas" class="mt-4 border border-gray-300"></canvas>
                    <button id="applyFilterButton"
                        class="bg-blue-500  px-4 py-2 rounded-lg mt-4 hover:bg-blue-600 text-white underline">Apply
                        Filter</button>
                    <img id="displayedImage" src="https://via.placeholder.com/150" alt="Uploaded Image"
                        class="max-w-full mt-4 border border-gray-300">
                </div>

            </div>

            <!-- Footer -->
        </div>
        <div class="w-full ">
            <!-- Suggestions, Stories, etc. -->
            <div class="bg-white p-4">
                FOOOTER
            </div>
        </div>
    </div>

    <script src="../../public/js/createPost.js"></script>
</body>

</html>