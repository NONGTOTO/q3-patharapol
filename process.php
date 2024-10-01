<?php include "connect.php"; ?>

<?php
 
  

$stmt = $pdo->prepare("UPDATE member SET password=?, name=?, address=?, mobile=?, email=? WHERE username=?");


try{
$stmt->bindParam(1, $_POST["password"]); 
$stmt->bindParam(2, $_POST["name"]); 
$stmt->bindParam(3, $_POST["address"]); 
$stmt->bindParam(4, $_POST["mobile"]); 
$stmt->bindParam(5, $_POST["email"]); 
$stmt->bindParam(6, $_POST["username"]); 

$upload_dir = 'member_photo/';
$new_filename = $_POST["username"] . ".jpg"; 
$uploaded_file = $upload_dir . $new_filename;


$stmt->execute();
move_uploaded_file($_FILES["picture"]["tmp_name"], $uploaded_file);

// if ($stmt->execute()) {
//     echo "แก้ไขสมาชิก " . htmlspecialchars($_POST["name"]) . " สำเร็จ";
// } else {
//     echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล";
// }
echo "แก้ไข" . $_POST["username"] . " สำเร็จ";
}catch(Exception $e){
   echo "แก้ไข" . $_POST["username"] . " ไม่สำเร็จ";
}

?>
