<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 300px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.info {
    margin-bottom: 20px;
}

.info p {
    margin: 5px 0;
}

.info p a {
    color: #007bff;
    text-decoration: none;
}

.info p a:hover {
    text-decoration: underline;
}

.error {
    color: #ff0000;
    font-weight: bold;
}
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include 'connection.php';

        // Check if user is logged in
        if(!isset($_SESSION['email'])) {
            echo "<p class='error'>You are not logged in.</p>";
            exit();
        }

        // Retrieve user information based on email
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM mwssignuptb WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display user information
            while($row = $result->fetch_assoc()) {
                echo "<h2>User Information</h2>";
                echo "<div class='info'>";
                echo "<p><strong>Name:</strong> " . $row['name'] . " <a href='edit.php?field=name'>Edit</a></p>";
                echo "<p><strong>Address:</strong> " . $row['address'] . " <a href='edit.php?field=address'>Edit</a></p>";
                echo "<p><strong>Pin Code:</strong> " . $row['pincode'] . " <a href='edit.php?field=pincode'>Edit</a></p>";
                echo "<p><strong>Mobile Number:</strong> " . $row['mobilenumber'] . " <a href='edit.php?field=mobilenumber'>Edit</a></p>";
                echo "</div>";
            }
        } else {
            echo "<p class='error'>No user information found.</p>";
        }
        ?>
    </div>
</body>
</html>