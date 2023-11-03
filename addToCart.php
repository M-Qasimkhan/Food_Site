<?php
// Include your database connection code (e.g., 'conn.php')
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
    <title>Document</title>
</head>
<body>
    <script>
        function addToCart(name, description, price, image) {
    const item = { name, description, price, image };

    fetch('addToCart.php', {
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