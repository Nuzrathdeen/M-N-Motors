<?php
 @include 'config.php';
if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  //if the user type is to be selected 
  //$user_type = md5($_POST['user_type']);

  $select = "SELECT * FROM  users WHERE email = '$email' && password = '$password'";

  $result = mysqli_query($conn, $select);
  
  if(mysqli_num_rows($result) > 0){
    $error[] = 'User already exist!';
  }else{

  }if($password != $cpassword){
    $error[] = 'Password not matched!';
  }else{
    $insert = "INSERT INTO users(name, password, email) VALUES('$name', '$password', '$email')";
    mysqli_query($conn, $insert);
    $error[] = 'User Registered';
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
    <title>Sign In</title>

</head>
<body class="font-[Poppins] bg-gradient-to-t from-[#081b46ec] to-[#111827] h-fit lg:h-screen">
    <section class=" h-full">
        <div class="container h-full p-10">
          <div class="g-6 flex h-full flex-wrap items-center justify-center  text-neutral-500 dark:text-neutral-200">
            <div class="w-full ">
              <div class="block rounded-lg shadow-lg dark:bg-slate-900">
                <div class="g-0 lg:flex lg:flex-wrap">
                  <div class="px-4 md:px-0 lg:w-6/12">
                    <div class="md:mx-6 md:p-12">
                      <div class="text-center">
                        <img class="mx-auto w-28" src="https://projectools.com/wp-content/uploads/2015/07/ProjecTools-Engineering-and-Commissioning-Icon-Reversed.png" alt="logo" />
                        <h4 class="mb-4 mt-1 pb-0 text-xl font-semibold text-white">M&N Motors</h4>
                      </div>
                      <form id="SignInForm" action="" method="post">
                        <?php
                        if(isset($error)){
                          foreach($error as $error){
                            echo '<div><span class="error-msg flex justify-center mb-2 p-1 bg-slate-700 border-4 rounded-lg">'.$error.'</span></div>';
                          };
                        };
                        ?>
                        <p class="mb-4 text-white">Please create an account</p>
                        <div class="relative mb-4" data-te-input-wrapper-init="">
                          <input type="text" name="username" class="[&amp;:not([data-te-input-placeholder-active])]:placeholder:opacity-0 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 text-gray-600 hover:text-gray-400" id="Username" placeholder="Username" data-te-input-state-active="" />
                          <label for="Input1" class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 " style="margin-left: 0px;">Username </label>
                          <div class="group pointer-events-none absolute left-0 top-0 flex h-full w-full max-w-full text-left" data-te-input-notch-ref="" data-te-input-state-active="">
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none left-0 top-0 box-border h-full w-2 rounded-l-[0.25rem] border border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-leading-ref="" style="width: 9px;"></div>
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full w-auto max-w-[calc(100%-1rem)] shrink-0 grow-0 basis-auto border border-l-0 border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-x-0 group-data-[te-input-state-active]:border-x-0 group-data-[te-input-focused]:border-t group-data-[te-input-state-active]:border-t group-data-[te-input-focused]:border-solid group-data-[te-input-state-active]:border-solid group-data-[te-input-focused]:border-t-transparent group-data-[te-input-state-active]:border-t-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-middle-ref="" style="width: 66.4px;"></div>
                            <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full grow rounded-r-[0.25rem] border border-l-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-trailing-ref=""></div>
                          </div>
                        </div>
                        <div class="relative mb-4" data-te-input-wrapper-init="">
                            <input type="text" name="email" class="[&amp;:not([data-te-input-placeholder-active])]:placeholder:opacity-0 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 text-gray-600 hover:text-gray-400" id="Email" placeholder="Email" data-te-input-state-active="" />
                            <label for="Input2" class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 " style="margin-left: 0px;">Email Address </label>
                            <div class="group pointer-events-none absolute left-0 top-0 flex h-full w-full max-w-full text-left" data-te-input-notch-ref="" data-te-input-state-active="">
                              <div class="group-data-[te-input-focused]:border-primary pointer-events-none left-0 top-0 box-border h-full w-2 rounded-l-[0.25rem] border border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-leading-ref="" style="width: 9px;"></div>
                              <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full w-auto max-w-[calc(100%-1rem)] shrink-0 grow-0 basis-auto border border-l-0 border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-x-0 group-data-[te-input-state-active]:border-x-0 group-data-[te-input-focused]:border-t group-data-[te-input-state-active]:border-t group-data-[te-input-focused]:border-solid group-data-[te-input-state-active]:border-solid group-data-[te-input-focused]:border-t-transparent group-data-[te-input-state-active]:border-t-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-middle-ref="" style="width: 66.4px;"></div>
                              <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full grow rounded-r-[0.25rem] border border-l-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-trailing-ref=""></div>
                            </div>
                        </div>
                        <!-- Copy -->
                        <div class="relative mb-4" data-te-input-wrapper-init="">
                           <input type="password" name="password" class="[&amp;:not([data-te-input-placeholder-active])]:placeholder:opacity-0 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 text-gray-600 hover:text-gray-400" id="Password" placeholder="Password" data-te-input-state-active="" />
                           <label for="Input3" class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 " style="margin-left: 0px;">Password </label>
                           <div class="group pointer-events-none absolute left-0 top-0 flex h-full w-full max-w-full text-left" data-te-input-notch-ref="" data-te-input-state-active="">
                             <div class="group-data-[te-input-focused]:border-primary pointer-events-none left-0 top-0 box-border h-full w-2 rounded-l-[0.25rem] border border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-leading-ref="" style="width: 9px;"></div>
                             <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full w-auto max-w-[calc(100%-1rem)] shrink-0 grow-0 basis-auto border border-l-0 border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-x-0 group-data-[te-input-state-active]:border-x-0 group-data-[te-input-focused]:border-t group-data-[te-input-state-active]:border-t group-data-[te-input-focused]:border-solid group-data-[te-input-state-active]:border-solid group-data-[te-input-focused]:border-t-transparent group-data-[te-input-state-active]:border-t-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-middle-ref="" style="width: 66.4px;"></div>
                             <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full grow rounded-r-[0.25rem] border border-l-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-trailing-ref=""></div>
                           </div>
                         </div>
                         <!-- Password Confirmation -->
                         <div class="relative mb-4" data-te-input-wrapper-init="">
                           <input type="password" name="cpassword" class="[&amp;:not([data-te-input-placeholder-active])]:placeholder:opacity-0 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 text-gray-600 hover:text-gray-400" id="CPassword" placeholder="Confirm Password" data-te-input-state-active="" />
                           <label for="Input4" class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 " style="margin-left: 0px;">Confirm Password </label>
                           <div class="group pointer-events-none absolute left-0 top-0 flex h-full w-full max-w-full text-left" data-te-input-notch-ref="" data-te-input-state-active="">
                             <div class="group-data-[te-input-focused]:border-primary pointer-events-none left-0 top-0 box-border h-full w-2 rounded-l-[0.25rem] border border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-leading-ref="" style="width: 9px;"></div>
                             <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full w-auto max-w-[calc(100%-1rem)] shrink-0 grow-0 basis-auto border border-l-0 border-r-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-x-0 group-data-[te-input-state-active]:border-x-0 group-data-[te-input-focused]:border-t group-data-[te-input-state-active]:border-t group-data-[te-input-focused]:border-solid group-data-[te-input-state-active]:border-solid group-data-[te-input-focused]:border-t-transparent group-data-[te-input-state-active]:border-t-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-middle-ref="" style="width: 66.4px;"></div>
                             <div class="group-data-[te-input-focused]:border-primary pointer-events-none box-border h-full grow rounded-r-[0.25rem] border border-l-0 border-solid border-neutral-300 bg-transparent transition-all duration-200 ease-linear group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] motion-reduce:transition-none dark:border-neutral-600" data-te-input-notch-trailing-ref=""></div>
                           </div>
                         </div>
                        <!-- End Copy -->
                       
                        
                        <div class="mb-12 pb-1 pt-1 text-center">
                          <button
                            id="SIbutton"
                            class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                            type="submit"
                            name="submit"
                            data-te-ripple-init=""
                            data-te-ripple-color="light"
                            style="
                            background: rgb(120,53,15);
                            background: radial-gradient(circle, rgba(120,53,15,0.876715652081145) 0%, rgba(34,55,102,0.9971638313528537) 100%);
                            "
                          >
                            Sign Up
                          </button>
                        </div>
                        <div class="flex items-center justify-between pb-6">
                          <p class="mb-0 mr-2 text-white">Already have an account?</p>
                          <button type="button" class="border-danger text-danger text-white hover:border-danger-600 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 active:border-danger-700 active:text-danger-700 inline-block rounded border-2 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out  hover:bg-opacity-10 focus:outline-none focus:ring-0 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init="" data-te-ripple-color="light"
                          ><a href="Log In.php">Log In</a></button>
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

</body>
</html>