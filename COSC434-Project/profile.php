<div style="display:none;">
<?php include 'config.php';?>
</div>
<?php 
    session_start();
    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="css/profile.css">

</head>
<body style="background-image: url('img/background.png'); background-size: cover; background-position: center;">
    <div class="wrapper">
        <?php include 'Fixed/header.php'; ?>
        <div class="profile">
            <h2>Welcome <?php echo $row['firstname'] . " " . $row['lastname']; ?></h2>
            <p>Username: <?php echo $row['username']; ?></p><br>
            <p>Email: <?php echo $row['email']; ?></p><br>
            <p>Phone Number: <?php echo $row['phonenumber']; ?></p><br>
            <p>Address: <?php echo $row['address']; ?></p><br>
            <p>Gender: <?php echo $row['gender']; ?></p><br><br>
            <a href="editprofile.php" class="edit-profile-btn">Edit Profile</a>
        </div>
        <div class="push"></div>
    </div>
    <?php include 'Fixed/footer.html'; ?>
</body>
</html>