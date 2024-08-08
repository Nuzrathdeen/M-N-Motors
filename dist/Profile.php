<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>
   <!-- Add this script tag to include Firebase SDK -->
   <!-- <script type="module" src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js"></script>
   <script type="module" src="https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js"></script> -->
   


<!-- 
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyBdDfNaggPKow6cRSkUY3yWQDuXt1ezTHs",
    authDomain: "dip-final-project-d6b70.firebaseapp.com",
    projectId: "dip-final-project-d6b70",
    storageBucket: "dip-final-project-d6b70.appspot.com",
    messagingSenderId: "93911434056",
    appId: "1:93911434056:web:9e05c67c3679e8a075e97d"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const db = firebase.firestore();
</script> -->

</head>
<body style="background-color: #111827;" class="bg-gray-800">
   <!-- component -->
   <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('images/avengers-infinity-minimal-wallpaper-1024x768-wallpaper.jpg');
          ">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-gray-800"></span>
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <section class="relative py-16 bg-gray-950">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-gray-700 w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                <img alt="..." src="images/Manager.png" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
              </div>
            </div>
            <div class="w-full pt-5 lg:w-4/12 px-4 lg:order-3 lg:text-right lg:items-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
                <a href="../DeenCart/final/about.html">
                  <button class="bg-amber-600 active:bg-gray-50 uppercase text-gray-300 font-bold hover:shadow-md shadow text-xs px-4 py-2 md:px-10 rounded-lg outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                    Cart
                  </button>
                <a>
                 
              </div>
            </div>
          </div>
          <div class="text-center mt-12">
            <h3 id="ProfileUsername" class="text-4xl font-semibold leading-normal mb-2 text-blueGray-300">
              
            </h3>
            <div id="ProfileEmail" class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
            </div>
          </div>

          <div class="mt-10 py-10 lg:px-64 border-t border-gray-400 items-center text-white ">
            <div class="flex flex-col w-full justify-center space-y-6 lg:flex-wrap">
              <button class=" w-full h-10 md:h-12 text-blueGray-900 font-light outline outline-2 rounded-lg bg-transparent hover:bg-amber-600" onclick="document.location='ASettings.html'">
                Account Settings
              </button>
              <button class=" w-full h-10 md:h-12 text-blueGray-900 font-light outline outline-2 rounded-lg bg-transparent hover:bg-amber-600">
                Wishlist
              </button>
              <button class="w-full h-10 md:h-12 text-blueGray-900 font-light outline outline-2 rounded-lg bg-transparent hover:bg-amber-600"
              onclick="Warning()">
                Sign Out
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
        <div class="text-sm text-blueGray-500 font-semibold py-1">
          <a class="text-blueGray-500 hover:text-gray-800" target="_blank" href="PostTestcode.html">M&N Motors</a> 
        </div>
      </div>
    </div>
  </div>
</footer>
  </section>
</main>
<script>
  function Warning(){
   var confirmed = confirm("Are you sure you want to sign out?");
   if(confirmed) {
    window.location.href = "Testcode.html";
    // form.reset();
   }
  }
</script>

<!-- <script>
  document.addEventListener("DOMContentLoaded", function () {
      // Retrieve user email from localStorage
      const username = localStorage.getItem('Username');
      // alert(`Welcome! Your Username is: ${username}`);

      if (username) {
          // Reference to the details form elements
          const ViewUsername = document.getElementById('ProfileUsername');
          const ViewEmail = document.getElementById('ProfileEmail');

          // Get user data from Firestore based on email
          db.collection('Users').where('Username', '==', username).get()
              .then((querySnapshot) => {
                  if (!querySnapshot.empty) {
                      const userData = querySnapshot.docs[0].data();

                  // Update the text boxes with the retrieved data
                  ViewUsername.value = userData.Username;
                  ViewEmail.value = userData.Email;
                  alert(`${ViewUsername.value}`);

                  } else {
                      console.log("No matching document!");
                  }
              })
              .catch((error) => {
                  console.error("Error getting documents: ", error);
              });
      } else {
          alert("User email not found in localStorage.");
      }
  });
</script> -->
</body>
</html>