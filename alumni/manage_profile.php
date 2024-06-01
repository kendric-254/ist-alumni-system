<?php
session_start();
include('../db.php');

if ($_SESSION['role'] != 'alumni') {
    header('Location: ../login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update Profile logic
    // Similar to admin/edit_profile.php
}

$profile = $conn->query("SELECT * FROM profiles WHERE user_id='$user_id'")->fetch_assoc();
?>

<form method="POST" action="">
    <input type="text" name="name" value="<?php echo $profile['name']; ?>" placeholder="Name" required>
    <input type="email" name="email" value="<?php echo $profile['email']; ?>" placeholder="Email" required>
    <input type="text" name="phone" value="<?php echo $profile['phone']; ?>" placeholder="Phone" required>
    <textarea name="address" placeholder="Address" required><?php echo $profile['address']; ?></textarea>
    <button type="submit">Update Profile</button>
</form>
<a href="dashboard.php">Back to Dashboard</a>
