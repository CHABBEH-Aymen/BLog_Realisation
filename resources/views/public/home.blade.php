<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tailwind CSS Test</title>
  <!-- Include Tailwind CSS -->
  @vite('resources/css/app.css')
</head>

  
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white px-4 py-3">
        <div class="container mx-auto flex items-center justify-between">
            <a href="#" class="text-lg font-bold">ArticleHub</a>
            <div class="flex items-center space-x-4">
                <!-- Search Input -->
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Search articles..." 
                        class="px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-black"
                    >
                </div>

                <!-- Category Filter -->
                <div class="relative">
                    <select 
                        class="px-4 py-2 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
                    >
                        <option value="">All Categories</option>
                        <option value="tech">Tech</option>
                        <option value="health">Health</option>
                        <option value="business">Business</option>
                    </select>
                </div>
                <!--Profile-->
                <div class="relative">
                  <a href="#" class="flex items-center space-x-2">
                      <img 
                          src="https://via.placeholder.com/40" 
                          alt="Profile Picture" 
                          class="w-10 h-10 rounded-full"
                      >
                      <span class="text-white font-medium">John Doe</span>
                  </a>
              </div>
            </div>
        </div>
    </nav>

    <!-- Articles Section -->
    <div class="container mx-auto mt-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Article Card -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img 
                    src="https://via.placeholder.com/300x200" 
                    alt="Article Image" 
                    class="w-full h-48 object-cover"
                >
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">Article Title</h2>
                    <div class="mt-2 flex items-center space-x-2">
                        <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded-full">#Tag1</span>
                        <span class="text-sm bg-green-100 text-green-800 px-2 py-1 rounded-full">#Tag2</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-3">Category: <span class="font-medium">Tech</span></p>
                </div>
            </div>

            <!-- Repeat Article Cards -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img 
                    src="https://via.placeholder.com/300x200" 
                    alt="Article Image" 
                    class="w-full h-48 object-cover"
                >
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">Another Article</h2>
                    <div class="mt-2 flex items-center space-x-2">
                        <span class="text-sm bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">#Education</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-3">Category: <span class="font-medium">Business</span></p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
