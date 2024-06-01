<?php
session_start();
include('../db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

$user_id = $_GET['id'];

$query = "DELETE FROM users WHERE id='$user_id'";
if ($conn->query($query) === TRUE) {
    header('Location: view_users.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
