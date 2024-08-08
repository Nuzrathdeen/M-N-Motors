<html>
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
   
    <title>Products</title>
   </head>
   <body>
      <div class="bg-gray-950 h-screen">
         <p class="flex h-10 items-center justify-center bg-amber-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">Sign in to purchase wonderfull parts.</p>
         <header class="bg-gray-900 z-10 ">
          <nav class=" flex justify-between items-center w-[92%]  mx-auto p-1">
              <div>
                  <span class="text-2xl font-[Poppins] text-amber-900 cursor-pointer hover:text-white">
                      <img class="h-10 w-10 inline rounded-full m-2" src="bike2.jpeg" alt="bikeicon">M&N Motors</span>
              </div>
              <div class="lg:justify-center lg:my-2 font-[Poppins] invisible md:visible text-white text-2xl ">Products</div>
              <div
              class="nav-product nav-links lg:hidden md:static absolute z-30 w-full bg-gray-900 md:min-h-fit min-h-[45vh] left-0 top-[-100%] md:w-auto   flex items-center px-5 ">
              <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 bg-gray-900 text-slate-200 transition-all ease-in duration-700">
                  <li>
                      <a class="hover:text-gray-500" href="#catalogue.html">Products</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#services">Service</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#About">About</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#">Suppliers</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#footer">Contact</a>
                  </li>
                
              </ul>
              
          </div>
    
               <!-- Cart -->
               <div class="ml-4 sm:flex-row flex space-x-4 lg:ml-6">
                <a href="/DeenCart/final/about.html" class="group -m-2 flex space-x-3 items-center pb-2">
                  <svg class="h-6 w-6 flex-shrink-0  text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                  </svg>  
                </a>
                <box-icon name='menu' color='#f6f7f8' onclick='onToggleMenu(this)' class='text-3xl cursor-pointer md:hidden mb-1'></box-icon>
              </div>
          </nav>
          <style>
            .nav-links {
               z-index: 30;
            }
          </style>
      </header>
      <!-- The tabs -->
      <div class="w-fit sm:w-full">
        <div class="relative right-0">
          <ul
            class="relative flex list-none flex-wrap rounded-xl bg-blue-gray-50/60 p-1"
            data-tabs="tabs"
            role="list"
          >
            <li class="z-30 flex-auto text-center">
              <a 
                class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                data-tab-target=""
                active=""
                role="tab"
                aria-selected="true"
                aria-controls="app"
              >
                <span class="ml-1">Lights & Lamps</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a
                class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                data-tab-target=""
                role="tab"
                aria-selected="false"
                aria-controls="message"
              >
                <span class="ml-1">Body Parts</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a
                class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                data-tab-target=""
                role="tab"
                aria-selected="false"
                aria-controls="settings"
              >
                <span class="ml-1">Spare Parts</span>
              </a>
            </li>
          </ul>
          <div data-tab-content="" class="p-5 text-white">
            <div class="block opacity-100" id="app" role="tabpanel">
             
              <object class="block leading-relaxed antialiased min-w-full min-h-screen" type="text/html" data="../NaveenCatalogue/Lamp And Lights/catalogue3.html"></object>
            </div>
            <div class="hidden opacity-0 text-white" id="message" role="tabpanel">
              <object class="block leading-relaxed antialiased min-w-full min-h-screen" type="text/html" data="../NaveenCatalogue/body parts/catalogueCopy.html"></object>
            </div>
            <div class="hidden opacity-0" id="settings" role="tabpanel">
              <object class="block leading-relaxed antialiased min-w-full min-h-screen" type="text/html" data="../NaveenCatalogue/spare parts/catalogue2.html"></object>
            </div>
          </div>
        </div>
      </div>

       </div>
       <script>
        const navLinks = document.querySelector('.nav-product')
        function onToggleMenu(e){
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[12%]')
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
    <!-- from node_modules -->
<script src="node_modules/@material-tailwind/html/scripts/tabs.js"></script>
 
<!-- from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
   </body>

</html>