<?php
session_start();
// $error_message = "";
if (isset($_POST["btnsubmit"])) 
{

    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == 'Admin' && $password == 123){
      header("Location: AdminPage.php");
      exit();
    }
    else{
     $_SESSION["error_message"] = 'Username or Password Incorrect!!!';
     
     echo 'Username and password incorrect'; 
     header("Location: AdminSI.php");
      exit();
      
    }
    //unset($_SESSION["error_message"]);
    
}
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
    <title>Log In</title>
   


</head>
<body class="font-[Poppins] bg-gradient-to-t from-[#081b46ec] to-[#111827] h-screen">
    <section id="LoginFormSec" class=" h-full">
        <div class="container h-full p-10">
          <div
            class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-500 dark:text-neutral-200">
            <div class="w-full">
              <div class="block rounded-lg shadow-lg dark:bg-slate-900">
                <div class="g-0 lg:flex lg:flex-wrap">
                  <div class="px-4 md:px-0 lg:w-6/12">
                    <div class="md:mx-6 md:p-12">
                      <div class="text-center">
                        <img class="mx-auto w-28" src="https://projectools.com/wp-content/uploads/2015/07/ProjecTools-Engineering-and-Commissioning-Icon-Reversed.png" alt="logo" />
                        <h4 class="mb-6 mt-1 pb-1 text-xl font-semibold text-white">M&N Motors</h4>
                      </div>
                      <div class="flex justify-center">
                        <h4 class="mb-6 underline pb-1 text-xl font-semibold text-slate-400">Admin</h4>
                      </div>
                      <form id="LoginForm" action="" method="post">
                      <??>
                        <p class="mb-4 text-white">Please login to your account</p>
                        <div class="relative mb-4" data-te-input-wrapper-init="">
                          <input type="text" class="[&amp;:not([data-te-input-placeholder-active])]:placeholder:opacity-0 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] 
                          leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none
                           dark:placeholder:text-neutral-200 text-gray-600 hover:text-gray-400" id="Username" name="username" placeholder="Username" data-te-input-state-active="" />
                          <label for="Input1" class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 " style="margin-left: 0px;">Username </label>
                          <div class="group pointer-events-none absolute left-0 top-0 flex h-full w-full max-w-full text-left" data-te-input-notch-ref="" data-te-input-state-active="">
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none left-0 top-0 box-border h-full w-2 rounded-l-[0.25rem] border border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-leading-ref="" style="width: 9px;"></div>
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full w-auto max-w-[calc(100%-1rem)] shrink-0 grow-0 basis-auto border border-l-0 border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-x-0 group-data-[te-input-state-active]:border-x-0 group-data-[te-input-focused]:border-t group-data-[te-input-state-active]:border-t group-data-[te-input-focused]:border-solid group-data-[te-input-state-active]:border-solid group-data-[te-input-focused]:border-t-transparent group-data-[te-input-state-active]:border-t-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-middle-ref="" style="width: 66.4px;"></div>
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full grow rounded-r-[0.25rem] border border-l-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-trailing-ref=""></div>
                          </div>
                        </div>
                        <div class="relative mb-4" data-te-input-wrapper-init="">
                          <input type="password" class="[&amp;:not([data-te-input-placeholder-active])]:placeholder:opacity-0 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 text-gray-700 hover:text-gray-400" id="Password" name="password" placeholder="Password" />
                          <label for="Input2" class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200" style="margin-left: 0px;">Password </label>
                          <div class="group pointer-events-none absolute left-0 top-0 flex h-full w-full max-w-full text-left" data-te-input-notch-ref="">
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none left-0 top-0 box-border h-full w-2 rounded-l-[0.25rem] border border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-leading-ref="" style="width: 9px;"></div>
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full w-auto max-w-[calc(100%-1rem)] shrink-0 grow-0 basis-auto border border-l-0 border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-x-0 group-data-[te-input-state-active]:border-x-0 group-data-[te-input-focused]:border-t group-data-[te-input-state-active]:border-t group-data-[te-input-focused]:border-solid group-data-[te-input-state-active]:border-solid group-data-[te-input-focused]:border-t-transparent group-data-[te-input-state-active]:border-t-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-middle-ref="" style="width: 64.8px;"></div>
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full grow rounded-r-[0.25rem] border border-l-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-trailing-ref=""></div>
                          </div>
                        </div>
                        <div class="mb-12 pb-1 pt-1 text-center">
                          <button
                            class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                            type="submit"
                            name="btnsubmit"
                            data-te-ripple-init=""
                            data-te-ripple-color="light"
                            style="
                            background: rgb(120,53,15);
                            background: radial-gradient(circle, rgba(120,53,15,0.876715652081145) 0%, rgba(34,55,102,0.9971638313528537) 100%);
                            "

                          >
                            Log in
                          </button>
                          <a href="#!" class="text-white">Forgot password?</a>
                        </div>
                        <div class="flex items-center justify-between pb-6">
                          <p class="mb-0 mr-2 text-white">Don't have an account?</p>
                          <button type="button" class="border-danger text-danger text-white hover:border-danger-600 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 active:border-danger-700 active:text-danger-700 inline-block rounded border-2 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out  hover:bg-opacity-10 focus:outline-none focus:ring-0 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" onclick="document.location='Sign In.html'" data-te-ripple-init="" data-te-ripple-color="light">Register</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none" style="background: rgb(120,53,15);
                  background: radial-gradient(circle, rgba(120,53,15,0.876715652081145) 0%, rgba(34,55,102,0.9971638313528537) 100%);
                  ">
                    <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                      <h4 class="mb-6 text-xl font-semibold">We are more than just a company</h4>
                      <p class="text-sm"> At M&N Motors, we understand the importance of using genuine spare parts to ensure optimal performance,
                        reliability, and safety. That's why we offer an extensive inventory of authentic parts sourced directly from
                        reputable manufacturers. Whether you need parts for regular maintenance, repairs, or upgrades, we've got you
                        covered.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script>
        import {
        Input,
        Ripple,
        initTE,
      } from "tw-elements";
      
      initTE({ Input, Ripple });
      </script>
      <?php
    // Display error message if it's set
    if (!empty($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
</body>
</html>