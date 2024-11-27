<?php
session_start();
require_once("connection.php");
    $type_id = $_GET['id'];
    $sql = "SELECT type_name FROM `type` WHERE type_id = $type_id";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $type_name = $row["type_name"];
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
    <title><?php echo $type_name; ?> - Wattano store</title>
</head>
<?php
    $totalItemsInCart = isset($_SESSION["intLine"]) ? count(array_filter($_SESSION["strProductID"])) : 0;
    if (isset($_GET['id']) && $_GET['id'] === '006') {
        echo '<link rel="stylesheet" href="style.header-h.css">';
    } else {
        echo '<link rel="stylesheet" href="style.header.css">';
    }
?>
<style> 
</style>
<body>
    <div class="container">
        <div class="navbar">
          <a class="logoadjust" href="mainpage.php"><img src="img/logooo.png" class="logo"></a>
            <nav>
                <ul>
                      <li class="material-symbols-outlined"><a href="cart.php">shopping_cart</li>
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
        if (isset($_GET['id']) && $_GET['id'] !== '006') {
            $type_id = $_GET['id'];
            $sql = "SELECT product.*, type.type_id, type.type_name
                FROM product
                JOIN type ON product.type_id = type.type_id
                WHERE type.type_id = '$type_id'";
        } else {
            $sql = "SELECT product.*, type.type_id, type.type_name
                FROM product
                JOIN type ON product.type_id = type.type_id";
        }

        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $type_name = "";

            $row = mysqli_fetch_assoc($result);
            $type_name = $row['type_name'];
        }
        ?>
        <div class="product-container">
            <?php
            mysqli_data_seek($result, 0);

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="product-details">
                    <div class="product">
                        <a class="no-underline" href="productdetail.php?id=<?= $row['product_id'] ?>">
                            <img class="imgproduct" src="image/<?= $row['img'] ?>">
                            <p class="productname"><?= $row['product_name'] ?></p>
                            <h1 class="productprice">฿<?= $row['price'] ?></h1>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>  
</body>
</html>