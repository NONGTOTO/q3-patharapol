<?php include "connect.php" ?>
<html>

<head>
    <meta charset="utf-8">
    <script>
        function confirmDelete(username) { 
            var ans = confirm("ต้องการลบusername " + username); 
            if (ans == true) 
                document.location = "deleteworkshop6.php?username=" + username; 
        }
    </script>
</head>

<body>
<?php
$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();

while ($row = $stmt->fetch()) {
    
    ?>
        <div class="member-photo">
                <img src='member_photo/<?= $row["username"] ?>.jpg' width='100'><br>
            </div><br>
        
        <?php
        echo "username: " . $row["username"] . "<br>";
        echo "ชื่อ: " . $row["name"] . "<br>";
        echo "ที่อยู่: " . $row["address"] . "<br>";
        echo "email: " . $row["email"] . "<br>";
        echo "เบอร์โทรศัพท์: " . $row["mobile"] . "<br>";
        ?>
       
        <a href='editworkshop.php?username=<?= $row["username"] ?>'>แก้ไข</a> | 
        <a href='#' onclick='confirmDelete("<?= $row["username"] ?>")'>ลบ</a>
        <hr>
    </div>
    <?php
}
?>

</body>

</html>