<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css ?v=<?php echo time(); ?>">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php include ('../partials/connection.php');?>
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			  $(".wrapper").toggleClass("active")
			})
		});
	</script>
</head>
<body>
    
<?php 

if(isset($_GET['user_id']))
{
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
?>

<div class="wrapper">
	
<div class="top_navbar">
		<div class="logo">
		<a href="index.php?user_id=<?php echo $user_id?>">SECRET SHOP</a>
		</div>
		<div class="top_menu">
			<div class="home_link">
				<a href="index.php?user_id=<?php echo $user_id?>">
					<span class="icon"><i class="fas fa-home"></i></span>
					<span>Home</span>
				</a>
			</div>
			<div class="right_info">
				<div class="icon_wrap">
					<div class="icon">

					<div class="user1"><h3>Welcome <?php echo $user_name?></h3></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main_body">
		
		<div class="sidebar_menu">
	        <div class="inner__sidebar_menu">
	        	
			<ul>
		          <li>
				  <a href="brand.php?user_id=<?php echo $user_id?>">
		              <span class="icon">
		              <span class="list">Brands</span>
		            </a>
		          </li>
		          <li>
				  <a href="item.php?user_id=<?php echo $user_id?>">
		              <span class="list">Collections</span>
		            </a>
		          </li>
		          <li>
				  <a href="cart.php?user_id=<?php echo $user_id?>">
		              <span class="list">My Cart</span>
		            </a>
		          </li>
				 
				  <li>
		            <a href="../logout.php">
		              <span class="list">Logout</span>
		            </a>
		          </li>
		        </ul>

		        <div class="hamburger">
			        <div class="inner_hamburger">
			            <span class="arrow">
			                <i class="fas fa-long-arrow-alt-left"></i>
			                <i class="fas fa-long-arrow-alt-right"></i>
			            </span>
			        </div>
			    </div>

	        </div>
	    </div>

<br>
    <div class="container">
<?php
session_start();
if(empty($_SESSION['cart'])){
      echo"<h1>There are no items in Cart</h>";
}else{
    if(isset($_GET['user_id']))
{
	$user_id = $_GET['user_id'];
	$sql3 = "SELECT * from user where id=$user_id";
	$res3 = mysqli_query($conn,$sql3);
    $count3= mysqli_num_rows($res3);
    if($count3==1){
    $row3 = mysqli_fetch_assoc($res3);
	$user_name = $row3['username'];
    $name = $row3['full_name'];
    $contact = $row3['contact'];
    $email = $row3['email'];
    $address = $row3['address'];
    }
}
    // var_dump($_SESSION['cart']);
    echo '
 
    <form method="POST" action ="savetoorder.php?user_id='.$user_id.'">
    <input type="hidden" name="name" value="'.$name.'">
                     
    <input type="hidden" name="contact" value="'.$contact.'">
 
    <input type="hidden" name="email" value="'.$email.'">
   
    <input type="hidden" name="address" value="'.$address.'">
    <table style="overflow-x:auto;" class="ordertables">
    <tr>
    <th>Item ID</th>
    <th>Item Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Size</th>
    
    <th>Action</th>
    </tr>';
    $i=1;
    $tt=explode(",", substr($_SESSION['cart'],1));
    foreach ($tt as $item)
    {
    $qry="select * from item where id=$item";
    $run=mysqli_query($conn,$qry);
    while ($rows=mysqli_fetch_array($run))
    {
          if ($i%2==0)
          {
                echo "<tr><td>";
          }
          else
          {      
                echo "<tr><td>";
          }
          $i++;      
          echo $rows["id"];
          echo "</td>";
          echo "<td>";
          echo'<input readonly type="text" name="title[]" size="30px"value="'.$rows["title"].'" size=5 style="text-align: center;">';
          echo "</td>";
          echo "<td>";
          echo '<input type="number" name="Quantity[]" value="1" size=5 style="text-align: center;"';
          echo "</td>";
          echo "<td>";
          echo '<input readonly type="number" name="price[]" value="'. $rows["price"].'" size=5 style="text-align: center;" disabled';
          echo "</td>";
          echo "<td>";
          echo"<select name='size[]'>";
               $sql = "SELECT * FROM size";
               $res=mysqli_query($conn, $sql);
               $count = mysqli_num_rows($res);
               if($count>0){
                   while($rows2=mysqli_fetch_assoc($res)){
                       $ids=$rows2['id'];
                       $title=$rows2['description'];

               echo"<option value='$ids'>$title</option>";
	
               }
               }
               else{

                   echo'<option value="0">No Data Found</option>';
               }
          echo'</select>';
         
          $ItemID=$rows["id"];
          echo "<td><a href='itemremove.php?key=$ItemID&&user_id=$user_id' class = 'modlink'>DELETE</a></td>";
           
    }
    }      
    }
    ?>
    </table>
    <br><br>
    <center>
    <input type="submit" class="btn-primary123" Value="Confirm Order"></button>
    </center>
    </form>
 