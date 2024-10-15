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
        async function getDataFromAPI() {
            let response = await fetch('http://202.44.40.193/~aws/JSON/priv_hos.json')
            let rawData = await response.text()
            let objectData = JSON.parse(rawData)

            let result = document.getElementById('result')


            for (let i = 0; i < objectData.features.length; i++) {
               console.log(objectData.features[i].properties.num_bed);
               if(objectData.features[i].properties.num_bed >= 91){
                  let Large_hos = document.getElementsByClassName('Large')[0];

                  let content = 'ชื่อโรงบาล' + objectData.features[i].properties.name + "(" + objectData.features[i].properties.num_bed + " เตียง)";

                  let div = document.createElement('div');
                  div.innerHTML = content;
                  Large_hos.appendChild(div);
               }
               else if(objectData.features[i].properties.num_bed >= 31){
                  let Medium_hos = document.getElementsByClassName('Medium')[0];

                  let content = 'ชื่อโรงบาล' + objectData.features[i].properties.name + "(" + objectData.features[i].properties.num_bed + " เตียง)";

                  let div = document.createElement('div');
                  div.innerHTML = content;
                  Medium_hos.appendChild(div);
               }
               else{
                  let Small_hos = document.getElementsByClassName('Small')[0];

                  let content = 'ชื่อโรงบาล' + objectData.features[i].properties.name + "(" + objectData.features[i].properties.num_bed + " เตียง)";

                  let div = document.createElement('div');
                  div.innerHTML = content;
                  Small_hos.appendChild(div);
               }

                
            }
        }

        getDataFromAPI() 
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
      <h1>Lab12</h1>
      <a href="logout.php">logout</a>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
    <article>
    <h1>โรงพยาบาลเอกชนใน กทม.</h1>

    <div class="Large"><h2>โรงพยาบาลขนาดใหญ่</h2></div>
    <div class="Medium"><h2>โรงพยาบาลขนาดกลาง</h2></div>
    <div class="Small"><h2>โรงพยาบาลขนาดเล็ก</h2></div>
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
          <li><a href="q_trytest.php">testquiz4</a></li>
        </ul>
      </nav>
     
  </body>
</html>