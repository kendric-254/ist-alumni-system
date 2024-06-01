<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="edit_profile.php">Edit Profile</a></li>
        <li><a href="view_users.php">Manage Users</a></li>
        <li><a href="post_jobs.php">Post Jobs</a></li>
        <li><a href="view_jobs.php">View Jobs</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</body>
</html>
