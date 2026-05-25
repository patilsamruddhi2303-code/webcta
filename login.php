<?php
session_start();
include __DIR__ . "/db.php";

if(isset($_POST['login'])) {

    $usn = $_POST['usn'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE usn='$usn' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        echo "Login successful!";
        header("Location: student_dashboard.php");
        exit();
    } else {
        echo "Invalid USN or Password!";
    }
    session_start();

$_SESSION['usn'] = $row['usn'];          // important
$_SESSION['user_name'] = $row['name'];   // for display
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">

    <label>USN:</label>
    <input type="text" name="usn" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>

</form>

</body>
</html>