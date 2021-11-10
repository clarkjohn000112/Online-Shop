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
    $sql3 = "SELECT * from user where id=$user_id";
    $res3 = mysqli_query($conn,$sql3);
    $row3= mysqli_fetch_assoc($res3);
    $user_name = $row3['username'];
    $full_name = $row3['full_name'];
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
		            <a href="../login.php">
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
  
<link rel="stylesheet" type="text/css" href="../style.css">

    <div style="overflow-x:auto;">
<table>
        <tr>
            <th>Order ID</th>
            <th>Item</th>
            <th>Price</th>
           
            <th>Qty</th>
            <th>Size</th>
            <th>Total Price</th>
      
   
            <th>Customer Name</th>
            <th>Customer Contact</th>
          
            <th>Status</th>
        </tr>
        <?php 
            $sql = "SELECT * FROM checkout where customer_name='$full_name'";
            $res1=mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res1);

            if($res1==TRUE)
            {
                    
                    $yow = 1;
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res1)){
                            $id1=$rows['id'];
                            $item = $rows['item_name'];
                            $description = $rows['item_description'];
                            $qty = $rows['qty'];
                            $price = $rows['prize'];
                            $total=$rows['total'];
                            $order_date=$rows['date'];
                            $status=$rows['status'];
                            $customer_name=$rows['customer_name'];
                            $customer_contact=$rows['customer_contact'];
                            $customer_email=$rows['customer_email'];
                            $size=$rows['size'];
                            $customer_address=$rows['customer_address'];
                        ?>
                         <tr>
            <th><?php echo $yow++;?></th>
            <td><?php echo $item;?></td>
            <td><?php echo $price;?></td>
            <td><?php echo $qty;?></td>
            <td><?php echo $size;?></td>
            <td><?php echo $total;?></td>
            <td><?php echo $customer_name;?></td>
            <td><?php echo $customer_contact;?></td>
            <td><?php echo $status;?></td>
        </tr>
                    <?php	
                    }
                    }
                    else{
                        echo "NO DATA FOUND";
                    }
            }
        ?>
       
    </table>

<br>
    <h3>  Thankyou for you order. Please track your order here</h3>
  
</div>

    </div>


</body>
</html>