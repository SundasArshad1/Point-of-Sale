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
            $cus_name=$_POST["c_name"];
            $cus_cnic=$_POST["c_cnic"];
            $cus_add=$_POST["c_add"];
            $cus_no=$_POST["c_no"];
        
            $sql = "INSERT INTO customer(Customer_Name, Customer_CNIC, Customer_Address, Customer_Phone_no) VALUES ('$cus_name','$cus_cnic','$cus_add','$cus_no')";
            try {
              $rows = $conn->query( $sql );
              echo " Data inserted successfully";
            }
    
            catch ( PDOException $e ) 
            {
              echo "Query failed: " . $e->getMessage();
            }
        }
?><a href="Main.html">Back</a>