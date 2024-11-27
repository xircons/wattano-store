<?php
ob_start();
session_start();
require_once("connection.php");

$productID = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($productID > 0) {
    if (!isset($_SESSION["intLine"])) {
        $_SESSION["intLine"] = 0;
        $_SESSION["strProductID"][0] = $productID;
        $_SESSION["strQty"][0] = 1;
        header("location:cart.php");
    } else {
        $key = array_search($productID, $_SESSION["strProductID"]);
        if ($key !== false) {
            $_SESSION["strQty"][$key]++;
        } else {
            $_SESSION["intLine"]++;
            $intNewLine = $_SESSION["intLine"];
            $_SESSION["strProductID"][$intNewLine] = $productID;
            $_SESSION["strQty"][$intNewLine] = 1;
        }
        header("location:cart.php");
    }
} else {
    echo "Invalid product ID";
}
?>
