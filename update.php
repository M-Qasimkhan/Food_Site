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
    <title>Edit Profile</title>
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
        form {
            text-align: left;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    <h1>Edit Profile</h1>
    <div class="profile-container">
        <form action="update_profile.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="cnic">CNIC:</label>
                <input type="text" id="cnic" name="cnic" value="<?php echo $cnic; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" value="<?php echo $password; ?>">
            </div>
            <br>
            <a href="#" type="submit" name="update">Save changes</a>
        </form>
    </div>
</body>
</html>
