<?php include "connect.php" ?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM product");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        // แสดงผล HTML และ PHP ให้ทำงานสอดคล้องกัน
        ?>
        <div class="product-photo">
            <img src='product_photo/<?= $row["pid"] ?>.jpg' width='100'><br>
        </div><br>
        <?php
        // ใช้ echo สำหรับแสดงข้อมูล
        echo "รหัสสินค้า : " . $row["pid"] . "<br>";
        echo "ชื่อสินค้า : " . $row["pname"] . "<br>";
        echo "รายละเอียดสินค้า : " . $row["pdetail"] . "<br>";
        echo "ราคา: " . $row["price"] . " บาท <br>";
        echo "<a href='editfromproduct.php?pid=" . $row["pid"] . "'>แก้ไข</a>";
        echo "<hr>\n";
    }
    ?>
</body>

</html>
