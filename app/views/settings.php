<?php
// Sample data
$userProfile = [
    'username' => 'Momayaz',
    'fullName' => 'mohamed mayaz',
    'bio' => 'the best',
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

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
                <a href="../../index.php" class="text-3xl font-semibold text-[#EB608F] title ">AMAGRU</a>
            </div>
            <button class="lg:hidden" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <div id="menu" class="hidden lg:block space-x-4">
                <a href="#" class=" !hover:text-[#EB608F]">Settings</a>
                <a href="createPost.php" class="">New Post</a>
                <?php if ($userProfile['username']) {
                    echo "<a href=\"#\" class=\"\">Logout</a>";
                } else {
                    echo "<a href=\"#\" class=\"\">Login/sign in</a>";
                }
                ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 bg-black rounded-3xl">
        <div class="container mx-auto p-4 w-11/12 ">
            <h2 class="text-2xl font-semibold mb-4 text-white underline ">Edit Profile</h2>
            <form method="post" enctype="multipart/form-data">
                <!-- Upload profile picture input (you'll need to handle image upload) -->
                <img src="https://via.placeholder.com/150" alt="User Profile"
                    class="w-64 h-64 rounded-full mx-auto mb-2">
                <!-- <input type="file" name="profile_image" class="mb-4 mx-auto"> -->

                <div class="flex items-center justify-center w-full my-5">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>

                <!-- First Name -->
                <div class="mb-4">
                    <label for="first_name" class="block font-semibold text-white underline">First Name:</label>
                    <input type="text" name="first_name" value="<?= htmlspecialchars($first_name) ?>"
                        class="w-full rounded border p-2">
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label for="last_name" class="block font-semibold text-white underline">Last Name:</label>
                    <input type="text" name="last_name" value="<?= htmlspecialchars($last_name) ?>"
                        class="w-full rounded border p-2">
                </div>

                <!-- Bio -->
                <div class="mb-4">
                    <label for="bio" class="block font-semibold text-white underline">Bio:</label>
                    <textarea name="bio" class="w-full rounded border p-2"><?= htmlspecialchars($bio) ?></textarea>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block font-semibold text-white underline">Password:</label>
                    <input type="password" name="password" class="w-full rounded border p-2">
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password" class="block font-semibold text-white underline">Confirm Password:</label>
                    <input type="password" name="password" class="w-full rounded border p-2">
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="button"
                        class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submite
                        Changes</button>
                </div>
            </form>
        </div>
        <div class="w-full ">
            <div class="bg-white p-4">
                FOOOTER
            </div>
        </div>
    </div>

</body>

</html>