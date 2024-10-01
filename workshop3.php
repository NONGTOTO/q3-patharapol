<?php include "connect.php" ?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute(); 
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
           
            <div class="member-container" style="margin-bottom: 20px;"> 
                <div class="member-info" style="padding: 10px;">
                    ชื่อสมาชิก: <?= $row["name"] ?><br>
                    ที่อยู่: <?= $row["address"] ?><br>
                    อีเมล์: <?= $row["email"] ?><br>
                </div>
            </div>
            <div class="member-photo">
                <img src='member_photo/<?= $row["username"] ?>.jpg' width='100'><br>
            </div>
            
        <?php endwhile; ?>
    </div>
</body>

</html>
