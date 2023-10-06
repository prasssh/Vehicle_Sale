<?php
session_start();

// to check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // it gets submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $db_name = "car_sale";

    // to create a database connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // to check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM seller WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // to check if a row with the given username and password exists
    if (mysqli_num_rows($result) == 1) {
        // if login successful, store username in session
        $_SESSION["username"] = $username;
        header("Location: addcar.php"); // redirects to the addcar.php page
        exit();
    } else {
        // if login failed, display an error message
        echo "Login failed. Please check your username and password.";
    }
    mysqli_close($conn);
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
        
        <form id="register-form" action="login.php" name="register-form" method="post">
            <h1>Login</h1>
            Enter username:
            <input type="text" id="login-username" name="username"  placeholder="Username" required>
            Enter password:
            <input type="password" id="login-password" name=  "password" placeholder="Password" required>
            <button type="submit" id="login-button">Login</button>
            
            Don't have account?
            <a href="register.php">Register Here</a>
        </form>

      <script src="script.js"></script>
    </main>
</body>
</html>
  
