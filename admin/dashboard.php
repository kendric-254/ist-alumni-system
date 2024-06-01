<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}
echo "Welcome Admin: " . $_SESSION['username'];
?>

<a href="manage_users.php">Manage Users</a>
<a href="post_job.php">Post Job</a>
<a href="view_jobs.php">View Jobs</a>
<a href="edit_profile.php">Edit Profile</a>
<a href="../logout.php">Logout</a>
