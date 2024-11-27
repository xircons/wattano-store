<?php
session_start();
require_once("connection.php");
    $product_id = $_GET['id'];
    $sql = "SELECT product_name FROM product WHERE product_id = $product_id";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row["product_name"];
    } else {
        $product_name = "Wattano store";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="shortcut icon" type="x-icon" href="wattano.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;0,500;0,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.header.css">
    <link rel="stylesheet" href="style.showproduct.css">
    <link rel="stylesheet" href="style.detail.css">
    <title><?php echo $product_name; ?> - Wattano store</title>
</head>
<?php
    $totalItemsInCart = isset($_SESSION["intLine"]) ? count(array_filter($_SESSION["strProductID"])) : 0;

?>
<body>
    <div class="container">
        <div class="navbar">
          <a class="logoadjust" href="mainpage.php"><img src="img/logooo.png" class="logo"></a>
            <nav>
                <ul>
                      <li class="material-symbols-outlined"><a href="cart.php">shopping_cart</li></a>
                      <div class="adjusttt"><div class="circle"><?=$totalItemsInCart?></div></div>
                </ul>
            </nav>
            <div class="logout"><a href="logout.php"><button class="btn">ออกจากระบบ</button></a>
        </div>
    </div>
    <div class="adjust-center">
<?php
    $sql = "SELECT * FROM `type` WHERE `type_name`";
    $sql = "SELECT * FROM `type` WHERE `type_id`";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
?>
    <div class="category-button">
      <a href="showproduct.php?id=<?=$row['type_id']?>"><button class="btn custom-btn"><?=$row['type_name']?></button></a>
    </div>
<?php
    }
?>
<?php
$product_id = $_GET['id'];
$product_id = mysqli_real_escape_string($con, $product_id);
$sql = "SELECT * FROM product WHERE product_id = '$product_id'";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $product_name = $row['product_name'];
    $product_description = $row['product_description'];
    $product_id = $row['product_id'];
    $img = $row['img'];
    $price = $row['price'];
    $quantity = $row['amount'];
}
?>
<div class="container">
    <img src="image/<?= $img ?>" class="showproduct">
    <div class="productname">
        <h1><?= $product_name ?></h1>
        <h2>รหัสสินค้า : <?= $product_id ?></h2>
        <img src="img/sale.png" class="salesign">
        <h3 class="h3positionm">฿<?= $price ?></h3>
        <div class="buybutton">
            <?php
            if ($quantity > 0) {
                echo '<a href="order.php?id=' . $product_id . '"><button class="btn custom-btn-buy">ใส่รถเข็น</button></a>';
            } else {
                echo '<button class="btn custom-btn-buy disabled">สินค้าหมด</button>';
            }
            ?>
            <h1>รายละเอียดสินค้า :</h1>
            <h2><?= $product_description ?></h2> 
        </div>
    </div>
</div>



</body>
</html>