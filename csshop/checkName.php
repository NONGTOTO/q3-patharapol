<?php

$conn = new mysqli("localhost", "Wstd28", "1BI19WgM");
if ($conn) {
	mysqli_select_db($conn, "sec1_28");
	mysqli_query($conn, "SET NAMES utf8");
} else {
	echo mysqli_errno($conn);
}

$sql = "SELECT username FROM member";
$objQuery = mysqli_query($conn, $sql);

$username = [];

while ($row = mysqli_fetch_assoc($objQuery)) {
	$username[] = $row["username"];
}
sleep(1);

if (!in_array( $_GET["username"], $username )) {
		echo "okay";
	
} else {
	echo "denied";
}
