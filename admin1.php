<?php
session_start();

// Inbuilt login credentials
$admin_username = "admin";
$admin_password = "admin123";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin"] = $username;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - College Feedback System</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: rgb(49, 146, 46); /* Matching green */
      color: white;
      font-family: Arial, sans-serif;
      text-align: center;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    h2 {
      margin-bottom: 20px;
    }

    form {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    input[type="text"],
    input[type="password"] {
      padding: 10px;
      margin: 10px 0;
      width: 250px;
      border: none;
      border-radius: 5px;
    }

    input[type="submit"] {
      padding: 12px 24px;
      background-color: #3498db;
      border: none;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: #2980b9;
    }

    .error {
      color: #ffcccc;
      margin-top: 15px;
    }

    .button-link {
      margin-top: 20px;
      display: inline-block;
      padding: 12px 24px;
      font-size: 16px;
      text-decoration: none;
      background-color: #f39c12;
      color: white;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .button-link:hover {
      background-color: #e67e22;
    }
  </style>
</head>
<body>

  <h2>Admin Login</h2>

  <form method="post" action="">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" value="Login">
  </form>

  <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>

  <a class="button-link" href="admin3.html">Students Feedback</a>

</body>
</html>

