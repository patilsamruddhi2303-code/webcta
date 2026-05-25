<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . "/db.php";

if(isset($_POST['signup'])) {

    $name = $_POST['name'];
    $usn = $_POST['usn'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "student";

    $sql = "INSERT INTO users (name, usn, email, password, role)
            VALUES ('$name', '$usn', '$email', '$password', '$role')";

    if($conn->query($sql) === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - CMS Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">CMS Portal</div>
    <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="login.html">Login</a></li>
    </ul>
</nav>

<section class="form-page">
<div class="form-container signup-form">

<h1>Create Account</h1>

<form action="" method="POST">

    <!-- NAME -->
    <label>Full Name</label>
    <input type="text" name="name" required>

    <!-- USN -->
    <label>USN</label>
    <input type="text" name="usn" required>

    <!-- EMAIL -->
    <label>Email</label>
    <input type="email" name="email" required>

    <!-- PASSWORD -->
    <label>Password</label>
    <input type="password" name="password" required>

    <!-- BUTTON -->
    <button type="submit" name="signup">Sign Up</button>

</form>

<p>
Already have an account?
<a href="login.html">Login</a>
</p>

</div>
</section>

</body>
</html>