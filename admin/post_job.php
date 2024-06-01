<?php
session_start();
include('../db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $posted_by = $_SESSION['user_id'];

    $sql = "INSERT INTO jobs (title, description, posted_by) VALUES ('$title', '$description', '$posted_by')";
    if ($conn->query($sql) === TRUE) {
        echo "Job posted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="">
    <input type="text" name="title" placeholder="Job Title" required>
    <textarea name="description" placeholder="Job Description" required></textarea>
    <button type="submit">Post Job</button>
</form>
<a href="dashboard.php">Back to Dashboard</a>
