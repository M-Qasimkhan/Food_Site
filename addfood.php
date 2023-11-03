<?php
                include 'conn.php';
                if (isset($_POST["add"])) {
                    $name = $_POST['name'];
                    $desc = $_POST['desc'];
                    $price = $_POST['price'];
                    $imageFileName = $_FILES['image']['name'];
                    $imageFileSize = $_FILES['image']['size'];
                    $imageTmpName = $_FILES['image']['tmp_name'];


                    $uploadDirectory = 'uploads/';
                    $uploadedImagePath = $uploadDirectory . $imageFileName;

                    if (move_uploaded_file($imageTmpName, $uploadedImagePath)) {
                        $result = mysqli_query($con, "INSERT INTO `addfood` (`foodname`, `description`, `price`, `image`) VALUES ('$name', '$desc', '$price', '$uploadedImagePath')");
                    }
                }
                
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food</title>
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
        input[type="submit"] {
            background-color: #FF5733;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FF8C67;
        }
    </style>
</head>
<body>
    <h1>Add Food</h1>
    <div class="profile-container">
        <form action="addfood.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Food name:</label>
                <input type="text" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" >
            </div>
            <div class="form-group">
                <label for="desc">Description:</label>
                <input type="text" id="desc" name="desc" >
            </div>
            <div>
                <label style=" display: block;font-weight: bold;" for="image">Image:</label><br>
                <input type="file" id="image" name="image" >
            </div>
            <br>
            <input type="submit" value="Add Food" name="add">
        </form>
    </div>
</body>
</html>
