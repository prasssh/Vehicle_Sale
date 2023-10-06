<?php
//to check connection
$conn = mysqli_connect('localhost','root','','car_sale') or die('connection failed');

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `seller` WHERE username = '$username' AND password = '$password'") or die('query failed');

   //check data if it already exists\
   if(mysqli_num_rows($select_users) > 0){
    $message[] = 'user already exist!';
 }else
 {
  //insert data into database
  if (mysqli_query($conn, "INSERT INTO `seller` ( name, address, phoneNumber, email, username, password) VALUES ('$name', '$address', '$phoneNumber', '$email', '$username', '$password')")) {
    $message[] = 'registered successfully!';
    header('location: login.php');
} else {
    $message[] = 'query failed: ' . mysqli_error($conn);
}

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
    <section id="register-form" action="register.php" method="post">
      <h1>Seller Registration</h1>
      <p> Fill this form to create an account or <a href="login.php">LOGIN</a></p>

      <form action="register.php" method="post" name="registrationForm">
      <input type="text" placeholder="Enter your name" id="name" name="name" required>
      <input type="text" placeholder="Enter your address" id="address" name="address" required>
      <input type="tel" placeholder="Enter phone number" id="phoneNumber" name="phoneNumber" required>
      <input type="email" placeholder="Enter email address" id="email" name="email" required>
      <input type="text" placeholder="Enter username" id="username" name="username" required>
      <input type="password" placeholder="Enter password" id="password" name="password" required>

      <button type="submit" name="submit">Submit</button>


     
    </form>
    </section>
    <script src="script.js"></script>
  </main>
</body>
</html>


