<?php
include("../partials/connection.php");
if(isset($_GET['user_id']))
{
	session_start();
	$user_id = $_GET['user_id'];
	$sql3 = "SELECT username from user where id=$user_id";
	$res3 = mysqli_query($conn,$sql3);
	$row3= mysqli_fetch_assoc($res3);
	$user_name = $row3['username'];
	
}
else
{
	header("location:".SITEURL);
}
$uid=$_GET['user_id'];
$tt=explode(",", substr($_SESSION['cart'],1));
$qty=$_POST['Quantity'];
$prc=$_POST['price'];
$size=$_POST['size'];
$item = $_POST['title'];
$customer_name = $_POST['name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];
                $status = "Ordered";
                $order_date = date("Y-m-d h:i:	sa");
$total=0;

$billAmt=0;


// if($res1==TRUE)
// {
        
//         $yow = 1;
//             while($rows=mysqli_fetch_assoc($res1)){
//                 $description = $_POST['description'];
//                 $size = $_POST['size'];
          
                
//                 // $abs=abs($qty);
            
//         }    
    //    var_dump($res1);
    //     var_dump($rows);
//         echo"<br>";
//         var_dump($uid);
//         echo"<br>";
//         var_dump($qty);
//         echo"<br>";
//         var_dump($prc);
//         echo"<br>";
//         var_dump($description);
//         echo"<br>";
//         var_dump($status);
//         echo"<br>";
//         var_dump($order_date);
//         echo"<br>";
//         var_dump($customer_name);
//         echo"<br>";
//         var_dump($customer_contact);
//         echo"<br>";
//         var_dump($customer_email);
//         echo"<br>";
//         var_dump($customer_address);
//     }
// while ($rows=mysqli_fetch_array($res1))
//       {
//                   $oid=$rows[0]+1;
//       }
      $cnt =0;
for($cnt=0;$cnt<count($qty);$cnt++)  {
      if($qty[$cnt] <= 0 ){
            echo '<script> alert("Quantity is Invalid");</script>';
      header('refresh:0;cart.php?user_id='.$uid);
      die("header:cart.php?user_id='.$uid.'");
      }
      else{
            continue;
      }
}       
$description = array();
for($cnt=0;$cnt<count($qty);$cnt++){
    $sql = 'SELECT description FROM item where id = '.$tt["$cnt"].'';
$res1=mysqli_query($conn, $sql);
$count = mysqli_num_rows($res1);
while($rows = mysqli_fetch_assoc($res1)){
    $description[]=$rows['description'];
}
}
for($cnt=0;$cnt<count($qty);$cnt++)
{     
    $sql2 = "INSERT INTO checkout set
    item_name = '".$item[$cnt]."',
    item_description= '".$description[$cnt]."',
    prize = ".$prc["$cnt"].",
    size=".$size["$cnt"].",
    qty = ".$qty["$cnt"].",
    total = ".$qty["$cnt"]*$prc["$cnt"].",
    date = '$order_date',
    status = '$status',
    customer_name = '$customer_name',
    customer_contact = '$customer_contact',
    customer_email = '$customer_email',
    customer_address = '$customer_address'
    ";
    $res2 = mysqli_query($conn, $sql2);
    var_dump($sql2);
     if($res2==true)
     {
        $_SESSION['order']="<div class='error'>Item Ordered</div>";
         header("location:".SITEURL.'/register/receipt.php?user_id='.$uid);
     }
     else
    {
        $_SESSION['order']="<div class='error'>Item Failed</div>";
    }
}

// $qry="Insert into orderdetails(orderid,date,user,price) values ($oid,'".date("Y/m/d")."','".$nam."',$billAmt)";
// if (mysqli_query($con,$qry)==TRUE)
// {
//       echo '<script> alert("Order Placed Successful: Your Order ID is: '.$oid.' and a total of '.$billAmt.' Pesos to be paid! Thank you for using Interim2 Food Service!");</script>';
//       header('refresh:0;url=dashboard.php');
// }
// else
// {
//       echo '<script> alert("Please try again");</script>';
//       header('refresh:0;url=dashboard.php');
// }
?>