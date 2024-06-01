<?php
session_start();
include('../db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'alumni';

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($query) === TRUE) {
        echo "New alumni user created successfully.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Add User</button>
</form>
<a href="dashboard.php">Back to Dashboard</a>
