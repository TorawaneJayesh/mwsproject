<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo "<p class='error'>You are not logged in.</p>";
    header("Location: MWSlogin.php");
    exit();
}

// Retrieve user information from mwssignuptb based on email
$userEmail = $_SESSION['email'];
$sql_user_info = "SELECT name, address, pincode, mobilenumber FROM mwssignuptb WHERE email = '$userEmail'";
$result_user_info = $conn->query($sql_user_info);

if ($result_user_info->num_rows > 0) {
    $row = $result_user_info->fetch_assoc();
    $userName = $row['name'];
    $userAddress = $row['address'];
    $userPincode = $row['pincode'];
    $userMobileNumber = $row['mobilenumber'];
} else {
    echo "User information not found";
    exit(); // Terminate script if user information is not found
}

// Retrieve product information from the form
$productName = "Pure Sasta Aqua Water";
$productQuantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1; // Default to 1 if quantity is not provided
$productID = $_POST['product_id']; // Assuming product ID is submitted via form

// Calculate total price
$productPrice = 20; // ₹70 per item
$totalPrice = $productPrice * $productQuantity;

// Get the current date and time
date_default_timezone_set('Asia/Kolkata');
$purchaseDate = date("Y-m-d h:i:s A");

// Insert data into the mwsprequest database
$sql_insert = "INSERT INTO mwsprequest (id, product_name, price, quantity, email, name, address, pincode, mobilenumber, purchase_date) 
               VALUES ('$productID', '$productName', '$totalPrice', '$productQuantity', '$userEmail', '$userName', '$userAddress', '$userPincode', '$userMobileNumber', '$purchaseDate')";

if ($conn->query($sql_insert) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

$conn->close();
?>