<?php
session_start();
require_once("connection.php");

// Insert a new order
$sql ="INSERT INTO `order` (order_id, total_price) VALUES (NULL, 0)";
if (mysqli_query($con, $sql)) {
    $order_id = mysqli_insert_id($con);
    $_SESSION["order_id"] = $order_id ;
    // Process each item in the cart
    for ($i = 0; $i < count($_SESSION["strProductID"]); $i++) {
        if ($_SESSION["strProductID"][$i] != "") {    
            $product_id = $_SESSION["strProductID"][$i];
            $qty = $_SESSION["strQty"][$i];

            // Retrieve product details
            $sql_product = "SELECT * FROM product WHERE product_id = '$product_id'";
            $result_product = mysqli_query($con, $sql_product);
            $row = mysqli_fetch_assoc($result_product);

            if ($row) {
                $price = $row['price'];
                $total = $qty * $price;

                // Insert order detail
                $sql_order_detail = "INSERT INTO order_detail (order_id, product_id, order_price, order_qty, total)
                                     VALUES ('$order_id', '$product_id', '$price', '$qty', '$total')";
                if(mysqli_query($con, $sql_order_detail)){
                    // Update product quantity
                    $sql_update_product = "UPDATE product SET amount = amount - '$qty' WHERE product_id='$product_id'";
                    mysqli_query($con, $sql_update_product);
                } else {
                    // Handle insertion error
                    echo "<script>alert('Failed to insert order detail.');</script>";
                }
            }
        }
    }

    // Calculate the total price for the order and update the 'order' table
    $sql_update_total = "UPDATE `order` SET total_price = (SELECT SUM(total) FROM order_detail WHERE order_id = '$order_id') WHERE order_id = '$order_id'";
    mysqli_query($con, $sql_update_total);

    // Provide feedback to the user
    echo "<script>alert('Thank you for your order.');</script>";
    echo "<script>window.location.href = 'printorder.php';</script>";
} else {
    // Handle insertion error
    echo "<script>alert('Failed to insert order.');</script>";
}

// Clean up
mysqli_close($con);
unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
?>
