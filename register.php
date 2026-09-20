<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Email already registered'); window.location='register.php';</script>";
    } else {
        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'parent')";
        if (mysqli_query($conn, $sql)) {
            header("Location: register.php?success=1");
            exit();
        } else {
            echo "<script>alert('Registration failed'); window.location='register.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>VacciBook Registration</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body, html {
      height: 100%;
      width: 100%;
      overflow: hidden;
    }
    .background-slider {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -2;
    }
    .background-slider img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: opacity 1s ease-in-out;
      z-index: 1;
    }
    .blue-overlay {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: rgba(0, 123, 255, 0.6);
      z-index: 2;
    }
    .top-logo {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 350px;
      height: auto;
      z-index: 10;
    }
    .form-box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      max-width: 350px;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      z-index: 5;
      text-align: center;
    }
    .form-box h2 {
      margin-bottom: 20px;
    }
    .form-box input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .form-box button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .login-link {
      margin-top: 10px;
    }
    .login-link a {
      color: #007bff;
      text-decoration: none;
    }
    .message {
      color: green;
      font-weight: 600;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <img src="assets/logo/log1.png" alt="VacciBook Logo" class="top-logo">

  <div class="background-slider">
    <img src="assets/images/fam1.png" style="opacity: 1;">
    <img src="assets/images/fam2.png" style="opacity: 0;">
    <img src="assets/images/fam3.png" style="opacity: 0;">
    <div class="blue-overlay"></div>
  </div>

  <div class="form-box">
    <h2>Register</h2>
   <form method="POST" action="" autocomplete="off">
    <input type="text" name="name" placeholder="Full Name" required autocomplete="off">
    <input type="email" name="email" placeholder="Email" required autocomplete="off">
    <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
     <button type="submit">Register</button>
    </form>

    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
      echo '<div class="message">Registered successfully! <a href="login.php">Login now</a></div>';
    }
    ?>
  </div>

  <script>
    const images = document.querySelectorAll('.background-slider img');
    let index = 0;
    setInterval(() => {
      images.forEach((img, i) => {
        img.style.opacity = i === index ? '1' : '0';
      });
      index = (index + 1) % images.length;
    }, 4000);
  </script>
</body>
</html>
