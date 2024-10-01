<?php include "connect.php" ?>
<html>

<head>
    <meta charset="utf-8">
</head>
<?php
    $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
    $stmt->bindParam(1, $_GET["pid"]); 
    $stmt->execute(); 
    $row = $stmt->fetch(); 
?>
<div style="display:flex">
    <div>
    <img src='product_photo/<?= $row["pid"] ?>.jpg' width='200'>
    </div>
    <div style="padding: 15px">
        <h2><?= $row["pname"] ?></h2>
        รายละเอียดสนค้า ิ : <?= $row["pdetail"] ?><br>
        ราคาขาย <?= $row["price"] ?> บาท<br><br>
        ซอวันนี ื้ ลด ้ 10% เหลือ <?= $row["price"] * 0.9 ?> บาท
    </div>
</div>
</body>

</html>