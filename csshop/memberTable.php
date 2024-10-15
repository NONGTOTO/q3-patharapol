<?php
$keyword = $_GET["keyword"];
$conn = new mysqli("localhost", "Wstd28", "1BI19WgM");

if ($conn) {
	mysqli_select_db($conn, "sec1_28");
	mysqli_query($conn, "SET NAMES utf8");
} else {
	echo mysqli_errno($conn);
}
$sql = "SELECT * FROM member WHERE name LIKE '%$keyword%'";
$objQuery = mysqli_query($conn,$sql);
?>

<table border="1">
   <?php while ($row = mysqli_fetch_array($objQuery)): ?>
      <tr>
         <td><a href="memberDetail.php?username=<?php echo $row["username"] ?>"></a></td>
         <td><?php echo $row["name"] ?></td>
         <td><img src="../member_photo/<?php echo $row['username']; ?>.jpg" width="100"></td>
         <td><?php echo $row["address"] ?></td>
         

      </tr>
   <?php endwhile; ?>
</table>