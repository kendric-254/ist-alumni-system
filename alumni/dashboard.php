<?php
session_start();
if ($_SESSION['role'] != 'alumni') {
    header('Location: ../login.php');
    exit;
}
echo "Welcome Alumni: " . $_SESSION['username'];
?>

<a href="manage_profile.php">Manage Profile</a>
<a href="view_jobs.php">View Jobs</a>
<a href="../logout.php">Logout</a>
