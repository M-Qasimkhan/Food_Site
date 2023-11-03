<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
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

    .cart-container {
        max-width: 800px;
        margin: 0 auto;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .cart-item {
        display: flex;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 10px;
        background-color: #fff;
    }

    .cart-item img {
        width: 200px;
        height: 170px;
        border-radius: 5px;
    }

    .item-details {
        flex: 1;
        padding: 0 10px; /* Add some spacing between the image and item details */
    }

    h2 {
        font-size: 20px;
        margin: 0;
    }

    .item-price {
        font-size: 16px;
        font-weight: bold;
        margin-top: 10px;
    }

    .total-price {
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
    }

    .checkout-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #FF5733;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
    }

    .checkout-button:hover {
        background-color: #FF8C67;
    }

</style>
<body>
    <h1>Your Shopping Cart</h1>
    <div class="cart-container">
        <?php
        include 'conn.php';
        $sql = "select * from cart;";
        $result = mysqli_query($con, $sql);
        $resultcheck = mysqli_num_rows($result);
        if ($resultcheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="cart-item">
                <img src="<?php echo $row['image']; ?>" alt="Food Image">
                <div class="item-details">
                    <h2><?php echo $row['name']; ?></h2>
                    <p><strong>Description: </strong><?php echo $row['description']; ?></p>
                    <p class="item-price"><strong>Price: Rs.</strong><?php echo $row['price']; ?></p>
                </div>
            </div>
        <?php
            }
        }
        $Tprice=0;
        $Tprice = $Tprice + $row['price'];
        ?>
        <p class="total-price">Total: Rs.<?php echo $Tprice; ?></p>
        <a href="#" class="checkout-button">Checkout</a>
    </div>
</body>
</html>
