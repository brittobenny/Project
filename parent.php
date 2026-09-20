<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent Dashboard - VacciBook</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f1f6fb;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #007bff;
      padding: 15px 30px;
      color: white;
    }

    .logo {
      height: 60px;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .logout-btn {
      background-color: white;
      color: #007bff;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: 600;
    }

    .dashboard {
      display: flex;
      justify-content: center;
      gap: 30px;
      padding: 50px;
      flex-wrap: wrap;
    }

    .dash-box {
      background-color: white;
      width: 300px;
      height: 180px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      display: flex;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .dash-box:hover {
      transform: scale(1.05);
    }

    .box-image {
      width: 50%;
      background-size: cover;
      background-position: center;
    }

    .box-content {
      width: 50%;
      background-color: #f9f9f9;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      font-weight: 600;
      color: #007bff;
    }
  </style>
</head>
<body>
  <header>
    <img src="assets/logo/log1.png" alt="VacciBook Logo" class="logo">
    <div class="user-info">
      <span>Welcome, Parent</span>
      <button class="logout-btn">Logout</button>
    </div>
  </header>

  <div class="dashboard">
    <div class="dash-box" onclick="location.href='children.php'">
      <div class="box-image" style="background-image: url('C:/Users/BRITTO/Downloads/child.png');"></div>
      <div class="box-content">My Children</div>
    </div>

    <div class="dash-box" onclick="location.href='bookings.php'">
      <div class="box-image" style="background-image: url('C:/Users/BRITTO/Downloads/booking.png');"></div>
      <div class="box-content">View Bookings</div>
    </div>

    <div class="dash-box" onclick="location.href='schedule.php'">
      <div class="box-image" style="background-image: url('C:/Users/BRITTO/Downloads/schedule.png');"></div>
      <div class="box-content">Book Vaccination</div>
    </div>
  </div>
</body>
</html>
