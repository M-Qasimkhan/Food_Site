<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: signin.php');
}

include 'conn.php';


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user data from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM data WHERE username = '$username'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $cnic = $row['cnic'];
    $email = $row['email'];
    $password = $row['password'];
    $id = $row['id'];
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        h1 {
            background-color: #141414;
            color: white;
            padding: 10px 0;
        }
        .profile-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        p {
            text-align: left;
            padding: 5px 0;
        }
        strong {
            font-weight: bold;
        }
        a {
            text-decoration: none;
            background-color: #FF5733;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        a:hover {
            background-color: #FF8C67;
        }
    </style>
</head>
<body>
    <h1>User Profile</h1>
    <div class="profile-container">
        <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>CNIC:</strong> <?php echo $cnic; ?></p>
        <p><strong>Password:</strong> <?php echo $password; ?></p>
        <a href="update.php">Edit Profile</a>
    </div>
</body>
</html>

