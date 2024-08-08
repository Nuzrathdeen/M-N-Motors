<?php
 include 'config.php';

if(isset($_POST['Iproduct'])){
  $name = mysqli_real_escape_string($conn, $_POST['PName']);
  $price = mysqli_real_escape_string($conn, $_POST['Price']);
  $description = mysqli_real_escape_string($conn, $_POST['Description']);
  $selection = mysqli_real_escape_string($conn, $_POST['Product']);
  //if the user type is to be selected 
  //$user_type = md5($_POST['user_type']);

  $select = "INSERT INTO parts (category, name, description, price) VALUES ('$selection', '$name', '$description', '$price')";

  $result = mysqli_query($conn, $select);

if ($result === TRUE) {
   $err = "New product inserted successfully";
   //echo "Record inserted successfully";
} else {
   $err = "Error inserting product: " . mysqli_error(Sconn);
}

}elseif (isset($_POST['deleteProduct'])) {
   $product_id = mysqli_real_escape_string($conn, $_POST['PName']);

   $delete_query = "DELETE FROM parts WHERE name = '$product_id'";
   $delete_result = mysqli_query($conn, $delete_query);

   if ($delete_result === TRUE) {
       $err = "Product deleted successfully";
   } else {
       $err = "Error deleting product: " . mysqli_error($conn);
   }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en" class="overflow-hidden h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
      <script>
      function displayMessage() {
      var messageSpan = document.getElementById("message");
      if (messageSpan) {
         var message = messageSpan.innerText;
         if (message) {
            messageSpan.style.display = "block";
            alert(message);
            messageSpan.innerText = "";
         }
      }
      }
      </script>
      <script>
        function clearForm() {
            document.getElementById("productForm").reset();
        }
    </script>
    <title>Inserting Product</title>
</head>
<body class="overflow-auto w-full h-full m-0 p-0">
<div class=" bg-gray-950 md:h-screen min-h-screen">

<section id="features"
    class="relative px-10 py-5 md:py-20 md:px-10  border-t border-b border-neutral-900 bg-neutral-900/30 h-full sm:h-full flex flex-col justify-center items-center w-full">
    <div class="absolute md:top-10 md:left-5 left-10 p-4 object-none object-right-top">
    <button class="cursor-pointer duration-200 hover:scale-125 active:scale-100" title="Go Back" onclick="document.location='AdminPage.php'">
      <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 24 24" class="stroke-orange-400">
         <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
      </svg>
    </button>
    </div>
    <div class="flex justify-center pt-18">
        <span class="text-white text-4xl hover:text-amber-600">Insert New Product</span>
      </div>
      <div class="flex flex-row w-full justify-center items-center text-white bg-slate-600 border-4 rounded-lg mb-4 mt-4 lg:w-2/4 lg:p-3 ">
         <span class="invalid-feedback " id="message" ><?php echo $err; ?></span>
      </div>
    <div class="relative mx-auto max-w-5xl text-center">
   
      <form class="space-y-4 text-gray-400" id="productForm" action="" method ="POST">
      
      <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
         <div class="w-full px-2 md:w-1/3">
            <label class="block mb-1" for="PName">Name</label>
            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="PName" name="PName"/>
         </div>
         <div class="w-full pt-4  md:pt-7 px-2 md:w-1/3">
            <!-- <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_year"/> -->
            <select class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" name="Product" id="Product">
               <option selected>Select the Category</option>
               <option value="BP">Body Parts</option>
               <option value="LL">Lights & Lamps</option>
               <option value="SP">Spare Parts</option>
            </select>
         </div>
         <div class="w-full px-2 md:w-1/3">
            <label class="block mb-1" for="Price">Price</label>
            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="int" name="Price" id="Price"/>
         </div>
         <div class="w-full">
            <label class="block sm:pt-2 mb-2" for="Description">Description</label>
            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" name="Description" id="Description"/>
         </div>
         <div class="w-full">
         <div class="flex-row inline-flex p-4 pb-4" role="group" aria-label="Button group">
            <!-- <button class="h-10 px-5 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-l-lg focus:shadow-outline hover:bg-amber-600">Update</button> -->
            <button class="h-10 px-5 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-l-lg focus:shadow-outline hover:bg-amber-600" name="deleteProduct" >Delete</button>
            <button class="h-10 px-5 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-r-lg focus:shadow-outline hover:bg-amber-600" onclick="clearForm()">Clear</button>
         </div>
         <button name="Iproduct" class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-amber-600">Insert Product</button>
         </div>
      </div>
      </form>
   </div>
</section>
</div>
</body>
</html>
