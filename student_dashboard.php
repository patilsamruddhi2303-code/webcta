<?php
session_start();
include __DIR__ . "/db.php";

if(!isset($_SESSION['usn'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>Student Dashboard</h1>
<h2>Welcome, <?php echo $_SESSION['user_name']; ?> 👋</h2>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">CMS Portal</div>

    <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Circulars</a></li>
        <li><a href="#">Reminders</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<!-- HEADER -->
<section class="dashboard-header">
    <h1>Welcome Student</h1>
    <p>Access all department notices, circulars, and reminders here.</p>
</section>

<!-- SEARCH -->
<section class="search-section">
    <input type="text" placeholder="Search notices...">
    <select>
        <option>All Categories</option>
        <option>Workshops</option>
        <option>Exams</option>
        <option>Placements</option>
        <option>Events</option>
    </select>
    <button class="btn">Search</button>
</section>

<!-- 🔥 DYNAMIC NOTICES -->
<section class="dashboard-notices">

<h2>Latest Notices</h2>

<?php
$sql = "SELECT * FROM notices ORDER BY id DESC";
$result = $conn->query($sql);

if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $priorityClass = strtolower($row['priority']);
?>

    <div class="notice-card <?php echo $priorityClass; ?>">

        <h3><?php echo $row['title']; ?></h3>

        <p><?php echo $row['description']; ?></p>

        <p><b>Uploaded by:</b> <?php echo $row['uploaded_by']; ?></p>

        <span><?php echo $row['priority']; ?> Priority</span>

        <br>

        <?php if($row['file_name']) { ?>
            <a href="uploads/<?php echo $row['file_name']; ?>" target="_blank">
                View File
            </a>
        <?php } ?>

    </div>

<?php
    }

} else {
    echo "No notices available";
}
?>

</section>

<!-- REMINDER -->
<section class="dashboard-reminder">
    <h2>Upcoming Reminder</h2>
    <p>AI Workshop tomorrow at 10:00 AM</p>
</section>

<!-- STATS -->
<section class="stats-section">

    <div class="stat-card">
        <h2>--</h2>
        <p>Total Circulars</p>
    </div>

    <div class="stat-card">
        <h2>--</h2>
        <p>High Priority</p>
    </div>

    <div class="stat-card">
        <h2>--</h2>
        <p>Events</p>
    </div>

</section>

</body>
</html>