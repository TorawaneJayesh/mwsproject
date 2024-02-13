<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login- Mineral Water Shop</title>
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
      margin: 100px auto 0;
      width: 408px;
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
    <h1>Login</h1>
  </header>
  <form action="#" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Login" class="btn" name="submit">
  </form>

  <p style="text-align: center;">Don't have an account? <a href="MWSsignup.php" target="_main">Create Account</a></p>

</body>
</html>

<?php
include 'connection.php';
 if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if email and password match
  $sql = "SELECT * FROM mwssignuptb WHERE email='$email' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // Redirect to your web page upon successful login
      $_SESSION['email']=$email;
      header("Location: index.php");
      exit();
  } else {
      echo "Invalid email or password";
  }
}
?>