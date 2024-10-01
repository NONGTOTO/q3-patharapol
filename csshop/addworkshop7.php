<?php include "../connect.php" ?>

<?php

if (is_uploaded_file($_FILES['profile_pic']['tmp_name'])) {
   
    $target_directory = "../member_photo";
    
    
    $target_file = $target_directory . $_POST["username"] . ".jpg";
    
    
    if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
        echo "รูปภาพถูกอัปโหลดสำเร็จ";
    } else {
        echo "การอัปโหลดรูปภาพล้มเหลว";
    }
}


$stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->bindParam(3, $_POST["name"]);
$stmt->bindParam(4, $_POST["address"]);
$stmt->bindParam(5, $_POST["mobile"]);
$stmt->bindParam(6, $_POST["email"]);
$stmt->execute(); 
header("location: workshop5.php?member=" . $member);
?>

<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
   แก้ไขสมาชิกสำเร็จ สมาชิกคือ <?= $_POST["username"] ?>
</body>

</html>
