<?php
include 'config.php';
session_start();

$sql = "SELECT * FROM parts";
$result = mysqli_query($conn, $sql);

$parts = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $parts[] = $row;
    }
}


if (isset($_SESSION['uid'])) {
   $user_id = $_SESSION['uid'];
   if(isset($_POST['tocart'])) {
      if(isset($_POST['item_id']) && isset($_POST['quantity'])) {

         $part_id = $_POST['item_id'];
         $quantity = $_POST['quantity'];

         addToCart($user_id,$part_id, $quantity);
      } else {
         echo "Item ID or quantity not provided!";
      }
   }
} else {
   echo "User id not logged in!";
}

function addToCart($user_id, $part_id, $quantity) {
    // Execute the query using MySQLi
    include 'config.php';

     // Check if the part already exists in the cart for the user
    $check_query = "SELECT * FROM cart WHERE uid='$user_id' AND pid='$part_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
      // If the part exists, update the quantity
      $row = mysqli_fetch_assoc($check_result);
      $new_quantity = $row['qty'] + $quantity;
      $update_query = "UPDATE cart SET qty='$new_quantity' WHERE uid='$user_id' AND pid='$part_id'";
      $update_result = mysqli_query($conn, $update_query);
      if ($update_result) {
          echo "Quantity updated successfully.";
      } else {
          echo "Error updating quantity: " . mysqli_error($conn);
      }
  } else {
   // If the part doesn't exist, insert a new entry
   $insert_query = "INSERT INTO cart (uid, pid, qty) VALUES ('$user_id', '$part_id', '$quantity')";
   $insert_result = mysqli_query($conn, $insert_query);
//    if ($insert_result) {
//        $message = "Item added to cart successfully.";
//    } else {
//        $message = "Error adding item to cart: " . mysqli_error($conn);
//    }
//    header("Location: newC.php?message=" . urlencode($message));
//    exit;
  }
  header("Location: newC.php");
  exit;
    $conn->close();
}
?>
