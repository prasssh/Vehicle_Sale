<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "car_sale";

// to create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// to check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = $_POST["model"];
    $location = $_POST["location"];

    //  SQL query to fetch cars based on model and location
    $sql = "SELECT * FROM cars WHERE make LIKE '%$model%' AND location LIKE '%$location%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Search Results</h1>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='car-item'>";
            echo "<div class='car-image'>";
            echo "</div>";
            echo "<div class='car-details'>";
            echo "<h2>" . $row["make"] . " " . $row["model"] . "</h2>";
            echo "<h4>";
            echo "Year: " . $row["year"] . "<br>";
            echo "Mileage: " . $row["mileage"] . " miles<br>";
            echo "Price: $" . $row["price"] . "<br>";
            echo "Location: " . $row["location"] . "<br>";
            echo "</h4>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No cars found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Car Sale</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
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
    
<!-- for available cars -->
    <div class="top container">
    <div class="form">
    <form method="post" action="search.php">
        <input type="text" name="model" placeholder="Enter Model">
        <input type="text" name="location" placeholder="Enter Location">
        <button type="submit">Search</button>
    </form>
</div>
<h1>Available Cars</h1>
</div>
    <section class="car" id="car">
      <div class="car-item">
          <div class="car-image">
              <img src="images/bmw.png" alt="" />
          </div>
          <div class="car-details">
              <h2>BMW 3 Series</h2>
              <h4>
                Year: 2021<br>Mileage: 15,000 miles 
                <br>Price: $30,000 <br> Location: Bennelong Point, NSW 2000 </h4>
          </div>
      </div>

      <div class="car-item">
          <div class="car-image">
              <img src="images/tesla.png" alt="" />
          </div>
          <div class="car-details">
              <h2>Tesla Model 3</h2>
              <h4>
                Year: 2022 <br> Mileage: 10,000 miles 
                <br>Price: $45,000<br> Location: Hurtsville, NSW 2072</h4>
          </div>
      </div>

      <div class="car-item">
          <div class="car-image">
              <img src="images/honda.png" alt="" />
          </div>
          <div class="car-details">
              <h2>Honda Civic</h2>
              <h4>
                Year: 2018<br> Mileage: 40,000 miles 
                <br>Price: $15,000<br> Location: Allawah, NSW 2200
              </h4>
          </div>
      </div>
   
      <div class="car-item">
        <div class="car-image">
            <img src="images/ford.jpg" alt="" />
        </div>
        <div class="car-details">
            <h2> Ford Escape</h2>
            <h4>
              Year: 2021<br> Mileage: 15,000 miles
               <br>Price: $22,000<br> Location: Punchbowl, NSW 2300
            </h4>
        </div>
      </div>
    </section>
  <script src="script.js"></script>
</body>
</html>