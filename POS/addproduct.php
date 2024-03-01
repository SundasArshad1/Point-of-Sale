<?php session_start();?>
<html>
<head>
<style>
*{ font-size:18pt;
color:#331155;}
</style></head>
<body>
<br>
<center>
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
<?php
if (!isset($_SESSION["count"]))
$_SESSION["count"]=0;

 //Reset
 //---------------------------
 //Add
 if ( isset($_GET["Dish_ID"]) )
   {

      $id= $_GET["Dish_ID"];
      $i=$_SESSION["count"]; 
      $price=$_GET["Dish_Price"];
   
      $name=$_GET["Dish_name"];
      $flag=false;
      for($i=0;$i<$_SESSION["count"];$i++)
        if ($_SESSION["Dish_ID"][$i]=== $id)
        { 
          $_SESSION["Dish_Quantity"][$i]++;
          echo "Quantity: ". $_SESSION["Dish_Quantity"][$i]."<br/>";
          $_SESSION["Dish_Price"][$i] = $_SESSION["Dish_Quantity"][$i]*$price;
          echo "Price".$_SESSION['Dish_Price'][$i]."<br/>";
          echo "The quantity of the product is increased";
          $flag=true;
    }
      if ($flag===false)
      {
      $_SESSION["Dish_Name"][$i] = $name;
      $_SESSION["Dish_ID"] [$i]= $id;
      $_SESSION["Dish_Price"][$i] = $price;
      $_SESSION["Dish_Quantity"][$i]=1;
      $_SESSION["count"]++;
      echo "<br>Product added to Cart successfully<br>";
      echo "No of products in cart ".$_SESSION["count"];
  }
 }

 echo "<table border='1' class='table'><tr><td>Item</td><td> Product ID</td><td>Product name</td><td> Price</td><td>Quantity</td><td>Remove</td></tr>";
 $sum=0;
 
 for($i=0;$i<sizeof($_SESSION['Dish_ID']);$i++)
 {
 echo "<td>".$_SESSION['Dish_ID'][$i]."</td>";
 echo  "<td>".$_SESSION["Dish_Name"][$i]."</td>";
 echo "<td>".$_SESSION["Dish_Price"][$i]."</td>";
 echo "<td>".$_SESSION["Dish_Quantity"][$i]."</td>"; 
 echo "<td><a href=remove.php?Dish_ID=".$i.">Remove</a></td></tr>";
 $sum=$sum+$_SESSION["Dish_Price"][$i];
 
 }
 echo "</table>";
 echo " <b>Total amount  ".$sum;

 ?>
 <br><a href="dishproducts.php">GO BACK</a></br>
 <br><a href="destroy.php">DESTROY CART</a>



