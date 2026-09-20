<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);


        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'parent') {
                header("Location: parent.php");
                exit();
            } elseif ($user['role'] == 'admin') {
                header("Location: admin_dashboard.php");
                exit();
            } elseif ($user['role'] == 'healthcentre') {
                header("Location: healthcentre_dashboard.php");
                exit();
            }
        } else {
            echo "<script>alert('Incorrect password'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email not found'); window.location='login.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VacciBook Login</title>
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
      background-color: rgba(0, 123, 255, 0.5);
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

    .login-box {
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

    .login-box h2 {
      margin-bottom: 20px;
    }

    .login-box input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .register-link {
      margin-top: 10px;
    }

    .register-link a {
      color: #007bff;
      text-decoration: none;
    }

    .bottom-text {
      position: absolute;
      bottom: 20px;
      width: 100%;
      text-align: center;
      font-family: 'Poppins', sans-serif;
      color: white;
      font-size: 1.5rem;
      z-index: 5;
      text-shadow: 1px 1px 5px #000;
      padding: 0 20px;
      opacity: 1;
      transition: opacity 1s ease-in-out;
    }

    .fade-out {
      opacity: 0;
    }
  </style>
</head>
<body>

  <!-- Logo -->       
  <img src="assets\logo\log1.png" alt="VacciBook Logo" class="top-logo">

  <!-- Background slideshow -->
  <div class="background-slider">
    <img src="assets\images\fam1.png" style="opacity: 1;">
    <img src="assets\images\fam2.png" style="opacity: 0;">
    <img src="assets\images\fam3.png" style="opacity: 0;">
    <div class="blue-overlay"></div>
  </div>

  <!-- Login box -->
  <div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="login.php">
      <input type="email" name="email" placeholder="Email" required >
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <div class="register-link">
      New user? <a href="register.php">Register now</a>
    </div>
  </div>

  <!-- Bottom fading text -->
  <div class="bottom-text" id="bottomText">
    Vaccines save lives. Stay protected.
  </div>

  <script>
    const images = document.querySelectorAll('.background-slider img');
    const messages = [
      "Vaccines save lives. Stay protected",
      "Protecting our children today ensures a healthier world tomorrow",
      "Healthy kids, happy families"
    ];
    const textBox = document.getElementById('bottomText');
    let index = 0;

    setInterval(() => {
      // Fade out text
      textBox.classList.add('fade-out');

      setTimeout(() => {
        // Switch image
        images.forEach((img, i) => {
          img.style.opacity = i === index ? '1' : '0';
        });

        // Change text
        textBox.textContent = messages[index];
        textBox.classList.remove('fade-out');

        index = (index + 1) % images.length;
      }, 1000); // Wait for fade-out before changing
    }, 4000);
  </script>
</body>
</html>
