<?php
session_start();
include('../db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add or Edit User logic
    // Similar to registration
}

$users = $conn->query("SELECT * FROM users WHERE role='alumni'");

if ($users->num_rows > 0) {
    while ($user = $users->fetch_assoc()) {
        echo $user['username'];
        echo " <a href='edit_user.php?id=" . $user['id'] . "'>Edit</a>";
        echo " <a href='delete_user.php?id=" . $user['id'] . "'>Delete</a>";
        echo "<br>";
    }
}
?>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Add User</button>
</form>
<a href="dashboard.php">Back to Dashboard</a>
