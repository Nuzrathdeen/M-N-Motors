<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>Admin</title>
</head>
<body>
<div class=" bg-gray-950  h-screen">

<section id="features"
    class="relative px-10 py-5 md:py-20 md:px-10  border-t border-b border-neutral-900 bg-neutral-900/30 h-full sm:h-full flex flex-row justify-center items-center ">
    
    <div class="mt-10 py-10 lg:px-64 border-t border-gray-400 items-center text-white ">
            <div class="flex flex-col w-100% justify-center space-y-6 lg:flex-wrap">
            <button class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-amber-600" onclick="document.location = 'AOrder.php'">Orders</button>
            <button class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-amber-600" onclick="document.location = 'InsertProduct.php'">Insert Product</button>

            <button class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-amber-600">Orders</button>
            </div>
          </div>
</section>
</div>
</body>
</html>