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
      <h1>Add Product</h1>
      <a href="logout.php">logout</a>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
    <article>
      <form action="addproductprocess.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?= $row["pid"] ?>">
        ชื่อสินค้า: <input type="text" name="pname" value="<?= $row["pname"] ?>"><br>
        รายละเอียดสินค้า: <br>
        <textarea name="pdetail" rows="3" cols="40"><?= $row["pdetail"] ?></textarea><br>
        ราคา: <input type="number" name="price" value="<?= $row["price"] ?>"><br>
        
        <!-- เพิ่มส่วนอัปโหลดรูป -->
        รูปสินค้า: <input type="file" name="product_image" accept="image/*"><br>
        
        <input type="submit" value="เพิ่มสินค้า">
    </form>
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
          <li><a href="workshopsql.php">workshopsql</a></li>
        </ul>
      </nav>
     
  </body>
</html>