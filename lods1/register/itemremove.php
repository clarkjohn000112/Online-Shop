<?php
include("../partials/connection.php");
session_start();
$uid = $_GET['user_id'];
$id=$_GET["key"];
$i=1;
$tt=explode(",", substr($_SESSION['cart'],1));

if(($keyids = array_search($id,$tt)) !== false){
    var_dump($tt);
    unset($tt[$keyids]);
    var_dump($tt);
    echo count($tt);
     if(count($tt)<1){
        $_SESSION['cart'] =implode(",", $tt);
     }
     else
          $_SESSION['cart'] =','.implode(",", $tt);
    header('refresh:0;url=http://localhost/lods1/register/cart.php?user_id='.$uid);
}

?>