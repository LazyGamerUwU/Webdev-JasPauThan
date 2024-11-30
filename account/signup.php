<?php
require '../classes/database.class.php';
require '../classes/authenticate.class.php';
require '../tools/functions.php';

// Instantiate Authenticator
$auth = new Authenticator($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = clean_input($_POST['username']);
    $password = clean_input($_POST['password']);
    $confirm_password = clean_input($_POST['confirm_password']);
    $email = clean_input($_POST['email']);

    // Validate passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } 
    // Validate password length
    elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    }
    // Attempt to create user
    else {
        if ($auth->createUser($username, $password, $email)) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Username or email already exists.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../includes/_head.php'; ?>
<title>OCESION - Sign Up</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<style>
    body {
        background-color: #e8f5e9; /* Light green background */
        font-family: Arial, sans-serif;
        color: #2e7d32; /* Dark green text */
    }
    .container {
        background-color: #ffffff; /* White background for form */
        border: 1px solid #a5d6a7; /* Light green border */
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px;
        margin: 50px auto;
    }
    h2 {
        color: #1b5e20; /* Deep green heading */
        text-align: center;
        margin-bottom: 20px;
    }
    .form-group label {
        color: #2e7d32; /* Dark green for labels */
    }
    .form-control {
        border: 1px solid #a5d6a7; /* Light green border */
    }
    .btn-primary {
        background-color: #43a047; /* Medium green button */
        border-color: #43a047;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #388e3c; /* Darker green on hover */
    }
    .alert-danger {
        background-color: #ffcdd2; /* Light red for alert */
        color: #b71c1c; /* Dark red text */
        border: 1px solid #e57373;
    }
</style>
<body>
<div class="container">
    <h2>Sign Up</h2>
    <form method="POST">
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" 
                   required minlength="8">
        </div>
        <div class="form-group mb-3">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" 
                   name="confirm_password" required minlength="8">
        </div>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary w-100 mb-2">Sign Up</button>
    </form>
    <a href="login.php" class="btn btn-outline-primary w-100">Back to Login</a>
</div>
</body>
</html>
