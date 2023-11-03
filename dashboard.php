<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:signin.php');
}

include 'conn.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the POST request
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Insert the data into a new table in your database (e.g., 'cart_items')
    $insertQuery = "INSERT INTO `cart`( `name`, `description`, `price`, `image`) VALUES ('$name', '$description', '$price', '$image')";

    if (mysqli_query($con, $insertQuery)) {
        // Data was successfully added to the cart
        echo json_encode(['message' => 'Item added to cart']);
    } else {
        // An error occurred
        echo json_encode(['error' => 'Failed to add item to cart']);
    }
} else {
    // Invalid request method
    echo json_encode(['error' => 'Invalid request']);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #141414;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            padding-left: 70px;
            display: flex;
            align-items: center;
            font-size: 24px;
        }

        .logo img {
            width: 40px;
            margin-right: 10px;
        }

        .search-icon {
            cursor: pointer;
        }

        .search-bar {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: #333;
            border-radius: 5px;
            padding: 10px;
            width: 200px; /* Adjust the width as needed */
        }

        .search-bar input {
            background: none;
            border: none;
            padding: 5px;
            color: white;
            width: 100%;
            margin-bottom: 10px;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav li {
            margin: 0 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        .user-buttons {
            display: flex;
        }

        .user-button {
            margin-left: 10px;
            background-color: #FF5733;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .user-button:hover {
            background-color: #FF8C67;
        }

        .hero {
            background-image: url('https://i.pinimg.com/736x/bf/65/d5/bf65d51f34b1bf193ec947f3c0c3f3e0.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
            color: white;
            padding: 100px 0;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .cta-button {
            background-color: #FF5733;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #FF8C67;
        }

        .featured {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 0;
            text-align: center;
        }

        .featured h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .featured-dishes {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .dish {
            flex: 1;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .dish img {
            max-width: 100%;
            height: 170px;
            border-radius: 5px;
        }

        .add-to-cart-button {
            background-color: #FF5733;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        
        }

        .add-to-cart-button:hover {
            background-color: #FF8C67;
        }

        footer {
            background-color: #141414;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

    .user-dropdown {
        position: relative;
        display: inline-block;
        padding-right: 70px; 
    }

    .user-dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .user-dropdown:hover .user-dropdown-content {
        display: block;
    }

    .user-dropdown-content a {
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        color: #333;
    }

    .user-dropdown-content a:hover {
        background-color: #f1f1f1;
    }
</style>

</head>

<body>
    <header>
    <div class="logo">
                <img src="https://img.freepik.com/premium-vector/animated-chef-logo-template_434010-35.jpg?size=626&ext=jpg&ga=GA1.1.717224448.1697708823&semt=ais" alt="Food Delivery Logo"> 
                Mr.Grill
            </div>
        <nav>
            
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
                <li></li>
            </ul>
            
        
        
        </nav>
        <div class="user-dropdown">
            <a href="#" class="user-button"><?php echo $_SESSION['username']; ?></a>
           
            <div class="user-dropdown-content">
                
                <a href="Profile.php">Profile</a>
                <a href="cart.php">Cart</a>
                <a href="logout.php">Logout</a>
                
            </div>
        </div>
    </header>

    <section class="hero">
        <div >
            <h1>Delicious Food Delivered to Your Door</h1>
            <p>Order from the best local restaurants with just a few clicks.</p><br>
        
        </div>
    </section>

    <section class="featured">
        <h2>Featured Dishes</h2>
        <div class="featured-dishes">
        <?php
                include 'conn.php';
                $sql = "select * from addfood;";
                $result = mysqli_query($con, $sql);
                $resultcheck = mysqli_num_rows($result);
                if ($resultcheck > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <div class="dish">
                        <div>
                            <?php echo "<img src='{$row['image']}' alt='Food Image' >" ?>
                        </div>
                        <h3><?php echo $row['foodname'] ?></h3>
                        <p><strong>Description: </strong>
                            <?php echo $row['description'] ?>
                        </p>
                        <p><strong>Price: Rs.</strong>
                            <?php echo $row['price'] ?>
                        </p>
                        <?php
                        $name=$row['foodname'];
                        $description=$row['description'];
                        $price=$row['price'];
                        $image=$row['image'];
                        ?>
                        <center>
                                <input type="button" class="add-to-cart-button" value="Add to Cart" onclick="addToCart(
                                    $name,$description,$price,$image
                                )">
                            </center>

                        </div>

                        <?php
                    }
                }
                ?>
                
        </div>
    </section>                

    <footer>
        <p>&copy; 2023 Food Delivery</p>
    </footer>

    <script>
        // Define JavaScript variables to store cart items
        let cartItems = [];

        // Function to add an item to the cart
        function addToCart(name, description, price, image) {
            const item = { name, description, price, image };
            cartItems.push(item);
            // You can now use the 'cartItems' array to manage cart data
            console.log(cartItems);
            // Log the current cart items (you can send this data to the server or use it for other purposes)
            fetch('dashboard.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(item),
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Failed to add item to cart');
        }
    })
    .then(data => {
        // Handle the server response (e.g., show a message to the user)
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
        }
    </script>

</body>
</html>
