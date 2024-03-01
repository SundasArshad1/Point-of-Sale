<?php
        $dsn = "mysql:dbname=pos_db";
        $username = "root";
        $password = "";
    
        try 
        {
        $conn = new PDO( $dsn, $username, $password );
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        echo "Successfull Connection";
        } 
        catch ( PDOException $e ) 
        {
        echo "Connection failed: " . $e->getMessage();
        }
        
        
        if(isset($_POST["submitButton"]))
        {
            $dish_id=$_POST["d_id"];
            $dish_name=$_POST["d_name"];
            $dish_price=(float)$_POST["d_price"];
            $dish_qty=(int)$_POST["d_qty"];
            $dish_type=$_POST["d_type"];
    
            $sql = "INSERT INTO dish(Dish_Id,Dish_Name, Dish_Price, Dish_Quantity, Dish_Type) VALUES ('$dish_id','$dish_name',$dish_price,$dish_qty,'$dish_type')";
            try 
            {
              $rows = $conn->query( $sql );
              echo " Data inserted successfully";
            }
    
            catch ( PDOException $e ) 
            {
              echo "Query failed: " . $e->getMessage();
            }
        }
       else if(isset($_POST["update"]))
       {
            echo "In update";
            $dish_id=$_POST["d_id"];
            $dish_price=floatval($_POST["d_price"]);
        
             $sql = "UPDATE `dish` SET `Dish_Price`='$dish_price' WHERE Dish_Id='$dish_id'";
             try 
             {
               $rows = $conn->query( $sql );
               echo " Updated successfully";
             }
         
             catch ( PDOException $e ) 
             {
               echo "Query failed: " . $e->getMessage();
             }
       }

       else if(isset($_POST["remove"]))
       {
        echo "In Remove";
        $dish_id=$_POST["d_id"];
        $sql = "DELETE FROM `dish` WHERE Dish_Id='$dish_id'";
        try 
             {
               $rows = $conn->query( $sql );
               echo " Removed successfully";
             }
         
             catch ( PDOException $e ) 
             {
               echo "Query failed: " . $e->getMessage();
             }
       }
?><a href="Main.html">Back</a>