<html>
  <head>
    <style>
     .menu 
     {
      margin-top:100px;
      height:20%;
      width:100%;
     } 

    .table
    {
      width:60%;
    }

      .button {
  position: relative;
  background-color: #4CAF50;
  border: none;
  font-size: 28px;
  color: #FFFFFF;
  padding: 20px;
  width: 200px;
  text-align: center;
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.button:after {
  content: "";
  background: #f1f1f1;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}
    </style>
</head>
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
<?php

class Dish
{
  function addDish()
  {
    ?>
      <form method="post" action="dishdb.php">
        <table border="1">
            <tr><td>Dish Id:</td><td><input name="d_id"><br></td></tr>
            <tr><td>Dish Name</td><td><input name="d_name"><br></td></tr>
            <tr><td>Dish Price</td><td><input name="d_price"><br></td></tr>
            <tr><td>Dish Quantity</td><td><input name="d_qty"><br></td></tr>
            <tr><td>Dish Type</td><td><input name="d_type"><br></td></tr>
          
        </table>
        <input type="submit" name="submitButton" id="submitButton" value="Send Details" />
      </form>
    <?php
    }


  
  function updateDish()
  {
    ?>
    <form method="post" action="dishdb.php">
        <table border="1">
        <tr><td>Enter Dish Id:</td><td><input name="d_id"><br></td></tr>
          <tr><td>Dish Price</td><td><input name="d_price"><br></td></tr> 
           
        </table>
        <input type="submit" value="submit" name="update"> 

    </form>
    <?php
  }

  function removeDish()
  {
    ?>
      <form method="post" action="dishdb.php">
          <table border="1">
            <tr><td>Enter Dish Id:</td><td><input name="d_id"><br></td></tr>
          </table>
          <input type="submit" value="submit" name="remove" class="button"> 
      </form>
    <?php

  }
}
    $dish= new Dish();

    ?>
<div class="menu">
    <form method="post">
    <input type="submit" value="Add Dish" name="Add" class="button">
    <input type="submit" value="Update Dish" name="update" class="button">
    <input type="submit" value="Remove Dish" name="remove" class="button">
  </form>
</div>
<div class="table">
  <table border="1" width="100%">
    <?php
    echo "<tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Dish Price</th>
    <th>Dish Quantity</th>
    <th>Dish Type</th>
    </tr>";
  foreach ( $rows as $row )
 {
  echo "<tr>
  <td>".$row['Dish_Id']."</td>
  <td>".$row['Dish_Name']."</td>
  <td>".$row['Dish_Price']."</td>
  <td>".$row['Dish_Quantity']."</td>
  <td>".$row['Dish_Type']."</td></tr>";
  }
  ?>
  </table>
</div> 
  <?php
  $count=0; 
  $count++;
  if(isset($_POST['Add']))
  {
    $dish->addDish();
  }
  
  else if(isset($_POST['update']))
      $dish->updateDish();
  else if(isset($_POST['remove']))  
      $dish->removeDish();
    

?>
</body>
</html>