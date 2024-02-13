<?php
session_start(); // Start session
include 'connection.php';

// Check if user is logged in
if(!isset($_SESSION['email'])) {
    echo "You are not logged in.";
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve edited information from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $mobilenumber = $_POST['mobilenumber'];

    // Update user information in the database
    $email = $_SESSION['email'];
    $sql = "UPDATE mwssignuptb SET name='$name', address='$address', pincode='$pincode', mobilenumber='$mobilenumber' WHERE email='$email'";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to user info page after successful update
        header("Location:index.php");
        exit();
    } else {
        echo "Error updating user information: " . $conn->error;
    }
}

// Retrieve user information based on email
$email = $_SESSION['email'];
$sql = "SELECT * FROM mwssignuptb WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Information</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
            <h2>Edit Information</h2>
            <form action="edit.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"><br>

                <label for="pincode">Pin Code:</label>
                <input type="text" id="pincode" name="pincode" value="<?php echo $row['pincode']; ?>"><br>

                <label for="mobilenumber">Mobile Number:</label>
                <input type="text" id="mobilenumber" name="mobilenumber" value="<?php echo $row['mobilenumber']; ?>"><br>

                <input type="submit" value="Update">
            </form>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "<p class='error'>No user information found.</p>";
}
?>