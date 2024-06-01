<?php
session_start();
include('../db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

$user_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "UPDATE users SET username='$username', password='$password' WHERE id='$user_id'";
    if ($conn->query($query) === TRUE) {
        echo "User updated successfully.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$user = $conn->query("SELECT * FROM users WHERE id='$user_id'")->fetch_assoc();
?>
<form method="POST" action="">
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
    <input type="password" name="password" placeholder="New Password" required>
    <button type="submit">Update User</button>
</form>
<a href="view_users.php">Back to Users</a>
