<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="addproduct.php" method="post" enctype="multipart/form-data">
        ชื่อสินค้า : <input type="text" name="pname"><br>
        รายละเอียดสินค้า : <br>
        <textarea name="pdetail" rows="3" cols="40"></textarea><br>
        ราคา: <input type="number" name="price"><br>
        รูปสินค้า: <input type="file" name="product_image" accept="image/*"><br>
        <input type="submit" value="เพิ่มสินค้า">
    </form>
</body>
</html>
