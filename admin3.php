<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$result = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");
?>

<h2>Feedback Received</h2>
<a href="logout.php">Logout</a>
<table border="1" cellpadding="5">
    <tr><th>Name</th><th>Email</th><th>Message</th><th>Time</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['message']) ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
    <?php endwhile; ?>
    <!-- nav.php -->
<a href="feedback.html">Feedback Form</a> |
<a href="login.html">Admin Login</a>
</table>
