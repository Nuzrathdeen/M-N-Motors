<?php
include 'config.php';
session_start();

$sql = "SELECT uoid, date, amount, order_details FROM uorder";
$result = mysqli_query($conn, $sql);

$uorders = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $uorders[] = $row;
    }
}
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
   <title>Orders</title>
</head>
<body class="bg-gray-950">
   <div class=" bg-gray-950 h-fit md:h-screen ">

      <div class="flex justify-center pt-36">
        <span class="text-white text-4xl hover:text-amber-600">Orders to be Confirmed</span>
      </div>
   <!-- component -->
<div class="flex min-h-screen items-center justify-center">
  <div class="overflow-x-auto">

    <table class="min-w-full bg-white shadow-md rounded-xl ">
      <thead>
        <tr class="bg-blue-gray-100 text-gray-700">
          <th class="py-3 px-4 text-left">ID</th>
          <th class="py-3 px-4 text-left">Date & Time</th>
          <th class="py-3 px-4 text-left">Amount</th>
          <th class="py-3 px-4 text-left">Order Details</th>
          <th class="py-3 px-4 text-left">Action</th>
        </tr>
      </thead>
      <tbody class="text-blue-gray-900">
      <?php foreach ($uorders as $order): ?>
        <tr class="border-b border-blue-gray-200">
          <td class="py-3 px-4"><?php echo $order['uoid']; ?></td>
          <td class="py-3 px-4"><?php echo $order['date']; ?></td>
          <td class="py-3 px-4"><?php echo $order['amount']; ?></td>
          <td class="py-3 px-4">
            <ul>
             <?php 
              $orderItems = explode(", ", $order['order_details']);
              foreach ($orderItems as $item) {
                echo "<li class=\"font-semibold\" >$item</li>";
              }
             ?>
            </ul>
          </td>
          <td class="py-3 px-4">
            <a href="" class="font-medium text-blue-600 hover:text-blue-800">Confirm</a>
          </td>
        </tr>
      <?php endforeach; ?>
        <tr class="border-b border-blue-gray-200">
          <td class="py-3 px-4 font-medium">Total Wallet Value</td>
          <td class="py-3 px-4"></td>
          <td class="py-3 px-4"></td>
          <td class="py-3 px-4 font-medium">$22525.00</td>
          <td class="py-3 px-4"></td>
        </tr>
      </tbody>
    </table>
    <div class="w-full pt-5 px-4 mb-8 mx-auto ">
      <div class="text-sm text-gray-400 py-1 text-center">
          Made with <a class="text-gray-400 font-semibold" href="Welcome.php" target="_blank">M&N Motors</a> by <a href="" target="_blank"> Developer Team</a>.
      </div>
    </div>
  </div>
</div>

  </div>
</body>
</html>