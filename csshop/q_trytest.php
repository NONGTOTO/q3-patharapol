<?php include "../connect.php" ?>
<!doctype html>
<html lang="en">
<?php 
session_start(); // เริ่ม session


if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // เปลี่ยนเส้นทางไปยังหน้า login
    exit(); // ออกจาก script
}


?>
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
      <h1>Product</h1>
      <a href="logout.php">logout</a>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
      <article>
      <?php 
          /*
            if(isset($_SESSION["username"])){
               foreach($_SESSION["cart"] as $item){
                  echo "<div>";
                  echo $item["pname"];
                  echo " ";
                  echo $item["price"];
                  echo "<br>";

                  echo "คุณมีสิทธิเลือกสิ้นค้า";
                  echo "<br>";   

                  $stmt = $pdo->prepare("SELECT SELECT * FROM product WHERE price <= ?");
                  $stmt->bindParam(1, $item["price"]);
                  $stmt->execute();

                  $i = 0;

                  while($i < $item["qty"]){

                     $i++;
                  };

                  

                  echo "</div>";
               }
            }
            else{
               foreach($_SESSION["cart"] as $item){
                  echo "<div>";
                  echo $item["pname"];
                  echo $item["price"];
                  echo "</div>";
               }
            }
               */
         ?> 

<?php  
if (isset($_SESSION["username"])) { 
    foreach ($_SESSION["cart"] as $item) { 
      
         // กำจัดอักขระพิเศษจาก pname เพื่อใช้เป็น id
         $sanitizedPname = preg_replace('/[^a-zA-Z0-9]/', '', $item["pname"]);


        echo "<div>"; 
        echo $item["pname"] . "<br>" . "ราคา:" . $item["price"] . " จำนวน:" . $item["qty"] ."<br>";
        echo "<label>ใช้สิทธิหรือไม่ </label>";
        echo "<label>ใช้</label>";
        echo "<input type='radio' name='s' value='yes' onchange='handleRight(". json_encode($sanitizedPname) . ")'>";
        echo "<label >ไม่ใช้</label>";
        echo "<input type='radio' name='s' value='no' onchange='handleRight(". json_encode($sanitizedPname) . ")'>";
        echo "<br>";
        echo "คุณมีสิทธิเลือกสินค้าเพิ่มอีก 1 ชิ้นที่ราคาเท่ากันหรือน้อยกว่า จำนวน " . $item['qty'] . "ชิ้น" ."<br>"; 
   
        // ดึงรายการสินค้าที่มีราคาน้อยกว่าหรือเท่ากับ
        $stmt = $pdo->prepare("SELECT * FROM product WHERE price <= ?"); 
        $stmt->bindParam(1, $item["price"]); 
        $stmt->execute(); 
        $availableProducts = $stmt->fetchAll(); // ดึงข้อมูลทั้งหมด
      
        // แสดงสินค้าให้เลือก
        echo "<form method='post' id='select-free-product". $sanitizedPname ."'>";
        $i = 0;
        while ($i < $item['qty']) {
        echo "<select>";
        foreach ($availableProducts as $product) {
            
            echo "<option>". $product['pname'] ."</option>";
            
        }
        echo "</select>";
        echo "<br>";
        $i++;
      }
        echo "<input type='submit' name='select_free' value='เลือกรายการฟรี'>";
        echo "</form>";

        

        echo "</div>";
    }
} else {
   echo "<div>"; 
   
   $totalPrice = 0;

   foreach ($_SESSION["cart"] as $item) { 
      
      echo $item["pname"] . " " . "ราคา:" . $item["price"] . " จำนวน:" . $item["qty"] ."<br>";
      $totalPrice += $item['price'] * $item['qty'];

   }

 if($totalPrice > 500){

   
     
     echo "<label>ใช้สิทธิหรือไม่ </label>";
     echo "<label>ใช้</label>";
     echo "<input type='radio' name='s' value='yes' onchange='handleRight2()'>";
     echo "<label >ไม่ใช้</label>";
     echo "<input type='radio' name='s' value='no' onchange='handleRight2()'>";
     echo "<br>";
     echo "คุณมีสิทธิเลือกสินค้าเพิ่มอีก 1 ชิ้นที่ราคาเท่ากันหรือน้อยกว่า"; 


     // ดึงรายการสินค้าที่มีราคาน้อยกว่าหรือเท่ากับ
     $stmt = $pdo->prepare("SELECT * FROM product WHERE price <= ?"); 
     $stmt->bindParam(1, $item["price"]); 
     $stmt->execute(); 
     $availableProducts = $stmt->fetchAll(); // ดึงข้อมูลทั้งหมด
   
     // แสดงสินค้าให้เลือก
     echo "<form method='post' id='select-free-product'>";
     $i = 0;
     
     echo "<select>";
     foreach ($availableProducts as $product) {
         
         echo "<option>". $product['pname'] ."</option>";
         
     }
     echo "</select>";
     echo "<br>";
     $i++;
   
     echo "<input type='submit' name='select_free' value='เลือกรายการฟรี'>";
     echo "</form>";

     

    
 }
   echo "</div>";
}
?>
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