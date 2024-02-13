<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup - Mineral Water Shop</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #3498db;
      color: #fff;
      padding: 1em;
      text-align: center;
      border-radius: 8px 8px 0 0;
      border: 0.5px solid #3498db;
      margin: 10px auto 0;
      width: 408px;
      height:40px;
    }

    form {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background-color: #3498db;
      border: 1px solid #3498db;
      border-radius: 0 0 8px 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 0;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    .btn{
      width:100px;
      margin-left:150px;
      border-radius:5px;
      background-color:green;
      color:white;
    }
    .btn:hover{
      background-color:orange;
      color:black;
    }
  </style>
</head>
<body>

  <header>
    <h1>Signup</h1>
  </header>
  <form action="#" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>

    <label for="pincode">Pin Code:</label>
    <input type="text" id="pincode" name="pincode" pattern="[0-9]{6}" required  placeholder="Enter 6 digit pincode">
   

    <label for="mobile">Mobile Number:</label>
    <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required  placeholder="Enter 10 digit mobile number">
    
    <input type="submit" value="SignUp" class="btn" name="register">
  </form>

  <p style="text-align: center;">Already have an account? <a href="MWSlogin.php"  target="_main">Login</a></p>

</body>
</html>

<?php
include 'connection.php';

if(isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $mobile = $_POST['mobile'];

    // Insert data into database
    $sql = "INSERT INTO mwssignuptb (email, password, name, address, pincode, mobilenumber) VALUES ('$email', '$password','$name','$address','$pincode','$mobile')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: MWSlogin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>