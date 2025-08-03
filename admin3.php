<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$result = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback Dashboard</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: rgb(49, 146, 46);
      color: white;
      font-family: Arial, sans-serif;
      text-align: center;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
    }

    h2 {
      margin-bottom: 20px;
    }

    table {
      border-collapse: collapse;
      width: 90%;
      max-width: 1000px;
      background-color: white;
      color: black;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #3498db;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    a.button-link {
      display: inline-block;
      margin: 20px 10px 0 10px;
      padding: 12px 24px;
      font-size: 16px;
      text-decoration: none;
      background-color: #f39c12;
      color: white;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    a.button-link:hover {
      background-color: #e67e22;
    }

    .top-bar {
      width: 100%;
      max-width: 1000px;
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <h2>Feedback Received</h2>

  <div class="top-bar">
    <a class="button-link" href="feedback.html">Feedback Form</a>
    <a class="button-link" href="login.html">Admin Login</a>
    <a class="button-link" href="logout.php">Logout</a>
  </div>

  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
      <th>Time</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td><?= htmlspecialchars($row['created_at']) ?></td>
      </tr>
    <?php endwhile; ?>
  </table>

</body>
</html>

