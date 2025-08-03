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

