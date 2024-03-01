<?php session_start();?>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
h1{ font-size:22pt;
color:#332255;
 font-family: 'Brush Script MT', cursive;}
td{
font-family: 'Trebuchet MS', sans-serif;}
.product{
text-align:center;
width:200px;
height:200px;
border:thin;
border-width:2px;
border-style:solid;
border-color:black;

}
</style></head>
<body>
    <?php 
       $dsn = "mysql:dbname=pos_db";
       $username = "root";
       $password = "";
       try {
           $conn = new PDO( $dsn, $username, $password );
           $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
         } catch ( PDOException $e ) {
           echo "Connection failed: " . $e->getMessage();
         }
         $sql="SELECT* from dish";
         try {
           $rows = $conn->query( $sql );
           } catch ( PDOException $e ) {
           echo "Query failed: " . $e->getMessage();
         }
    ?>
<center>
<br>
<h1>E-SHOP</h2>
<br>
<table border="1">
  <?php  
  
      $num=0;
  foreach ( $rows as $row ) {
    if($num%4===0)
    {
     echo "<div class='row'><div class='col-md-3'>
     <h1>".$row['Dish_Name']."</h1>
     <p>Price:  ".$row['Dish_Price']."</p>";
     
     $data=array("Dish_name"=>$row['Dish_Name'],"Dish_Price"=>$row['Dish_Price'],"Dish_ID"=>$row['Dish_Id']);
     ?>
     <br><a href='addproduct.php?<?php echo htmlspecialchars(http_build_query($data)) ?>'>Add Product</a><?php
     echo "</div>";
     $num++;
    }
    else
    {
     echo "<div class='col-md-3'>
     <h1>".$row['Dish_Name']."</h1>
     <p>Price:  ".$row['Dish_Price']."</p>";
     $data=array("Dish_name"=>$row['Dish_Name'],"Dish_Price"=>$row['Dish_Price'],"Dish_ID"=>$row['Dish_Id']);?>
     <br><a href='addproduct.php?<?php echo htmlspecialchars(http_build_query($data)) ?>'>Add Product</a><?php
     $num++;
     echo "</div>";
    }
}
    ?>
</table>
</body>
</html>
