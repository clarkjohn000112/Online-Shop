<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css ?v=<?php echo time(); ?>">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php include ('../partials/connection.php')?>
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			  $(".wrapper").toggleClass("active")
			})
		});
	</script>
</head>
<body>

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

	    <div class="container">
		<div class="item_wrap">
            
<?php 

if(isset($_GET['item_id']))
{
        $item_id = $_GET['item_id'];
        $sql = "SELECT * from item where id=$item_id";
        $res = mysqli_query($conn,$sql);
        $count= mysqli_num_rows($res);
        if($count==1)
        {
            $rows = mysqli_fetch_assoc($res);
            $title = $rows['title'];
            $description = $rows['description'];
            $price = $rows['price'];
        }
               
    }
    else{
        header("location:".SITEURL);
    }   

?>
<?php

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

else
{
	header("location:".SITEURL);
}

?>
<form action="" method="POST" class="order">
                <fieldset>
                

           
                    <div class="food-menu-desc">
                        <h3><?php echo $title?></h3>
                        <input type="hidden" name="item" value="<?php echo $title?>">
                        <p class="food-price">₱ <?php echo $price?></p>
                        <input type="hidden" name="price" value="<?php echo $price?>">
                        <input type="text" name="description" value="<?php echo $description?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" min="0" required>
                        <select name="size">
                         <?php
                         
                            $sql = "SELECT * FROM size";
                            $res=mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
					
							if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id=$rows['id'];
									$title=$rows['description'];
								?>
							<option value="<?php echo $id?>"><?php echo $title?></option>
							<?php	
							}
							}
							else{
                                ?>
								<option value="0">No Data Found</option>
                                <?php
							}
                            ?>
                        </select>
                       
                        <input type="text" name="name" value="<?php echo $name?>">
                     
                        <input type="text" name="contact" value="<?php echo $contact?>">
                     
                        <input type="text" name="email" value="<?php echo $email?>">
                       
                        <input type="text" name="address" value="<?php echo $address?>">
                        
                  
                    <br>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    $item = $_POST['item'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $description = $_POST['description'];
                    $size = $_POST['size'];
                    $status = "Ordered";
                    $order_date = date("Y-m-d h:i:	sa");
                    $customer_name = $_POST['name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                    $abs=abs($qty);

                    $sql2 = "INSERT INTO checkout set
                    item_name = '$item',
                    item_description= '$description',
                    prize = $price,
                    size='$size',
                    qty = $qty,
                    total = $total,
                    date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    ";
                    
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['order']="<div class='error'>Item Ordered</div>";
                        header("location:".SITEURL.'/register/index.php?user_id='.$user_id);
                    }
                    else
                    {
                        $_SESSION['order']="<div class='error'>Item Failed</div>";
                        
                    }
                }
            ?>
	    	
	    	
	    </div>
	</div>
</div>

</body>
</html>