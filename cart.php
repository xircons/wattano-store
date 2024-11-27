<?php
session_start();
require_once("connection.php");
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
    <link rel="stylesheet" href="style.cart.css">
    <title>ตะกร้าสินค้า</title>
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
        </div>
    </div>
    <?php
$Total = 0;
$sumPrice = 0;

if (isset($_SESSION["intLine"]) && $_SESSION["intLine"] > 0) {
    for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
        if (isset($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "") {
            $sql = "SELECT * FROM product WHERE product_id = '" . $_SESSION["strProductID"][$i] . "'";
            $result = mysqli_query($con, $sql);
            $row_pro = mysqli_fetch_array($result);

            $_SESSION["price"][$i] = $row_pro['price'];
            $Total = $_SESSION["strQty"][$i];
            $sum = $Total * $row_pro['price'];
            $sumPrice = $sumPrice + $sum;
        }
    }
    $sumPrice = number_format($sumPrice);
}
?>

<headercart>
  <div class="headcarttext">
    <h1>รถเข็นของฉัน</h1>
  </div>
  <div class="headcart">
    <h1>สินค้า</h1>
    <h2>ราคาต่อชิ้น</h2>
    <h3>จำนวน</h3>
  </div>
</headercart>

<?php if (isset($_SESSION["intLine"]) && $_SESSION["intLine"] > 0): ?>
<div class="bill">
    <form id="from1" method="POST" action="insert_cart.php">
        <h1>สรุปการสั่งซื้อ</h1>
        <div class="price">
            <h1>ยอดรวมสุทธิ</h1>
            <h2>( รวมภาษีมูลค่าเพิ่ม )</h2>
            <h3>฿<?=$sumPrice;?></h3>
        </div>
        <a class="adjustbutton" href=""><button type="submit" class="btn custom-btn-buy">ทำการสั่งซื้อ</button></a>
    </form>
</div>
<div class="leftbill">
    <h1>ยอดรวมสินค้า</h1>
    <h2>ค่าจัดส่ง</h2>
</div>
<div class="rightbill">
    <h1>฿<?=$sumPrice?></h1>
    <h2>ฟรี</h2>
</div>

<?php
$sumPrice = 0;

for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
    if (isset($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "") {
        $sql = "SELECT * FROM product WHERE product_id = '" . $_SESSION["strProductID"][$i] . "'";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            die("Error in SQL query: " . mysqli_error($con));
        }

        $row_pro = mysqli_fetch_array($result);

        if ($row_pro) {
            $_SESSION["price"][$i] = $row_pro['price'];
            $Total = $_SESSION["strQty"][$i];
            $sum = $Total * $row_pro['price'];

            if (is_numeric($row_pro['price'])) {
                $sumPrice += $sum;
            }
?>
            <div class="cartproduct">
                <img class="cartimg" src="image/<?= $row_pro['img'] ?>">
                <h1><?= $row_pro['product_name'] ?></h1>
                <h2>฿<?= $row_pro['price'] ?></h2>
                <h3><?= $_SESSION["strQty"][$i] ?></h3>
                <a class="no-underline" href="orderremove.php?id=<?= $row_pro['product_id'] ?>"><h4><?= ($_SESSION["strQty"][$i] > 1) ? '-' : '' ?></h4></a>
                <a class="no-underline" href="order.php?id=<?= $row_pro['product_id'] ?>"><h5 class="hi">+</h5></a>
                <a class="no-underline" href="productremove.php?Line=<?= $i ?>"><h6 class="material-symbols-outlined">delete</h6></a>
                <div class="bar"></div>
            </div>
<?php
        }
    }
}
?>

<?php else: ?>
<div class="normal-cart">
<div class="bill">
        <h1>สรุปการสั่งซื้อ</h1>
        <div class="price">
            <h1>ยอดรวมสุทธิ</h1>
            <h2>( รวมภาษีมูลค่าเพิ่ม )</h2>
            <h3>฿<?=$sumPrice;?></h3>
        </div>
        <a class="adjustbutton-dis" href=""><button id="openPopup" class="btn custom-btn-buy" disabled>ทำการสั่งซื้อ</button></a>
</div>
<div class="leftbill">
    <h1>ยอดรวมสินค้า</h1>
    <h2>ค่าจัดส่ง</h2>
</div>
<div class="rightbill">
    <h1>฿<?=$sumPrice?></h1>
    <h2>ฟรี</h2>
</div>
</div>
<?php endif; ?>

</form>
</body>
</html>