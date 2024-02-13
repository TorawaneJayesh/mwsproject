<?php
include 'connection.php'; // Include your database connection file

// Select data from database
$sql = "SELECT * FROM mwssignuptb";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Information - Display</title>
  <style>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #343a40;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-bottom: 20px;
    }
    h1 {
      margin: 0;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
    }
    th, td {
      border: 1px solid #dee2e6;
      padding: 12px;
      text-align: left;
    }
    th {
      background-color: #6c757d;
      color: #fff;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #e2e6ea;
    }
  </style>
  </style>
</head>
<body>

  <header>
    <h1>User Information</h1>
  </header>

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Pin Code</th>
        <th>Mobile Number</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["address"] . "</td>";
          echo "<td>" . $row["pincode"] . "</td>";
          echo "<td>" . $row["mobilenumber"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>0 results</td></tr>";
      }
      ?>
    </tbody>
  </table>

</body>
</html>

<?php
// Close connection
$conn->close();
?>