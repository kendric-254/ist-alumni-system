<?php
session_start();
include('../db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

$users = $conn->query("SELECT * FROM users WHERE role='alumni'");

if ($users->num_rows > 0) {
    while ($user = $users->fetch_assoc()) {
        echo $user['username'];
        echo " <a href='edit_user.php?id=".$user['id']."'>Edit</a>";
        echo " <a href='delete_user.php?id=".$user['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
        echo "<br>";
    }
}
?>
<a href="dashboard.php">Back to Dashboard</a>
