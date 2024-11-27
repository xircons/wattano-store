<?php
session_start();
require_once("connection.php");

    $sql = "SELECT * FROM `order` WHERE order_id= '" . $_SESSION["order_id"] . "' ";
    $result = mysqli_query($con, $sql);
    $rs = mysqli_fetch_array($result);
    $total_price = $rs['total_price'];
    $date =  ['date'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="shortcut icon" type="x-icon" href="wattano.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Trirong:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.printorder.css">
</head>

<body>

  <div class="head">
      <h1>โรงเรียนวัฒโนทัยพายัพ</h1>
      <h2>ใบการสั่งซื้อสินค้า</h2>
    </div>
  <div class="x">
    <h1>เลขที่การสั่งซื้อ : <?php echo isset($rs['order_id']) ? $rs['order_id'] : 'ไม่พบเลขการสั่งซื้อ'; ?><h/1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <h2>วันที่การสั่งซื้อ : <?php echo(isset($rs['date']) ? $rs['date'] : 'ไม่พบวันที่การสั่งซื้อ'); ?><h/2><br>
</div>

    <table class="table">
  <thead>
    <tr>
        <th>รหัสสินค้า</th>
        <th>ชื่อสินค้า</th>
        <th>ราคา</th>
        <th>จำนวน</th>
        <th>ราคารวม</th>
    </tr>
  </thead>
  <tbody>

<?php
$sql1 = "SELECT * FROM order_detail d, product p WHERE d.product_id=p.product_id and d.order_id= '" . $_SESSION["order_id"] . "' ";
$result1 = mysqli_query($con, $sql1);

while($row = mysqli_fetch_array($result1)){
?>
    <tr>
      <td><?=$row['product_id']?></td>
      <td><?=$row['product_name']?></td>
      <td><?=$row['order_price']?></td>
      <td><?=$row['order_qty']?></td>
      <td><?=$row['total']?></td>
    </tr>
<?php
}
?>

</table>
<h6>รวมเป็นเงิน <?=number_format($total_price,2)?> บาท</h6>
<div class="button">
  <button class="btn" onclick="location.href='mainpage.php'">Back</button>&nbsp;&nbsp;&nbsp;
  <button onclick="window.print()" class="btn">Print</button>
</div>
</body>

</html>