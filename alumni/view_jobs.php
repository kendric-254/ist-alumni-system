<?php
session_start();
include('../db.php');

if ($_SESSION['role'] != 'alumni') {
    header('Location: ../login.php');
    exit;
}

$jobs = $conn->query("SELECT * FROM jobs");

if ($jobs->num_rows > 0) {
    while ($job = $jobs->fetch_assoc()) {
        echo $job['title'] . " - " . $job['description'];
        echo "<br>";
    }
}
?>
<a href="dashboard.php">Back to Dashboard</a>
