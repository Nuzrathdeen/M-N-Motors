<?php
include 'config.php';


// Start the session to access session variables
session_start();

// Check if the user ID is saved in the session
if(isset($_SESSION['uid'])) {
    // User ID is saved in the session, retrieve it
    $user_id = $_SESSION['uid'];
} else {
    // Handle the case when the user ID is not found in the session
    echo "User ID not found in the session";
}


// Fetch parts data from the database
$sql = "SELECT * FROM parts";
$result = mysqli_query($conn, $sql);

$parts = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $parts[] = $row;
    }
}

// if(isset($_POST['remove'])){
//     $index = intval($_GET["index"]);
//     unset($parts[$index]);
//     header("Location: index.php?page=cart");
// }

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Catalouge</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
        .truncate-3-lines {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Number of lines to show */
            -webkit-box-orient: vertical;
        }
    </style>
</head>
<body class="bg-gray-300 h-screen">
<header class="header">
    <!--Nav-->
    <div class="bg-gray-900 h-22 flex justify-between items-center p-2">
      <a href="#" class="text-2xl text-gray-400 m-2 font-semibold">Body Parts</a>
      <!-- Cart -->
      <div class="ml-4 md:flex-row flex space-x-4 lg:ml-6 ">
         <a href="about.php" class="group -m-2 flex space-x-6 items-center p-2">
           <svg class="h-7 w-7 flex-shrink-0  text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
             <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
           </svg>
         </a>
      </div>
     </div>
</header>
<div class="flex justify-center items-center pt-16 text-gray-600 ">
<h2 class="text-2xl text-center border-b border-gray-600 font-bold">Shop Items</h2>
</div>

<!-- second card -->
<div name="Cardsection"  id="CardSection" class="container mt-10">
<div class="flex flex-wrap justify-between space-y-4 items-center sm:p-8 p-28 overflow-hidden ">
<?php foreach ($parts as $part): ?>
<div class="w-80 h-auto p-4 text-gray-400 bg-gray-900 rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
        <img class="w-full h-40 object-cover rounded-t-lg" alt="Card Image" src="images/<?php echo $part['image'] ?>">
        <div class="p-4 space-y-4">
            <h2 class="text-xl  font-semibold"><?php echo $part['name']; ?></h2>
            <p class="text-gray-500 overflow-hidden truncate-3-lines"><?php echo $part['description']; ?></p>
            <span class="text-l font-bold text-amber-600">Price: $<?php echo $part['price']; ?></span>
            <form action="addToCart.php" id ="addToCartForm" method="post">
                <input type="hidden" name="item_id" value="<?php echo $part['pid']; ?>">
                <input type="number" name="quantity" class="rounded-lg text-gray-600 bg-gray-300" value="1" min="1"/>
            <div class="flex justify-between items-center mt-4">
                <button type="submit" name="tocart" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-amber-400">Add to Cart</button>
            </div>
            </form>
        </div>
</div>
<?php endforeach; ?>
</div>


</div>


</body>
</html>