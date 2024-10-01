<?php
session_start(); // เริ่ม session
session_unset(); // ลบตัวแปรทั้งหมดใน session
session_destroy(); // ทำลาย session

// เปลี่ยนเส้นทางไปยังหน้า login
header("Location: login.php");
exit();
?>