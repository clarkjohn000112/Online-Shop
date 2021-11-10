<?php
      session_start();
      $uid=$_GET['user_id'];
      $dd=$_GET['item_id'];
      $_SESSION['cart']= $_SESSION['cart'].','.$dd;
      echo "<script>alert('ITEM NUMBER: ".$dd." added');</script>";
      var_dump($_SESSION['cart']);
       header('refresh:0;url=http://localhost/lods1/register/item.php?user_id='.$uid);
 ?>