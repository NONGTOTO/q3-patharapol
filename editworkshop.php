<?php include "connect.php" ?>
<?php



    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]); 
    $stmt->execute(); 
    $row = $stmt->fetch(); 
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <form action="process.php" method="post"enctype="multipart/form-data"> 
        <input type="hidden" name="username" value="<?=$row["username"]?>">
        รหัสผ่าน :<input type="password" name="password" value="<?=$row["password"]?>"><br>
        ชื่อ: <input type="text" name="name" value="<?=$row["name"]?>"><br>
        ที่อยู่: <input type="text" name="address" value="<?=$row["address"]?>"><br>
        เบอร์โทรศัพท์: <input type="tel" name="mobile" value="<?=$row["mobile"]?>"><br> 
        Email: <input type="email" name="email" value="<?=$row["email"]?>"><br>
        
      <label for="picture">รูปภาพสมาชิก: </label>
      <input type="file" name="picture" ><br>
        <input type="submit" value="add">
    </form>
</body>

</html>
