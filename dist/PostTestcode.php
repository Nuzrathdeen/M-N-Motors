<?php
session_start();
// Check if the user ID is saved in the session
if(isset($_SESSION['uid'])) {
    // User ID is saved in the session, retrieve it
    $user_id = $_SESSION['uid'];
} else {
    // Handle the case when the user ID is not found in the session
    echo "User ID not found in the session";
}

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: Log%20In.php');
    exit();
}

@include 'config.php';
if(isset($_POST['emailsign'])){
  $email = mysqli_real_escape_string($conn, $_POST['UserEmail']);

  $select = "SELECT * FROM  users WHERE email = '$email'";

  $result = mysqli_query($conn, $select);
  if(empty(trim($_POST["UserEmail"]))){
    $error[] = 'Please enter an email.';
  }

  if(mysqli_num_rows($result) > 0){
    $error[] = 'User already exist!';
  }else{
    session_start();
    $insert = "INSERT INTO users(email) VALUES('$email')";
    mysqli_query($conn, $insert);
    $error[] = 'User Registered. Please Log in and add password';
  }
}; 
?>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
      
      
    <script src="bower_components/aos/dist/aos.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <style>
      html {
      scroll-behavior: smooth;
      scroll-padding-top: 9rem;
    }
    html {
    
    overflow-x: hidden;
    scroll-behavior: smooth;
    scroll-padding-top: 9rem;
  }
  
  html::-webkit-scrollbar {
    width: 0.5rem;
  }
  
  html::-webkit-scrollbar-track {
    background: #111;
  }
  
  html::-webkit-scrollbar-thumb {
    background: white;
    border-radius: 5rem;
  }
      .carousel-open:checked+.carousel-item {
        position: static;
        opacity: 100;
      }
  
      .carousel-item {
        -webkit-transition: opacity 0.6s ease-out;
        transition: opacity 0.6s ease-out;
      }
  
      #carousel-1:checked~.control-1,
      #carousel-2:checked~.control-2,
      #carousel-3:checked~.control-3 {
        display: block;
      }
  
      .carousel-indicators {
        list-style: none;
        margin: 0;
        padding: 0;
        position: absolute;
        bottom: 2%;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 10;
      }
  
      #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
      #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
      #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
        color: #2b6cb0;
        /*Set to match the Tailwind colour you want the active one to be */
      }

      .nav-links {
        z-index: 30;
      }

      #controls-carousel {
        z-index: 10;
      }
    </style>
<!-- Getting the email from the local storage
<script>
  document.addEventListener("DOMContentLoaded", function() {
      // Retrieve user email from localStorage
      const userEmail = localStorage.getItem('Username');

      // Display a prompt message with the user's email
      if (userEmail) {
          alert(`Welcome! Your Username is: ${userEmail}`);
      } else {
          alert("User email not found in localStorage.");
      }
  });
</script> -->


<title>M&N Motors</title>
<link rel="icon" href="bike2.jpeg" class="h-14 w-115 inline rounded-full border-solid border-2 border-amber-600 lg:h-20 lg:w-24 lg:border-4">
</head>
<body class="font-[Poppins] bg-gray-950 h-screen">
  <header class="bg-gray-900 ">
      <nav class=" flex justify-between items-center w-[92%]  mx-auto p-1">
          <div>
              <span class="text-2xl font-[Poppins] text-amber-900 cursor-pointer hover:text-white">
                  <img class="h-10 w-10 inline rounded-full m-2" src="bike2.jpeg" alt="bikeicon">M&N Motors</span>
          </div>
          <div
              class="nav-links duration-500 md:static absolute bg-gray-900 md:min-h-fit min-h-[45vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5 ">
              <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 bg-gray-900 text-slate-200 transition-all ease-in duration-700">
                  <li>
                      <a class="hover:text-gray-500" href="../Catalogue/body parts/newC.php">Products</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#services">Service</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="../dist/About.php">About</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#">Suppliers</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#footer">Contact</a>
                  </li>
                  <div>
                      <button class="bg-gray-700 text-white px-5 py-2 mb-4 rounded-full lg:mt-4 hover:bg-gray-500" onclick="document.location='Sign In.php'">Get Started</button>
                  </div> 
              </ul>
              
          </div>

           <!-- Cart -->
           <div class="ml-4 md:flex-row flex space-x-4 lg:ml-6 ">
            <a href="../Catalogue/body parts/about.php" class="group -m-2 flex space-x-6 items-center p-2">
              <svg class="h-7 w-7 flex-shrink-0  text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
              </svg>
            </a>
            <img class="w-8 h-8 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500 cursor-pointer" src="../dist/images/Manager.png" onclick="document.location = 'Profile.php'" alt="Bordered avatar">
            <box-icon name='menu' color='#f6f7f8' onclick='onToggleMenu(this)' class='text-3xl cursor-pointer md:hidden mb-1'></box-icon>
          </div>

          <!-- <div class="flex items-center gap-6">
              <box-icon class="text-3xl cursor-pointer" type='solid' color='#f7f7f7' name='cart' onclick=''></box-icon>
              <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden " color='#f7f7f7'></ion-icon>
              <box-icon name='menu' color='#f6f7f8' onclick='onToggleMenu(this)' class='text-3xl cursor-pointer md:hidden '></box-icon>
          </div> -->
      </nav>
  </header>
  <div id="controls-carousel" class="relative w-full " x-data="carousel()">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <template x-for="item in items">
          <div class="duration-700 ease-in-out " x-show="activeItem === item.id" data-carousel-item>
            <img :src="item.imageSrc" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
          </div>
        </template>
      </div>
    
      <!-- Slider controls -->
      <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev x-on:click="prev">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next x-on:click="next">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    
      <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
      <script>
        function carousel() {
          return {
            activeItem: 1,
            items: [
              {
                id: 1,
                imageSrc: 'images/slider-image1.jpg',
              },
              {
                id: 2,
                imageSrc: 'images/slider-image2.jpg',
              },
              {
                id: 3,
                imageSrc: 'images/slider-image3.jpg',
              },
            ],
            prev() {
              this.activeItem = this.activeItem === 1 ? this.items.length : this.activeItem - 1;
            },
            next() {
              this.activeItem = this.activeItem === this.items.length ? 1 : this.activeItem + 1;
            },
            startAutoplay() {
              setInterval(() => {
                this.next();
              }, 3000); // Change slide every 3 seconds (adjust as needed)
            },
          };
        }
    
        document.addEventListener('alpine:init', () => {
          const carouselInstance = carousel();
          carouselInstance.startAutoplay();
          Alpine.data('carousel', () => carouselInstance);
        });
      </script>
    </div>

  <!-- Intro -->
  <div class="container mx-auto p-8 hover:flex-grow rounded-full" data-aos="fade-up" data-aos-delay="100">
    <div
      class="flex-wrap text-center md:mx-auto bg-gray-600 p-3 py-6 rounded-md shadow-md shadow-gray-500 outline-3 outline-offset-2 transition ease-in-out delay-150   hover:bg-gray-700">
      <h2 class="text-amber-600 text-3xl font-serif ">
        Spare Parts <br>
        <font class="text-base text-white">Unleash the Power of Genuine Spare Parts</font>
      </h2>
      <span>Welcome to M&N Motors,we specialize in providing top-notch spare parts for a wide range of vehicles.

        At M&N Motors, we understand the importance of using genuine spare parts to ensure optimal performance,
        reliability, and safety. That's why we offer an extensive inventory of authentic parts sourced directly from
        reputable manufacturers. Whether you need parts for regular maintenance, repairs, or upgrades, we've got you
        covered.

        With a focus on quality and authenticity, we strive to exceed your expectations by offering competitive prices,
        prompt shipping, and reliable after-sales support.
      </span>
    </div>
  </div>
  <!-- Services -->
  <div class="container mx-auto justify-center md:flex md:justify-between md:items-center " style="max-width: 700px;" id="services">
    <div class="md:p-5 md:order-1">
      <p class="text-amber-600 text-6xl text-center p-5 md:float-left md:mr-10 hover:text-gray-300 font-serif" data-aos="fade-right">Our Services</p>
    </div>
    <span class="md:border md: border-amber-600 hover:border-gray-500 md:h-20 md:order-2"></span>
    <div class="text-white md:float-right md:p-5 md:mx-auto md:order-3 md:ml-10 px-12 " data-aos="fade-left">
      Our main service at our spare parts shop is to provide a wide range of high-quality spare parts for various
      vehicles.
      We understand the importance of using genuine parts to ensure optimal performance, reliability, and safety for
      your vehicle.
      Here's an overview of our main service:
    </div>
  </div>
  <!-- Services Includes -->
  <div class="w-screen min-h-fit max-w-screen-xl mx-auto p-8">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-7 ml-10 text-center text-white font-bold text-xl">
      <!-- Lights & Lamps -->
      <div class="relative max-w-xs h-64 overflow-hidden bg-cover bg-no-repeat bg-center" data-aos="fade-up" data-aos-delay="150">
        <img src="images/lights1.jpeg" class="max-w-xs transition duration-500 ease-in-out hover:scale-110" alt="lamp">
        <span class="absolute w-full py-2.5 bottom-28 inset-x-0 text-3xl leading-4">Lights & Lamps</span>
        <button
          class="absolute top-2/3  transform -translate-x-1/2 -translate-y-1/2 px-4 py-1 text-sm md:text-base bg-amber-600 text-gray-900 rounded-full" onclick="document.location='../Catalogue/body parts/newC.php'" >Shop
          Now</button>
      </div>
      <!-- Body Parts -->
      <div class="relative max-w-xs h-64 overflow-hidden bg-cover bg-no-repeat bg-center" data-aos="fade-up" data-aos-delay="300">
        <img src="images/OIPbody.jpeg" class="max-w-xs transition duration-500 ease-in-out hover:scale-110" alt="lamp">
        <span class="absolute w-full py-2.5 bottom-28 inset-x-0 text-3xl leading-4">Body Parts</span>
        <button
          class="absolute top-2/3  transform -translate-x-1/2 -translate-y-1/2 px-4 py-1 text-sm md:text-base bg-amber-600 text-gray-900 rounded-full" onclick="document.location='newC.php'">Shop
          Now</button>
      </div>
      <!-- Spare Parts -->
      <div class="relative max-w-xs h-64 overflow-hidden bg-cover bg-no-repeat bg-center" data-aos="fade-up" data-aos-delay="450">
        <img src="images/spare.jpeg" class="max-w-xs transition duration-500 ease-in-out hover:scale-110" alt="lamp">
        <span class="absolute w-full py-2.5 bottom-28 inset-x-0 text-3xl leading-4">Spare Parts</span>
        <button
          class="absolute top-2/3  transform -translate-x-1/2 -translate-y-1/2 px-4 py-1 text-sm md:text-base bg-amber-600 text-gray-900 rounded-full" onclick="document.location='newC.php'">Shop
          Now</button>
      </div>
    </div>
  </div>
  <!-- to Sign Up again -->
  <div class=" bg-cover bg-center w-full text-center md:text-left text-white mx-auto " data-aos="fade-up"
     data-aos-duration="200">
    <div class=" relative overflow-hidden bg-center">
      <img src="images/Royal-Enfield-Bullet-classic-500-HD-wallpaper.jpg"
        class="transition duration-700 ease-in-out hover:scale-110 md:w-full md:h-auto" alt="backdrop">
      <span
        class="absolute w-full py-4 md:top-24 md:left-28 bottom-28 md:bottom-28 inset-x-0 text-4xl md:text-6xl leading-4 font-serif" data-aos="fade-up" data-aos-delay="150">Join
        Us for the Ride</span>
      <hr class="absolute md:w-3/4 w-1/2 border-amber-500 md:top-52 top-36 md:border-t-2 md:ml-28 ml-28" data-aos="fade-up" data-aos-delay="200"><br>
      <span
        class="absolute w-full text-xl md:text-left text-white font-mono md:inset-52 md:left-28 md:pt-6 invisible md:visible" data-aos="fade-up" data-aos-delay="300">Our
        membership will give exclusive access to new arrivals, Sales and Special Offers. </span>
      <button onclick="document.location='Sign In.php'"
        class="absolute top-3/4 md:top-2/4 font-\[poppings\] transform -translate-x-1/2 -translate-y-1/2  px-4 py-1 md:left-44  text-sm md:text-xl bg-amber-600 text-gray-900 rounded-full md:px-6 md:py-3" data-aos="fade-up" data-aos-delay="300">Sign
        In</button>
    </div>
  </div>

  <!-- Testimonial -->
  <div class="flex flex-wrap" id="testimonial">
    <div class="w-full p-4 md:py-10 md:w-1/2 mx-auto  " data-aos="fade-down" data-aos-delay="150">
      <div class="p-8 rounded-xl shadow-md shadow-gray-500"><span class="text-6xl text-gray-400">❝</span>
        <p class="text-base text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium alias
          minima rerum. Soluta assumenda eveniet obcaecati maxime temporibus qui ab voluptas doloremque illo, odio optio
          ex, atque numquam tempore quis.</p>
        <hr class="my-4">
        <div class="flex flex-wrap items-center">
          <img class="w-12 h-12 rounded-full" alt="Use any sample image here..." src="images/4441dark.webp">
          <p class="mx-3 text-amber-500 text-sm">User Name<br>More Info</p>
        </div>
      </div>
    </div>

    <div class="w-full p-4 md:py-10 md:w-1/2 mx-auto " data-aos="fade-down" data-aos-delay="300">
      <div class="p-8 rounded-xl shadow-md shadow-gray-500">
        <span class="text-6xl text-gray-400">❝</span>
        <p class="text-base text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium alias
          minima rerum. Soluta assumenda eveniet obcaecati maxime temporibus qui ab voluptas doloremque illo, odio optio
          ex, atque numquam tempore quis.</p>
        <hr class="my-4">
        <div class="flex flex-wrap items-center"><img class="w-12 h-12 rounded-full" alt="Use any sample image here..."
            src="images/4441dark.webp">
          <p class="mx-3 text-amber-500 text-sm">User Name<br>More Info</p>
        </div>
      </div>
    </div>

    <div class="w-full p-4 md:py-10 md:w-1/2 mx-auto  " data-aos="fade-down" data-aos-delay="450">

      <div class="p-8 rounded-xl shadow-md shadow-gray-500"><span class="text-6xl text-gray-400">❝</span>
        <p class="text-base text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium alias
          minima rerum. Soluta assumenda eveniet obcaecati maxime temporibus qui ab voluptas doloremque illo, odio optio
          ex, atque numquam tempore quis.</p>
        <hr class="my-4">
        <div class="flex flex-wrap items-center"><img class="w-12 h-12 rounded-full" alt="Use any sample image here..."
            src="images/4441dark.webp">
          <p class="mx-3 text-amber-500 text-sm">User Name<br>More Info</p>
        </div>
      </div>
    </div>
  </div>


  <footer class="bg-gray-900" id="footer">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <div class="lg:flex lg:items-start lg:gap-8">
        <div class="text-gray-900">
          <img src="bike2.jpeg" alt="bikeicon"
            class="h-14 w-115 inline rounded-full border-solid border-2 border-amber-600 lg:h-16 lg:w-24 lg:border-4">
          <path
            d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
            fill="currentColor" />
        </div>
        <div class="mt-8 grid grid-cols-2 gap-8 lg:mt-0 lg:grid-cols-5 lg:gap-y-16">
          <div class="col-span-2">
            <div>
              <h2 class="text-2xl font-bold text-gray-200">
                Get the latest news!</h2>
              <p class="mt-4 text-gray-300">
                To get the latest news. And make your dream a reality. Buy for a reasonable price.</p>
            </div>
          </div>
          <?php
              if(isset($error)){
                foreach($error as $error){
                   echo '<div><span class="error-msg flex justify-center mb-2 p-1 bg-slate-700 border-4 rounded-lg">'.$error.'</span></div>';
                };
              };
           ?>

          <div class="col-span-2 lg:col-span-3 lg:flex lg:items-end">
            <form class="w-full">
              <label for="UserEmail" class="sr-only"> Email </label>

              <div class="border border-gray-100 p-2 focus-within:ring sm:flex sm:items-center sm:gap-4">
                <input type="email" id="UserEmail" name="UserEmail" placeholder="john@gmail.com"
                  class="w-full border-none focus:border-transparent focus:ring-transparent sm:text-sm" />
                <button name="emailsign"
                  class="mt-1 w-full bg-gray-400 px-6 py-3 text-sm font-bold uppercase tracking-wide text-white transition-none hover:bg-amber-700 sm:mt-0 sm:w-auto sm:shrink-0">
                  Sign Up
                </button>
              </div>
            </form>
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-200">Services</p>
            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  Lights & Lamps
                </a>
              </li>
              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  Body Parts
                </a>
              </li>
              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  Spare Parts
                </a>
              </li>
            </ul>
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-200">Company</p>
            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  About
                </a>
              </li>

              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  Meet the Team
                </a>
              </li>

              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  Review
                </a>
              </li>
            </ul>
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-200">Helpful Links</p>

            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  Contact
                </a>
              </li>

              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  FAQs
                </a>
              </li>
            </ul>
          </div>
          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-200">Legal</p>

            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  Returns Policy
                </a>
              </li>

              <li>
                <a href="#" class="text-gray-300 transition hover:opacity-75">
                  Refund Policy
                </a>
              </li>
            </ul>
          </div>

          <ul class="col-span-2 flex justify-start md:pt-1 gap-6 lg:col-span-5 lg:justify-end">
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
          <p class="text-xs text-gray-300">
            &copy; 2022. <font class="hover:text-amber-600">M&N Motors.</font> All rights reserved.
          </p>
          <ul class="mt-8 flex flex-wrap justify-start gap-4 text-xs sm:mt-0 lg:justify-end">
            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75">
                Terms & Conditions
              </a>
            </li>

            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75">
                Privacy Policy
              </a>
            </li>

            <li>
              <a href="#" class="text-gray-300 transition hover:opacity-75">
                Cookies
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- SCRIPTS -->
  <script>
    var userId = localStorage.getItem('userID');
    var username1 = localStorage.getItem('Username');
    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e){
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-[8%]')
        console.log(userId)
    }
</script>
  <!-- Animation Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

  <script>
    AOS.init({
      duration: 800,
      offset: 150,
    });
  </script>

</body>
</html>