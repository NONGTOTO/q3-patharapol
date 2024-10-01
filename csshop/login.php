<?php include "../connect.php" ?>
<?php session_start(); ?>
<!doctype html>
<?php
// เชื่อมต่อกับฐานข้อมูล
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบชื่อผู้ใช้และรหัสผ่านในฐานข้อมูล
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        // หากเข้าสู่ระบบสำเร็จ, บันทึกชื่อผู้ใช้และบทบาทใน session
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // บันทึกบทบาทในเซสชัน
        header("Location: product.php"); // เปลี่ยนไปยังหน้าหลักหรือหน้าสินค้า
        exit();
    } else {
        echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง.";
    }
}
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
      <h1>Login</h1>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
      <article>
        
      <form method="post" action="">
        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">รหัสผ่าน:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="เข้าสู่ระบบ">
    </form>

      </article>
      
     
  </body>
</html>