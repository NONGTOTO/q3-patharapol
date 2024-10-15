<?php include "../connect.php" ?>
<!doctype html>
<?php 
session_start(); // เริ่ม session

// ตรวจสอบว่าผู้ใช้ได้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // เปลี่ยนเส้นทางไปยังหน้า login
    exit(); // ออกจาก script
}

// ส่วนที่เหลือของโค้ดใน index.php จะอยู่ที่นี่
?>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
  </head>

  <body>

    <header>
      <div class="logo">
        <img src="cslogo.jpg" width="200" alt="Site Logo">
      </div>
      <h1>Lab 10</h1>
      <a href="logout.php">logout</a>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
    <article>
    
    <h2>รายการ Order ของสมาชิก: <?= htmlspecialchars($username) ?></h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>วันที่สั่งซื้อ</th>
            <th>สถานะ</th>
            <th>จำนวนสินค้า</th>
            <th>รายละเอียดสินค้า</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order['ord_id']) ?></td>
            <td><?= htmlspecialchars($order['ord_date']) ?></td>
            <td><?= htmlspecialchars($order['status']) ?></td>
            <td>
                <?php
                // ดึงรายการสินค้าที่เกี่ยวข้องกับ ord_id นี้
                $order_id = $order['ord_id'];
                $stmt_items = $pdo->prepare("SELECT * FROM item WHERE ord_id = ?");
                $stmt_items->execute([$order_id]);
                $items = $stmt_items->fetchAll();
                echo count($items); // แสดงจำนวนสินค้าที่อยู่ใน Order
                ?>
            </td>
            <td>
                <ul>
                <?php foreach ($items as $item): ?>
                    <?php
                    // ดึงชื่อสินค้าจากตาราง product
                    $stmt_product = $pdo->prepare("SELECT pname FROM product WHERE pid = ?");
                    $stmt_product->execute([$item['pid']]);
                    $product = $stmt_product->fetch();
                    ?>
                    <li><?= htmlspecialchars($product['pname']) ?> (จำนวน: <?= htmlspecialchars($item['quantity']) ?>)</li>
                <?php endforeach; ?>
                </ul>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

      </article>
      <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">
          <li class="dead"><a>Home</a></li>
          <li><a href="member.php">All member</a></li>
          <li><a href="product.php">Table of All Products</a></li>
          <li><a href="deletemem.php">delete member</a></li>
          <li><a href="insertmem.php">Insert member</a></li>
          <li><a href="searchmem.php">Search member</a></li>
          <li><a href="productpic.php">ALL product pic</a></li>
          <li><a href="editproduct.php">Edit product</a></li>
          <li><a href="addproduct.php">Add product</a></li>
          <li><a href="deleteproduct.php">Delete product</a></li>
          <li><a href="workshopsql.php">lab7workshopsql</a></li>
          <li><a href="lab10.php">lab10</a></li>
          <li><a href="lab10order.php">lab10order</a></li>
          <li><a href="lab10cart.php">lab10cart</a></li>
          <li><a href="lab10detail.php">lab10detail</a></li>
          <li><a href="lab11.php">lab11</a></li>
          <li><a href="lab12.php">lab12</a></li>
        </ul>
      </nav>
     
  </body>
</html>