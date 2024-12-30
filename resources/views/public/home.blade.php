<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tailwind CSS Test</title>
  <!-- Include Tailwind CSS -->
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <!-- Header -->
  <header class="w-full bg-blue-600 text-white p-4 shadow">
    <div class="container mx-auto text-center">
      <h1 class="text-2xl text-blue-500 font-bold">Welcome to Tailwind CSS</h1>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto my-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card 1 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://via.placeholder.com/300" alt="Placeholder Image" class="w-full h-48 object-cover">
        <div class="p-4">
          <h2 class="text-xl font-bold text-gray-800">Card Title</h2>
          <p class="text-gray-600 mt-2">This is a simple card description to showcase Tailwind's styling capabilities.</p>
          <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Learn More</button>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="w-full bg-gray-800 text-white p-4">
    <div class="container mx-auto text-center">
      <p>© 2024 Tailwind CSS Test. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
