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
    <link rel="stylesheet" href="style.header-fix.css">
    <link rel="stylesheet" href="style.mainpage.css">
    <title>Wattano store</title>
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
    <div class="banner">
      <a target="_blank" href="https://maps.app.goo.gl/sTw3Wino2G5bRdRm6"><img src="img/opennow.png"></a>
      <a href="showproduct.php?id=006"><img src="img/banner1.png"></a>
    </div>
  <recommend>
    <div class="recommendbanner">
        <img src="img/recommend.png">
            <a class="no-underline" href="productdetail.php?id=000002">
                <div class="product-details"><div class="product">
                <img class="imgproduct" src="image/812133.jpg">
                <p class="productname">ปากกาลูกลื่น UNI Jetstream SX-101-10</p>
                <h1 class="productprice">฿20</h1></a>
            </div>
            </div>
            <a class="no-underline" href="productdetail.php?id=000007">
                <div class="product-details"><div class="product">
                <img class="imgproduct" src="image/188856.jpg">
                <p class="productname">ดินสอกด UNI SHALAKU M5-228</p>
                <h1 class="productprice">฿35</h1></a>
            </div>
            </div>
            <a class="no-underline" href="productdetail.php?id=000008">
                <div class="product-details"><div class="product">
                <img class="imgproduct" src="image/235466.jpg">
                <p class="productname">ดินสอกด Quantum Atom QM 230</p>
                <h1 class="productprice">฿109</h1></a>
            </div>
            </div>
            <a class="no-underline" href="productdetail.php?id=000012">
                <div class="product-details"><div class="product">
                <img class="imgproduct" src="image/135690.jpg">
                <p class="productname">ชุดเรขาคณิต Master Art รุ่น F713</p>
                <h1 class="productprice">฿53</h1></a>
            </div>
            </div>
    </div>
  </recommend>
  <bestseller>
    <div class="bestseller">
        <img src="img/selldee.png">
            <a class="no-underline" href="productdetail.php?id=000006">
                <div class="product-details"><div class="product">
                <img class="imgproduct" src="image/540893.jpg">
                <p class="productname">ดินสอ 6B Renaissance</p>
                <h1 class="productprice">฿9</h1></a>
            </div>
            </div>
            <a class="no-underline" href="productdetail.php?id=000014">
                <div class="product-details"><div class="product">
                <img class="imgproduct" src="image/276058.jpg">
                <p class="productname">กระเป๋าดินสอ Master Art แฟนซี 602</p>
                <h1 class="productprice">฿85</h1></a>
            </div>
            </div>
            <a class="no-underline" href="productdetail.php?id=00002">
                <div class="product-details"><div class="product">
                <img class="imgproduct" src="image/812133.jpg">
                <p class="productname">ปากกาลูกลื่น UNI Jetstream SX-101-10</p>
                <h1 class="productprice">฿20</h1></a>
            </div>
            </div>
            <a class="no-underline" href="productdetail.php?id=000009">
                <div class="product-details"><div class="product">
                <img class="imgproduct" src="image/885190.jpg">
                <p class="productname">สีไม้ระบายน้ำ 24 สี Renaissance/p>
                <h1 class="productprice">฿150</h1></a>
            </div>
            </div>
    </div>
  </bestseller>
</body>
</html>