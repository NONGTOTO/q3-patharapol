<?php include "../connect.php" ?>
<?php 
session_start(); // เริ่ม session

// ตรวจสอบว่าผู้ใช้ได้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // เปลี่ยนเส้นทางไปยังหน้า login
    exit(); // ออกจาก script
}

// ส่วนที่เหลือของโค้ดใน index.php จะอยู่ที่นี่
?>

<?php
// เตรียม SQL สำหรับแก้ไขข้อมูลในตาราง product
$stmt = $pdo->prepare("UPDATE product SET pname=?, pdetail=?, price=? WHERE pid=?");
$stmt->bindParam(1, $_POST["pname"]);
$stmt->bindParam(2, $_POST["pdetail"]);
$stmt->bindParam(3, $_POST["price"]);
$stmt->bindParam(4, $_POST["pid"]);
$pid = $_POST["pid"]; // เก็บ pid ไว้ใช้อ้างอิงในการเปลี่ยนชื่อไฟล์

if ($stmt->execute()) {
    echo "แก้ไขสินค้า " . $_POST["pname"] . " สำเร็จ<br>";

    // ตรวจสอบว่ามีการอัปโหลดรูปภาพหรือไม่
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        // กำหนดโฟลเดอร์ที่เก็บรูปภาพ
        $upload_dir = '../product_photo/';
        $file_extension = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
        $new_filename = $pid . '.' . $file_extension; // ใช้ pid เป็นชื่อไฟล์

        // ย้ายไฟล์รูปภาพไปยังโฟลเดอร์ที่เก็บ โดยเปลี่ยนชื่อเป็น pid
        $destination = $upload_dir . $new_filename;
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $destination)) {
            echo "อัปโหลดรูปภาพสำเร็จ<br>";
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ<br>";
        }
    } else {
        echo "ไม่มีการอัปโหลดรูปภาพใหม่<br>";
    }
} else {
    echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูลสินค้า<br>";
}
?>

