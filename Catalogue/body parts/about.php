<?php
include 'config.php';
session_start();

$sql = "SELECT parts.name, parts.price, parts.image, cart.qty, cart.cid, cart.pid FROM parts, cart WHERE cart.pid = parts.pid";
$result = mysqli_query($conn, $sql);

$carts = [];
$subtotal = 0;
$total = 0;
$shipping_tax = 65;
$order_details = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $carts[] = $row;

         // Concatenate details of each item into the order_details string
         $order_details .= "Item Name: {$row['name']}, Price: {$row['price']}, Quantity: {$row['qty']}; ";

        //calculate the subtotal
        $subtotal += $row['price'] *  $row['qty'];
    }
    $total = $subtotal + $shipping_tax;
}

if(isset($_SESSION['uid'])) {
    // User ID is saved in the session, retrieve it
    $user_id = $_SESSION['uid'];
}

if(isset($_POST['removeFromCart'])){
    $item_id = $_POST['item_id'];

    $delete_query = "DELETE FROM cart WHERE pid='$item_id'";
    $delete_result = mysqli_query($conn, $delete_query);
}

if(isset($_POST['checkout'])){
    //$parts_id = $_POST['part_id'];
    $insert_query = "INSERT INTO uorder (amount, uid, order_details) VALUES ('$total', '$user_id', '$order_details' )";
    $insert_result = mysqli_query($conn, $insert_query);

    // Clear the cart after checkout
    $clear_cart_query = "DELETE FROM cart";
    $clear_cart_result = mysqli_query($conn, $clear_cart_query);

    header("Location: checkout_confirm.php");
    exit(); 
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css ">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- <script src="/DeenCart/Cart.js" async></script> -->
	<style>
		.nav-links {
        z-index: 50;
      }
      .sec1{
        z-index: 40;
      }
      .sec2{
        z-index: 30;
      }
      .sec3{
        z-index: 20;
      }
    
	</style>
</head>	
<body class="bg-gray-950">
	<header class="bg-gray-900">
		<nav class="flex justify-between items-center w-[92%]  mx-auto p-3 z-20 ">
			<div>
				<span class="text-2xl font-[Poppins] text-amber-900 cursor-pointer hover:text-white">
					<img class="h-10 w-10 inline rounded-full" src="bike2.jpeg" alt="bikeicon">M&N Motors</span>
			</div>
			<div
				class="nav-links duration-500 md:static absolute bg-gray-900 md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5 ">
				<ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 bg-gray-900 text-slate-200 transition-all ease-in duration-700">
					<li>
						<a class="hover:text-gray-500" href="#">Products</a>
					</li>
					<li>
						<a class="hover:text-gray-500" href="#">Service</a>
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
					<div>
						<button class="bg-gray-700 text-white px-5 py-2 rounded-full hover:bg-gray-500">Get Started</button>
					</div> 
				</ul>
				
			</div>
			<div class="flex items-center gap-5 pb-4">
				<!-- <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden " color='#f7f7f7'></ion-icon> -->
				<box-icon name='menu' color='#f6f7f8' onclick='onToggleMenu(this)' class='text-3xl  cursor-pointer md:hidden '></box-icon>
			</div>
		</nav>
	</header>
	<div class="Up lg:mb-8 sec1">
		
		<img src="images\bike.jpg" alt="pic" class="image-container">
		<div class="block">
			<div class="centered w-44 h-fit lg:w-56 lg:h-56 relative sm:absolute ml-5" style="background: rgb(45, 44, 43);
      background: radial-gradient(circle, rgba(45, 44, 43, 0.952) 40%, rgb(28, 46, 85) 100%);
       color:white; padding: 20px;border-radius: 10px;" font-family="Impact"><h1 class=" lg:p-2 text-base lg:text-2xl ">We are providing you the best Spare Parts you could ever find</h1></div>
		  </div>
			
		</div>
	</div>

  <div class="w-full h-full bg-gray-900 left-0 ">
  <div class="cart text-gray-300">
			<div class="cart-total"></div>
		</div>
    <div class="w-full lg:w-full absolute z-10 right-0 h-full md:mt-7 sm:mt-10" id="checkout">
        <div class="flex items-end lg:flex-row flex-col justify-end md:transform md:-translate-x-44 ease-in-out duration-500 lg:duration-1000" id="cart">
            <div class="lg:w-1/2 md:w-8/12 w-full lg:px-8 lg:py-14 md:px-6 px-4 md:py-8 py-4 bg-gray-800 overflow-y-hidden overflow-x-hidden lg:h-screen h-auto"">
              <p class="lg:text-4xl text-3xl font-bold leading-10 text-white pt-3 lg:mb-4 px-4">Your Cart</p>
              <div class="box">
				<div class=" border-t border-gray-50 space-y-4 py-8 md:py-10 lg:py-8 text-white">
                <?php foreach ($carts as $cart): ?>

				<div class="pro">
				<div class="product">
					<img src="<?php echo $cart['image']; ?>" alt="part image" class="product-img">
					<div class="product-info">
						<h3 class="product-name text-2xl lg:text-xl leading-none text-white"><?php echo $cart['name']; ?></h3>
						<h2 class="product-price text-base font-black leading-none text-gray-800 dark:text-amber-500">$ <?php echo $cart['price']; ?></h2></h2>
                        <!-- <p class="text-base leading-3 text-gray-600 dark:text-white py-4">Color: Silver</p> -->
						<h2 class="product-offer">25%</h2>
						<p class="product-quantity text-gray-500 rounded-lg"> Qnt:<input value="<?php echo $cart['qty']; ?>" name="">
						<form action="" method="POST">	
                        <p class="product-remove bg-amber-600 hover:bg-amber-700">
								<i class="fa fa-trash" aria-hidden="true"></i>
                                <input type="hidden" name="part_id" value="<?php echo $cart['pid']; ?>">
                                <input type="hidden" name="item_id" value="<?php echo $cart['cid']; ?>">
                                <button type="submit" name="removeFromCart" class=" text-white px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-amber-400">Remove</button>
						</p>
                        </form>

					</div>
				</div>
				</div>
                <?php endforeach; ?>
                </div>
			</div>
               <div class="btn-row md:flex items-strech  border-t border-gray-50">
                
                <!-- <div class="cart-items">
                    <div class="cart-rows">
                    <div class="md:w-4/12 2xl:w-1/4 w-full ">
                        <img src="images/carborator.jpeg" alt="Carborator" class="h-full object-center object-cover md:block hidden" />
                        <img src="images/carborator.jpeg" alt="Carborator" class="md:hidden sm:p-36 w-full h-full object-center object-cover" />
                    </div>
                    <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center ">
                        <div class="flex items-center justify-between w-full pt-1 font[poppins]">
                            <p class="text-2xl lg:text-xl leading-none text-white">Carborator</p>
                            <select aria-label="Select quantity" class="cart-quantity py-2 rounded-lg mt-3 px-1 border border-gray-200 mr-6 focus:outline-none bg-gray-800 hover:bg-gray-700 text-white">
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                            </select>
                        </div>
                        <p class="text-base leading-3 text-gray-600 dark:text-white pt-2">Height: 10 inches</p>
                        <p class="text-base leading-3 text-gray-600 dark:text-white py-4">Color: Silver</p>
                        <div class="flex items-center justify-between pt-5">
                            <div class="flex itemms-center">
                                <p class="text-xs leading-3 underline text-gray-800 dark:text-white cursor-pointer">Add to favorites</p>
                                <p class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer removeButton">Remove</p>
                            </div>
                            <p class="text-base font-black leading-none text-gray-800 dark:text-white cart-price">$9,000</p>
                        </div>
                    </div>
                    </div>
                    <div class="emptyCartMessage flex">
                        <P class="text-gray-300 text-2xl hidden">Your Cart is empty!</P>
                    </div>
                </div> -->
                </div>
                
            </div>
            <div class="lg:w-96 md:w-8/12 w-full bg-gray-100 dark:bg-gray-900 h-full">
                <div class="flex flex-col lg:h-screen h-auto lg:px-8 md:px-7 px-4 lg:py-20 md:py-10 py-6 justify-between overflow-y-auto">
                    <div>
                        <p class="lg:text-4xl text-3xl font-black leading-9 text-gray-800 dark:text-white">Summary</p>
                        <div class="flex items-center justify-between pt-16">
                            <p class="text-base leading-none text-gray-800 dark:text-white">Subtotal</p>
                            <p class="text-base leading-none text-gray-800 dark:text-white ">$ <?php  echo number_format($subtotal, 2);?></p>
                        </div>
                        <div class="flex items-center justify-between pt-5">
                            <p class="text-base leading-none text-gray-800 dark:text-white">Shipping</p>
                            <p class="text-base leading-none text-gray-800 dark:text-white">$30</p>
                        </div>
                        <div class="flex items-center justify-between pt-5">
                            <p class="text-base leading-none text-gray-800 dark:text-white">Tax</p>
                            <p class="text-base leading-none text-gray-800 dark:text-white">$35</p>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center pb-6 justify-between lg:pt-5 pt-20">
                            <p class="text-2xl leading-normal text-gray-800 dark:text-white">Total</p>
                            <p class="cart-total text-2xl font-bold leading-normal text-right text-gray-800 dark:text-white" id="addToCart">$ <?php  echo number_format($total, 2);?></p>
                        </div>
                        <form action="" method = "POST">
                        <button  type="submit" class="text-base leading-none w-full py-5 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white dark:hover:bg-gray-700" name="checkout">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>


	
</div> 

<!-- Menu Icon -->
<script>
    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e){
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-[7%]')
    }
</script>
</body>
</html>