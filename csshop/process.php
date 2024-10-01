<?php include "../connect.php"; ?>

<?php
$stmt = $pdo->prepare("UPDATE member SET password=?, name=?, address=?, mobile=?, email=? WHERE username=?");

try {
    // Binding the parameters
    $stmt->bindParam(1, $_POST["password"]); 
    $stmt->bindParam(2, $_POST["name"]); 
    $stmt->bindParam(3, $_POST["address"]); 
    $stmt->bindParam(4, $_POST["mobile"]); 
    $stmt->bindParam(5, $_POST["email"]); 
    $stmt->bindParam(6, $_POST["username"]); 

    // Set the file upload directory
    $upload_dir = '../member_photo/';
    $new_filename = $_POST["username"] . ".jpg"; 
    $uploaded_file = $upload_dir . $new_filename;

    // Execute the statement
    if ($stmt->execute()) {
        // Check if the file upload is successful before moving it
        if (is_uploaded_file($_FILES["picture"]["tmp_name"])) {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $uploaded_file)) {
                echo "แก้ไขสมาชิก " . htmlspecialchars($_POST["name"]) . " สำเร็จ";
            } else {
                echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
            }
        } else {
            echo "ไม่พบไฟล์ที่อัปโหลด";
        }
    } else {
        echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล";
    }
} catch (Exception $e) {
    echo "แก้ไข " . $_POST["username"] . " ไม่สำเร็จ: " . $e->getMessage();
}
?>
