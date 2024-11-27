<?php
ob_start();
session_start();

if (isset($_GET["Line"])) {
    $Line = filter_var($_GET["Line"], FILTER_VALIDATE_INT);

    if ($Line !== false && $Line >= 0) {
        unset($_SESSION["strProductID"][$Line]);
        unset($_SESSION["strQty"][$Line]);

        // Recalculate the total number of items in the cart
        $totalItemsInCart = count(array_filter($_SESSION["strProductID"]));
    }
}

header("location: cart.php");
?>