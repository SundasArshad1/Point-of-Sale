<html>
  <head>
    <style>
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

class Customer
{
    function addCustomerInfo()
    {
      ?>
      <form method="post" action="cusdb.php">
      <table border="1">
          <tr><td>Customer Name</td><td><input name="c_name"><br></td></tr>
          <tr><td>Customer CNIC</td><td><input name="c_cnic"><br></td></tr>
          <tr><td>Customer Address</td><td><input name="c_add"><br></td></tr>
          <tr><td>Phone Number</td><td><input name="c_no"><br></td></tr>
      </table>
      <input type="submit" value="Add">
      </form>
    <?php
    }
}
    $cus= new Customer();

    ?>

    <form method="post">
    <input type="submit" value="Customer Info" name="Add" class="button">
  </form>
  <?php
  $count=0; 
  $count++;
  if(isset($_POST['Add']))
  {
    $cus->addCustomerInfo();
  }
?>
</body>
</html>