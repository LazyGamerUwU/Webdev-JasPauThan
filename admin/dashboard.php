<?php
require '../classes/account.class.php';
session_start();
Account::redirect_if_not_logged_in('admin');
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../includes/_head.php'; ?>
<title>Admin Dashboard</title>
<style>
    body {
        background-image: url('../images/9713c927-ce90-4aa7-8850-a69ca4024a49.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: Arial, sans-serif;
        color: #2e7d32;
        min-height: 100vh;
    }
    .container {
        background-color: #ffffff; /* White background for content */
        border: 1px solid #a5d6a7; /* Light green border */
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 800px;
        margin: 50px auto;
    }
    h1 {
        color: #1b5e20; /* Deep green heading */
        text-align: center;
        margin-bottom: 20px;
    }
    p {
        color: #388e3c; /* Medium green for paragraph text */
        text-align: center;
        margin-bottom: 20px;
    }
    .navbar {
        margin-bottom: 10px;
        background-color: #c8e6c9; /* Light green navbar background */
        border-radius: 5px;
    }
    .navbar-brand {
        color: #1b5e20 !important; /* Deep green navbar links */
        font-weight: bold;
        padding: 10px;
    }
    .navbar-brand:hover {
        color: #388e3c !important; /* Darker green on hover */
        text-decoration: none;
    }
    .btn-danger {
        background-color: #e57373; /* Soft red for logout button */
        border-color: #e57373;
        transition: background-color 0.3s ease;
    }
    .btn-danger:hover {
        background-color: #d32f2f; /* Darker red on hover */
    }
    footer {
        text-align: center;
        margin-top: 20px;
        color: #a5d6a7;
    }
</style>
<body>
<?php include '../includes/_topnav.php'; ?>
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['user']['username']); ?>!</p>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="../admin/events.php">Event Manager</a>
    </nav>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="../admin/attendance.php">Attendance</a>
    </nav>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="../admin/students.php">Students</a>
    </nav>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="../admin/users.php">Users</a>
    </nav>
    <div class="text-center mt-4">
        <a href="../account/logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
<?php include '../includes/_footer.php'; ?>
</body>
</html>
