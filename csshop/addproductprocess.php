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
try {
    // Prepare SQL statement without the empty '' for the ID
    $stmt = $pdo->prepare("INSERT INTO product (pname, pdetail, price) VALUES (?, ?, ?)");

    // Bind parameters from POST request
    $stmt->bindParam(1, $_POST["pname"]);
    $stmt->bindParam(2, $_POST["pdetail"]);
    $stmt->bindParam(3, $_POST["price"]);

    // Execute the statement
    $stmt->execute();

    // Get the last inserted ID (pid)
    $pid = $pdo->lastInsertId();

    // Check if an image file was uploaded
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        // Set the upload directory
        $upload_dir = 'product_photo/';  // Make sure this directory exists and is writable

        // Get the file extension
        $file_extension = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);

        // Set the new filename as pid with the original extension
        $new_filename = $pid . '.' . $file_extension;

        // Set the destination path
        $destination = $upload_dir . $new_filename;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $destination)) {
            echo "File uploaded successfully.";
        } else {
            echo "Failed to upload file.";
        }
    }

    // Redirect to the product detail page
    header("Location: productlist.php?pid=" . $pid);
} catch (PDOException $e) {
    // If there is an error, print the error message
    echo "Error: " . $e->getMessage();
}
?>
