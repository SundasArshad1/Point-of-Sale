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
            $order_no=$_POST["o_no"];
            $order_type=$_POST["o_type"];
            $order_time=$_POST["o_time"];
            $order_status=$_POST["o_status"];
        
            $sql = "INSERT INTO food_order(Order_No, Order_Type, Order_Time, Order_Status) VALUES ('$order_no','$order_type','$order_time','$order_status')";
            try {
              $rows = $conn->query( $sql );
              echo " Data inserted successfully";
            }
    
            catch ( PDOException $e ) 
            {
              echo "Query failed: " . $e->getMessage();
            }
        }
        else if(isset($_POST["cancel"]))
       {
        echo "Order Cancelled";
        $dish_id=$_POST["o_no"];
        $sql = "DELETE FROM `order` WHERE Order_No='$order_no'";
        try 
             {
               $rows = $conn->query( $sql );
               echo " Cancelled successfully";
             }
         
             catch ( PDOException $e ) 
             {
               echo "Query failed: " . $e->getMessage();
             }
       }
?>
<br><a href="dishproducts.php">Select Items</a></br>
<a href="Main.html">Back</a>