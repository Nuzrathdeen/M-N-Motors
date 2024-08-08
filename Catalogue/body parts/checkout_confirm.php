<?php
include 'config.php';

// Initialize $user_id variable
$user_id = null;

// Check if $_SESSION['uid'] is set
if(isset($_SESSION['uid'])) {
   // User ID is saved in the session, retrieve it
   $user_id = $_SESSION['uid'];
   echo "User ID: " . $user_id;
   
}

$sql = "SELECT MAX(uoid) AS last_order_id FROM uorder WHERE uid = '$user_id'";
$result = mysqli_query($conn,$sql);  

if ($result) {
   // Fetch all the data from the result of the query     
   if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $last_order_id = $row['last_order_id'];
   } else {
      // Handle error if no order found
      $last_order_id = "N/A";
   }
} else {
   $last_order_id = "Error: " . mysqli_error($conn);
}



mysqli_close($conn);             
?>
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
   <title>Welcome</title>
</head>
<body>
   <div class=" bg-gray-950 md:h-screen min-h-screen">

      <section id="features"
          class="relative px-10 py-5 md:py-20 md:px-10  border-t border-b border-neutral-900 bg-neutral-900/30 h-full sm:h-full flex flex-col justify-center items-center w-full">
  
  
          <div class="relative mx-auto max-w-5xl text-center">
              
              <h2
                  class="block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-xl sm:text-3xl mb-8 mx-5 md:m-3">
                 Thank You for shopping with M&N Motors......
              </h2>
              <p
                  class="mx-auto mt-10 my-2 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
                  Waiting for the confirmation of the order<span class="p-3"><?php echo $last_order_id; ?></span> 
              </p>
          </div>
  
      <div class="flex flex-row space-x-12">
         <div class="my-8">
            <button class="bg-gray-500 text-white px-7 py-2 rounded-full hover:bg-amber-600 object-center" onclick="document.location='../dist../PostTestcode.php'">Back </button>
         </div>
         <div class="mt-8">
            <button
            class="group flex items-center justify-start w-11 h-11 bg-amber-600 rounded-full cursor-pointer relative overflow-hidden transition-all duration-200 shadow-lg hover:w-32 hover:rounded-lg active:translate-x-1 active:translate-y-1"
            >
            <div
               class="flex items-center justify-center w-full transition-all duration-300 group-hover:justify-start group-hover:px-3"
            >
               <svg class="w-4 h-4" viewBox="0 0 512 512" fill="white">
                  <path
                  d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
                  ></path>
               </svg>
            </div>
            <div
               class="absolute right-5 transform translate-x-full opacity-0 text-white text-lg font-semibold transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100"
            onclick="document.location='newC.php'";
               >
               Continue
            </div>
            </button>
         </div> 
         
      </div>
         
          <div class="absolute bottom-0 left-0 z-0 h-1/3 w-full sm:h-1/3 border-b"
              style="background-image: linear-gradient(to right top, rgba(79, 70, 229, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);">
          </div>
          <div class="absolute bottom-0 right-0 z-0 h-1/3 w-full"
              style="background-image: linear-gradient(to left top, rgba(220, 111, 38, 0.489) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);">
          </div>
  
      </section>

  </div>
</body>
</html>