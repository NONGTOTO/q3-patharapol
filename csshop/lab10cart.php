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
    
    <?php

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
    }
    ?>

    <!-- ลิงก์ไปยังหน้าตะกร้าสินค้า -->
    <a href="lab10cart.php">สินค้าในตะกร้า (<?=sizeof($_SESSION['cart'])?>)</a>

    <div style="display:flex">    
    <?php
        // ดึงข้อมูลสินค้าจากฐานข้อมูล
        $stmt = $pdo->prepare("SELECT * FROM product");
        $stmt->execute();
        while ($row = $stmt->fetch()) { 
    ?>
        <div style="padding: 15px; text-align: center">
            <a href="lab10detail.php?pid=<?=$row["pid"]?>"><img src='../product_photo/<?=$row["pid"]?>.jpg' width='100'></a><br>
            <?=$row ["pname"]?><br><?=$row ["price"]?> บาท<br>    
            <form method="post" action="lab10cart.php?action=add&pid=<?=$row["pid"]?>&pname=<?=$row["pname"]?>&price=<?=$row["price"]?>">
                <input type="number" name="qty" value="1" min="1" max="<?=$row['quantity']?>"> <!-- แสดงจำนวนสินค้าที่เหลือในสต็อก -->
                <input type="submit" value="ซื้อ">       
            </form>
        </div>
    <?php } ?>
    </div>
    
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
          <li><a href="q_trytest.php">testquiz4</a></li>
        </ul>
      </nav>
     
  </body>
</html>