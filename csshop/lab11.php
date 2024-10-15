<?php include "../connect.php" ?>
<!doctype html>
<?php 
session_start(); // เริ่ม session

// ตรวจสอบว่าผู้ใช้ได้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // เปลี่ยนเส้นทางไปยังหน้า login
    exit(); // ออกจาก script
}

// ส่วนที่เหลือของโค้ดใน index.php จะอยู่ที่นี่
?>
<html lang="en">
<script>
	var xmlHttp;

	function checkUsername() {
		document.getElementById("username").className = "thinking";
		
		xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = showUsernameStatus;
		
		var username = document.getElementById("username").value;
		var url = "checkName.php?username=" + username;
		xmlHttp.open("GET", url);
		xmlHttp.send();
	}

	function showUsernameStatus() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			if (xmlHttp.responseText == "okay") {
				document.getElementById("username").className = "approved";

			} else {
				document.getElementById("username").className = "denied";
				document.getElementById("username").focus();
				document.getElementById("username").select();
			}
		}
	}
</script>
<script>
      function send() {
        request = new XMLHttpRequest();
        request.onreadystatechange = showResult;
        var keyword = document.getElementById("keyword").value;
        var url = "memberTable.php?keyword=" + keyword;
        request.open("GET", url, true);
        request.send(null);
      }
      function showResult() {
        if (request.readyState == 4) {
          if (request.status == 200)
            document.getElementById("result").innerHTML = request.responseText;
        }
      }
    </script>
  <head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
  </head>

  <body>

    <header>
      <div class="logo">
        <img src="cslogo.jpg" width="200" alt="Site Logo">
      </div>
      <h1>Lab 11</h1>
      <a href="logout.php">logout</a>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
    <article>
    <form>
        <h1>Lab11.1</h1>
		<h1>Please register:</h1>
		Username:<input id="username" type="text" onblur="checkUsername()"><br>
		First Name:<input type="text" name="firstname"><br> 
		Last Name:<input type="text" name="lastname"><br> 
		Email:<input type="text" name="email"><br> 
		<input type="submit" value="Register">
	</form>
    <h1>Lab11.2</h1>
    <input type="text" id="keyword" onkeyup="send()" />
    <div id="result"></div>
      </article>
      <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">
          <li class="dead"><a>Home</a></li>
          <li><a href="member.php">All member</a></li>
          <li><a href="product.php">Table of All Products</a></li>
          <li><a href="deletemem.php">delete member</a></li>
          <li><a href="insertmem.php">Insert member</a></li>
          <li><a href="searchmem.php">Search member</a></li>
          <li><a href="productpic.php">ALL product pic</a></li>
          <li><a href="editproduct.php">Edit product</a></li>
          <li><a href="addproduct.php">Add product</a></li>
          <li><a href="deleteproduct.php">Delete product</a></li>
          <li><a href="workshopsql.php">lab7workshopsql</a></li>
          <li><a href="lab10.php">lab10</a></li>
          <li><a href="lab10order.php">lab10order</a></li>
          <li><a href="lab10cart.php">lab10cart</a></li>
          <li><a href="lab10detail.php">lab10detail</a></li>
          <li><a href="lab11.php">lab11</a></li>
          <li><a href="lab12.php">lab12</a></li>
        </ul>
      </nav>
     
  </body>
</html>