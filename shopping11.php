<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo "<p class='error'>You are not logged in.</p>";
    header("Location: MWSlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping page</title>
  <style>
    /* Your CSS styles here */
  </style>
</head>
<body>
<h2>Pure Mountain Spring Water</h2>
<div class="imagediv">
    <img src="image6.jpg" alt="water image">
</div>
<div class="maindiv">
    <div class="pricediv">
        <p>Price: ₹<span id="totalPrice">70</span></p>
    </div>
    <div class="purchasediv">
        <div class="quantity">
            Quantity:
            <button class="minus">-</button>
            <input type="text" name="quantity" value="1" id="quantityInput" />
            <button class="plus">+</button>
        </div>
        <button id="purchaseBtn">Purchase</button>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var plusButton = document.querySelector('.plus');
    var minusButton = document.querySelector('.minus');
    var quantityInput = document.getElementById('quantityInput');
    var totalPriceElement = document.getElementById('totalPrice');
    var purchaseBtn = document.getElementById('purchaseBtn');

    plusButton.addEventListener('click', function() {
      var currentValue = parseInt(quantityInput.value);
      quantityInput.value = currentValue + 1;
      updatePrice();
    });

    minusButton.addEventListener('click', function() {
      var currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
        updatePrice();
      }
    });

    purchaseBtn.addEventListener('click', function() {
        // Get the product ID and quantity
        var productId = "your_product_id"; // Replace with your product ID
        var quantity = parseInt(quantityInput.value);
        
        // Submit form data
        var formData = new FormData();
        formData.append('product_id', productId);
        formData.append('quantity', quantity);
        
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert(xhr.responseText); // Show success message
                } else {
                    alert('Error: ' + xhr.responseText); // Show error message
                }
            }
        };
        xhr.open('POST', 'shopping1.php', true);
        xhr.send(formData);
    });

    function updatePrice() {
      var quantity = parseInt(quantityInput.value);
      var totalPrice = quantity * 70; // Each item costs ₹70
      totalPriceElement.innerText = totalPrice;
    }
  });
</script>
</body>
</html>