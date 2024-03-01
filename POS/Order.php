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

class Order
{
    function addOrderInfo()
    {
      ?>
      <form action="orderdb.php" method="post">
    <table border="1">
        <tr><td>Order Number</td><td><input name="o_no"><br></td></tr>
        <tr><td>Order Type</td><td><input name="o_type"><br></td></tr>
        <tr><td>Order Time</td><td><input name="o_time"><br></td></tr>
        <tr><td>Order Status</td><td><input name="o_status"><br></td></tr>
</table>
<input type="submit" value="submit">
</form>
    <?php
    }
    function cancelOrder()
    {
      ?>
        <form method="post" action="orderdb.php">
            <table border="1">
              <tr><td>Enter Order No:</td><td><input name="o_no"><br></td></tr>
            </table>
            <input type="submit" value="submit" name="cancel" class="button"> 
        </form>
      <?php
  
    }
}
    $order= new Order();

    ?>

    <form method="post">
    <input type="submit" value="Place Order" name="Add" class="button">
    <input type="submit" value="Cancel Order" name="Cancel" class="button">
  </form>
  <?php
  $count=0; 
  $count++;
  if(isset($_POST['Add']))
  {

    $order->addOrderInfo();
  }
  else if(isset($_POST['Cancel']))
      $order->cancelOrder();
?>
</body>
</html>