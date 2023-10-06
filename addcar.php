<?php
$servername = "localhost";  
$username = "root";  
$password = "";  
$database = "car_sale";

// creating a database connection
$conn = new mysqli($servername, $username, $password, $database);

// to check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST["make"];
    $model = $_POST["model"];
    $year = $_POST["year"];
    $mileage = $_POST["mileage"];
    $location = $_POST["location"];
    $price = $_POST["price"];

    // inserting data into the database
    $sql = "INSERT INTO `cars` (make, model, year, mileage, location, price) 
            VALUES ('$make', '$model', $year, $mileage, '$location', $price)";

    if ($conn->query($sql) === TRUE) {
        //  redirects to seller.php
        header("Location: search.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close(); // to close the database connection
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Car Sale</title>
    <link rel="stylesheet" href="style.css">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="nav container">
            <i class='bx bx-menu' id="menu-icon"></i>
            <img src="images/logo.png" class="logo"><h1>HomeOfCars</h1></img>
            <ul class="navbar">
            <li><a href="homepage.html">Home</a></li>              
                <li><a href="about.html">About Us</a></li>
                <li><a href="search.php"> Search Cars</a></li>
                <li><a href="addcar.php">Sell Car</a></li>
                <li><a href="register.php">Login/Register</a></li>
            </ul>
        </div>
    </header>
    <main>
        <form id="car-form" action ="addcar.php" method="post" name="car-form" >
                <h1>Fill Car Details</h1>
                <label for="make">Make:</label>
                <input type="text" id="make" name="make" required>
                
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required>
                
                <label for="year">Year:</label>
                <input type="number" id="year" name="year" required>
                
                <label for="mileage">Mileage:</label>
                <input type="number" id="mileage" name="mileage" required>
                
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
                
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
                
                <button type="submit">Add Car</button>
        </form>
        <script src="script.js"></script>
      </main>
  </body>
  </html>
