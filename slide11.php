<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM product");
    $stmt->execute();
    echo"<table border='1px solid black'>";
    echo"<tr>
    <th>รหัสสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>รายละเอียดสินค้า</th>
    <th>ราคา</th>
    </tr>";
    while ($row = $stmt->fetch()) {
    
    // echo "รหัสสินค้า: " . $row ["pid"] . "<br>";
    // echo "ชื่อสินค้า: " . $row ["pname"] . "<br>";
    // echo "รายละเอียดสินค้า: " . $row ["pdetail"] . "<br>";
    // echo "ราคา: " . $row ["price"] . " บาท <br>";
    // echo "<hr>\n";
    echo "<tr>".
    "<td>".$row ["pid"]."</td>".
    "<td>".$row ["pname"]."</td>".
    "<td>".$row ["pdetail"]."</td>".
    "<td>".$row ["price"]."</td>".
    "</tr>";
    }
    echo"</table>"
   
?>
</body>
</html>