<?php
include 'config.php';

// Fetch parts data from the database
$sql = "SELECT * FROM parts";
$result = mysqli_query($conn, $sql);

$parts = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $parts[] = $row;
    }
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Catalouge</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="addtocart1.js"></script>

  <style>
    .w3-bar-block .w3-bar-item {
      padding: 20px
    }
  </style>
</head>

<body class="bg-gray-300">

  <!--Header-->
  <header class="header">
    <!--Nav-->
    <div class="navbar">
      <a href="#" class="logo">Body Parts</a>
      <!--Cart-Icon-->
      <i class='bx bx-shopping-bag' id="cart-icon"></i>
    </div>
  </header>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-content " style="max-width:1200px;margin-top:100px">
    <h2 class="section-title">Shop Items</h2>
<!-- PAGE 1 -->

    <div class="section-page1" id="page1">
      <!-- First Photo Grid-->
      <div class="w3-row-padding w3-padding-16 w3-center" id="SPcatalogue">
      <?php foreach ($parts as $part): ?>
        <div class="w3-quarter product-box part" id="">
          <img src="<?php echo $part['image']; ?>" alt="Sandwich" style="width:100% ">
          <h2 class="product-title"><?php echo $part['name']; ?></h2>
          <span class="price">$<?php echo $part['price']; ?></span>
          <br>
          <button class="bg-amber-600 rounded-md p-1 border-solid border-amber-500 border-2 mt-3 w-full text-gray-300 item mb-6"  id="addItem1">Add</button>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item2.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title">Tank Protector</h2>
          <span class="price">Rs.5300.00</span>
          <br>
          <button class="bg-amber-600 rounded-md p-1 border-solid border-amber-500 border-2 mt-3 w-full text-gray-300 item mb-6" id="addItem2">Add</button>
          <!-- <i class='bx bx-shopping-bag add-cart'></i> -->
        </div>
        <div class="w3-quarter product-box" id="item1">
          <img src="img/item3.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title">Gas tank</h2>
          <span class="price">Rs.21000.00</span>
          <br>
          <button class="bg-amber-600 rounded-md p-1 border-solid border-amber-500 border-2 mt-3 w-full text-gray-300 item mb-6" id="addItem3" onclick="addItemToCart('item1')">Add</button>
          <!-- <i class='bx bx-shopping-bag add-cart'></i> -->
        </div>
        <div class="w3-quarter product-box" id="">
          <img src="img/item4.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title lg:mt-6 mt-2">alloy rim front and rear</h2>
          <span class="price">Rs.35000.00</span>
          <br>
          <button class="bg-amber-600 rounded-md p-1 border-solid border-amber-500 border-2 lg:mt-6 w-full text-gray-300 item mb-6" id="addItem4">Add</button>
          <!-- <i class='bx bx-shopping-bag add-cart'></i> -->
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Second Photo Grid-->
      <div class="w3-row-padding w3-padding-16 w3-center">
        <div class="w3-quarter product-box" id="item2">
          <img src="img/item5.jpg" alt="Popsicle" style="width:100%">
          <h2 class="product-title">side mirror </h2>
          <span class="price">Rs.2000.00</span>
          <br>
          <button class="bg-amber-600 rounded-md p-1 border-solid border-amber-500 border-2 mt-3 w-full text-gray-300 item mb-6" id="addItem1">Add</button>
          <!-- <i class='bx bx-shopping-bag add-cart'></i> -->
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item6.jpg" alt="Salmon" style="width:100%">
          <h2 class="product-title">seat cover</h2>
          <span class="price">Rs.4700.00</span>
          <br>
          <button class="bg-amber-600 rounded-md p-1 border-solid border-amber-500 border-2 mt-3 w-full text-gray-300 item mb-6" id="addItem1">Add</button>
          <!-- <i class='bx bx-shopping-bag add-cart'></i> -->
        </div>
        <div class="w3-quarter product-box" id="item3">
          <img src="img/item7.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title mt-4">Muffler</h2>
          <span class="price">Rs.16400.00</span>
          <br>
          <button class="bg-amber-600 rounded-md p-1 border-solid border-amber-500 border-2 mt-3 w-full text-gray-300 item mb-6" id="addItem1">Add</button>
          <!-- <i class='bx bx-shopping-bag add-cart'></i> -->
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item8.jpg" alt="Croissant" style="width:100%">
          <h2 class="product-title">Side Stand</h2>
          <span class="price">Rs.4300.00</span>
          <br>
          <button class="bg-amber-600 rounded-md p-1 border-solid border-amber-500 border-2 mt-3 w-full text-gray-300 item mb-6" id="addItem1">Add</button>
          <!-- <i class='bx bx-shopping-bag add-cart'></i> -->
        </div>
      </div>
      

    </div>


<!-- PAGE 2 -->

    <div class="section-page2" style="display: none;" id="page2">
      <!-- First Photo Grid-->
      <div class="w3-row-padding w3-padding-16 w3-center" id="SPcatalogue">
        <div class="w3-quarter product-box">
          <img src="img/item9.jpg" alt="Sandwich" style="width:100% ">
          <h2 class="product-title">Grab Bar </h2>
          <span class="price">Rs.3580.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item10.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title">Number Plate Cover</h2>
          <span class="price">Rs.1400.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item11.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title">Mud Flap</h2>
          <span class="price">Rs.6700.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item12.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title">Skid Plate</h2>
          <span class="price">Rs.11150.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>


      </div>

      <!-- Second Photo Grid-->
      <div class="w3-row-padding w3-padding-16 w3-center">
        <div class="w3-quarter product-box">
          <img src="img/item13.jpg" alt="Popsicle" style="width:100%">
          <h2 class="product-title">Airbox Cover </h2>
          <span class="price">Rs.950.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item14.jpg" alt="Salmon" style="width:100%">
          <h2 class="product-title">Ram Mount X-grip Tether</h2>
          <span class="price">Rs.700.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item15.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title">Fork And Shock Protectors</h2>
          <span class="price">Rs.4800.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item16.webp" alt="Croissant" style="width:100%">
          <h2 class="product-title">Hand Guard</h2>
          <span class="price">Rs.5500.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
      </div>
    </div>

    
<!-- PAGE 3 -->
    
    <div class="section-page3" style="display: none;" id="page3">
      <!-- First Photo Grid-->
      <div class="w3-row-padding w3-padding-16 w3-center" id="SPcatalogue">
        <div class="w3-quarter product-box">
          <img src="img/item17.jpg" alt="Sandwich" style="width:100% ">
          <h2 class="product-title">Gas Vent Cap </h2>
          <span class="price">Rs.2200.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item18.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title">Pro Fork Shoe</h2>
          <span class="price">Rs.1850.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
        <div class="w3-quarter product-box">
          <img src="img/item19.jpg" alt="Sandwich" style="width:100%">
          <h2 class="product-title">Restyle Kit</h2>
          <span class="price">Rs.15500.00</span>
          <i class='bx bx-shopping-bag add-cart'></i>
        </div>
      </div>

    </div>



   <!-- Pagination -->
   <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" onclick="goto1();" class="w3-bar-item w3-button w3-hover-black" style="color: white; background-color: black;" id="n1">1</a>
      <a href="#" onclick="goto2();" class="w3-bar-item w3-button w3-hover-black" id="n2">2</a>
      <a href="#" onclick="goto3();" class="w3-bar-item w3-button w3-hover-black" id="n3">3</a>
    </div>
  </div>

  <hr id="about">



  <!-- End page content -->
</div>
<!-- Footer -->
<footer class="bg-gray-900 lg:w-screen" id="footer">
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="lg:flex lg:items-start lg:gap-8">
      <div class="text-gray-900">
        <img src="bike2.jpeg" alt="bikeicon"
          class="w-115 inline h-14 rounded-full border-2 border-solid border-amber-600 lg:h-16 lg:w-24 lg:border-4" />
        <path
          d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
          fill="currentColor" />
      </div>
      <div class="mt-8 grid grid-cols-2 gap-8 lg:mt-0 lg:grid-cols-5 lg:gap-y-16">
        <div class="col-span-2">
          <div>
            <h2 class="text-2xl font-bold text-gray-200">Get the latest news!</h2>
            <p class="mt-4 text-gray-300">To get the latest news. And make your dream a reality. Buy for a reasonable
              price.</p>
          </div>
        </div>

        <div class="col-span-2 lg:col-span-3 lg:flex lg:items-end">
          <form class="w-full">
            <label for="UserEmail" class="sr-only"> Email </label>

            <div class="border border-gray-100 p-2 focus-within:ring sm:flex sm:items-center sm:gap-4">
              <input type="email" id="UserEmail" placeholder="john@gmail.com"
                class="w-full border-none focus:border-transparent focus:ring-transparent sm:text-sm" />
              <button
                class="mt-1 w-full bg-gray-400 px-6 py-3 text-sm font-bold uppercase tracking-wide text-white transition-none hover:bg-amber-700 sm:mt-0 sm:w-auto sm:shrink-0">Sign
                Up</button>
            </div>
          </form>
        </div>

        <div class="col-span-2 sm:col-span-1">
          <p class="font-medium text-gray-200">Services</p>
          <ul class="mt-6 space-y-4 text-sm">
            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> Lights & Lamps </a>
            </li>
            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> Body Parts </a>
            </li>
            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> Spare Parts </a>
            </li>
          </ul>
        </div>

        <div class="col-span-2 sm:col-span-1">
          <p class="font-medium text-gray-200">Company</p>
          <ul class="mt-6 space-y-4 text-sm">
            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> About </a>
            </li>

            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> Meet the Team </a>
            </li>

            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> Review </a>
            </li>
          </ul>
        </div>

        <div class="col-span-2 sm:col-span-1">
          <p class="font-medium text-gray-200">Helpful Links</p>

          <ul class="mt-6 space-y-4 text-sm">
            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> Contact </a>
            </li>

            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> FAQs </a>
            </li>
          </ul>
        </div>
        <div class="col-span-2 sm:col-span-1">
          <p class="font-medium text-gray-200">Legal</p>

          <ul class="mt-6 space-y-4 text-sm">
            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> Returns Policy </a>
            </li>

            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75"> Refund Policy </a>
            </li>
          </ul>
        </div>

        <ul class="col-span-2 flex justify-start gap-6 md:pt-1 lg:col-span-5 lg:justify-end">
          <li>
            <a href="/" rel="noreferrer" target="_blank" class="text-gray-200 transition hover:opacity-75">
              <span class="sr-only">Facebook</span>

              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </li>
          <li>
            <a href="/" rel="noreferrer" target="_blank" class="text-gray-200 transition hover:opacity-75">
              <span class="sr-only">Instagram</span>

              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </li>
          <li>
            <a href="/" rel="noreferrer" target="_blank" class="text-gray-200 transition hover:opacity-75">
              <span class="sr-only">Twitter</span>

              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path
                  d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
              </svg>
            </a>
          </li>
          <li>
            <a href="/" rel="noreferrer" target="_blank" class="text-gray-200 transition hover:opacity-75">
              <span class="sr-only">GitHub</span>

              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="mt-8 border-t border-gray-100 pt-8 md:pt-4">
      <div class="sm:flex sm:justify-between">
        <p class="text-xs text-gray-300">&copy; 2022. <font class="hover:text-amber-600">M&N Motors.</font> All rights
          reserved.</p>
        <ul class="mt-8 flex flex-wrap justify-start gap-4 text-xs sm:mt-0 lg:justify-end">
          <li>
            <a href="#" class="text-gray-300 transition hover:opacity-75"> Terms & Conditions </a>
          </li>

          <li>
            <a href="#" class="text-gray-300 transition hover:opacity-75"> Privacy Policy </a>
          </li>

          <li>
            <a href="#" class="text-gray-300 transition hover:opacity-75"> Cookies </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<script>
  var page1 = document.getElementById("page1");
  var page2 = document.getElementById("page2");
  var page3 = document.getElementById("page3");
  var n1 = document.getElementById("n1");
  var n2 = document.getElementById("n2");
  var n3 = document.getElementById("n3");

  function goto1(){
    page1.style.display="grid";
    page2.style.display="none";
    page3.style.display="none";


    n1.style.backgroundColor="black";
    n1.style.color="white";
    n1.style.display="block";

    n2.style.backgroundColor="#d1d5db";
    n2.style.color="black";
    n2.style.display="block";

    n3.style.backgroundColor="#d1d5db";
    n3.style.color="black";
    n3.style.display="block";
  }

  function goto2(){
    page1.style.display="none";
    page2.style.display="grid";
    page3.style.display="none";


    n1.style.backgroundColor="#d1d5db";
    n1.style.color="black";
    n1.style.display="block";

    n2.style.backgroundColor="black";
    n2.style.color="white";
    n2.style.display="block";

    n3.style.backgroundColor="#d1d5db";
    n3.style.color="black";
    n3.style.display="block";
  }

  function goto3(){
    page1.style.display="none";
    page2.style.display="none";
    page3.style.display="grid";


    n1.style.backgroundColor="#d1d5db";
    n1.style.color="black";
    n1.style.display="block";

    n2.style.backgroundColor="#d1d5db";
    n2.style.color="black";
    n2.style.display="block";

    n3.style.backgroundColor="black";
    n3.style.color="white";
    n3.style.display="block";
  }

</script>


</body>
</html>