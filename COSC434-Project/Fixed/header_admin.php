<div style="display:none;">
<?php include '../config.php';?>
</div>
<?php
// Get the username from the database based on the email in the session
if(isset($_SESSION['email'])) {
    $email2 = $_SESSION['email'];
    $sql2 = "SELECT username, status FROM users WHERE email='$email2'";
    $result2 = mysqli_query($connect, $sql2);
    if(mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $username2 = $row2['username'];
        $status2=$row2['status'];
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="../Fixed/css/header.css">
    
</head>
<body>
    <header>
        <div class="logo">
            <a href="../home.php"><img src="../Fixed/css/logo.png" alt="My Website Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="active-jobs.php">Active Jobs</a></li>
                <li><a href="applications.php">applications</a></li>
                <li><a href="faculty.php">Faculty</a></li>
                <li><a href="../profile.php" ><?php echo $username2; ?></a></li>
                <li><a href="../home.php">Logout</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>