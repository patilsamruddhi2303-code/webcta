<?php
session_start();
include __DIR__ . "/db.php";

if(isset($_POST['upload'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $priority = $_POST['priority'];
    $date = date("Y-m-d");
    $uploaded_by = $_SESSION['user_name'];

    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];

    $folder = "uploads/" . $file_name;

    move_uploaded_file($temp_name, $folder);

    $sql = "INSERT INTO notices 
    (title, description, category, priority, upload_date, uploaded_by, file_name)
    VALUES 
    ('$title','$description','$category','$priority','$date','$uploaded_by','$file_name')";

    if($conn->query($sql) === TRUE) {
        echo "<script>alert('Notice uploaded successfully');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Notice</title>
</head>
<body>

<h2>Upload Notice</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Title:</label>
    <input type="text" name="title" required><br><br>

    <label>Description:</label>
    <textarea name="description" required></textarea><br><br>

    <label>Category:</label>
    <input type="text" name="category"><br><br>

    <label>Priority:</label>
    <select name="priority">
        <option>High</option>
        <option>Medium</option>
        <option>Low</option>
    </select><br><br>

    <label>Upload File:</label>
    <input type="file" name="file"><br><br>

    <button type="submit" name="upload">Upload</button>

</form>

</body>
</html>