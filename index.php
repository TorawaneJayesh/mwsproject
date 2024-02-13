<?php
  session_start();
  include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mineral Water Shop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    .navbar {
      background-color: #061f1f;
      height: 30px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav ul {
      list-style-type: none;
      display: flex;
    }
    nav ul li {
      margin-right: 10%;
    }
    nav a {
      text-decoration: none;
      color: white;
      transition: color 0.3s;
    }
    nav a:hover {
      color: #3498db;
    }
    header {
      background-color: #3498db;
      color: #fff;
      padding: 1em;
      text-align: center;
    }
    .maindiv {
      background-color: #f2f6f0;
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
      padding: 20px;
    }
    .div1{
      height: 230px;
      width: 40%;
      background-color: crimson;
      margin: 15px;
      padding: 20px;
      background-image: url('image1.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      border:2px solid black;
      border-radius:8px;
    }

    .div2{
      height: 230px;
      width: 40%;
      background-color: crimson;
      margin: 15px;
      padding: 20px;
      background-image: url('image0.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      border:2px solid black;
      border-radius:8px;
    }

    .front1 {
      background-color: rgb(255, 189, 122);
      color: rgb(26, 25, 25);
      text-align: center;
      padding: 1em;
      margin-top: 20px;
    }
    .front1 a {
      background-color: rgb(255, 189, 122);
      color: rgb(26, 25, 25);
      text-align: center;
      padding: 1em;
      margin-top: 20px;
    }
    .sectionmaindiv {
      background-color: #e3f4ff;
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
      padding: 20px;
    }
    .secdiv1, .secdiv2, .secdiv3, .secdiv4, .secdiv5, .secdiv6 {
      height: 380px;
      background-color: #ff3030;
      width: 22%;
      margin: 20px;
      border: 0.3px solid black;
      font-size: small;
      text-align: center;
    }
    .secdiv1 img, .secdiv2 img, .secdiv3 img, .secdiv4 img, .secdiv5 img, .secdiv6 img {
      height: 280px;
      width: 100%;
    }
    .highlight {
      background-color: gold;
    }
    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 1em;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    button{
      height:40px;
      width:70px;
      border-radius:8px;
    }
    button:hover{
      height:40px;
      width:70px;
      background-color: yellow;
    }
  </style>
</head>
<body class="bodysize">
  <nav class="navbar">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">ContactUs</a></li>
      <li>
      <?php
      include 'connection.php';
      if(isset($_SESSION['email'])) {
        $email =$_SESSION['email'];
        echo $email;
    }else{
      echo"<p><a href='MWSlogin.php'>Login</a></p>";
    }
      ?></li>
      <li><a href="mwsuserinfo.php"><i class="fa-solid fa-user"></i></a></li>
      <li><a href="Logout.php" style="color:red;">Logout</a></li>
    </ul>
  </nav>
  <header>
    <h1>Mineral Water Service</h1>
  </header>
  <div class="maindiv">
    <div class="div1"></div>
    <div class="div2"></div>
  </div>
  <div class="front1">
    <pre>in our online water service you find pure mineral water at your home with just one click so hurry up order and use our mineral water with free home delivery service.
    <br><br><b class="highlight">order water for function <a href="#" style="text-decoration:none;">contact us.</a></b></pre>
  </div>
  <section>
    <div class="sectionmaindiv">
      <div class="secdiv1"> 
        <h2>Pure Mountain Spring Water</h2>
        <img src="image6.jpg" alt="Mineral Water 2">
        <p>purchase 25 liter mineral water pack</p>
        <a href="shopping11.php";><button>₹70</button></a>
      </div>
      <div class="secdiv2">
        <h2>Refreshing Mineral Water</h2>
        <img src="image7.jpg" alt="Mineral Water 1">
        <p>10 liter mineral water pack\3 jar </p>
        <a href="shopping12.php";><button>₹50</button></a>
      </div>
      <div class="secdiv3">
        <h2>Pure Sasta Aqua Water</h2>
        <img src="image8.jpg" alt="Mineral Water 1">
        <p>10 liter mineral water pack </p>
        <a href="shopping13.php";><button>₹20</button></a>
      </div>
      <div class="secdiv4">
        <h2>Fresh 1 & 1.5 L Bislery</h2>
        <img src="image9.jpg" alt="Mineral Water 1">
        <p>purchase both 2 L bislery</p>
        <a href="shopping14.php";><button>₹30</button></a>
      </div>

      <div class="secdiv5">
        <h2>Fresh 20L Bislery</h2>
        <img src="image10.jpg" alt="Mineral Water 1">
        <p>20L big bislery</p>
        <a href="shopping15.php";><button>₹30</button></a>
      </div>

      <div class="secdiv6">
        <h2>Fresh Aava pure water</h2>
        <img src="image11.jpg" alt="Mineral Water 1">
        <p>purchase 500ML X 24 Pack</p>
        <a href="shopping16.php";><button >₹230</button></a>
      </div>
    </div>
  </section>
  <footer>
    <p>&copy; 2024 Mineral Water Service. All rights reserved.</p>
  </footer>
</body>
</html>