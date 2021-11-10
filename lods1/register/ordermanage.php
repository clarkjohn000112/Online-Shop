<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
			<a href="index.html">SECRET SHOP</a>
		</div>
		<div class="top_menu">
			<div class="home_link">
				
				
			</div>
			
		
					<div class="home_link">
						<a href="../login.php">
							<span class="icon"></span>
							<span>Log-out Admin Account</span>
						</a>
						
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
		            <a href="adminmanage.php" >
		              <span class="icon">
		              <span class="list">Admin</span>
		            </a>
		          </li>
		          <li>
		            <a href="brandmanage.php" >
		              <span class="list">Brands</span>
		            </a>
		          </li>
		          
		          <li>
		            <a href="itemmanage.php">
		              <span class="list">Items</span>
		            </a>
		          </li>

                  <li>
		            <a href="ordermanage.php"  class="active">
		             
		              <span class="list">Order</span>
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
        <?php include ('../partials/connection.php')?>
<link rel="stylesheet" type="text/css" href="../style.css">



<h1>ORDER MANAGEMENT</h1><br><br><br>
<?php 
     
?><br><br><br><br>

<?php 
       
       if(isset($_SESSION['update-success'])) {
          echo "<span  class='msg'>" .$_SESSION['update-success']. "</span>";
           unset($_SESSION['update-success']);
       } 
     
      if(isset($_SESSION['add-success'])) {
          echo "<span  class='msg'>" .$_SESSION['add-success']. "</span>";
          unset($_SESSION['add-success']);
      } 
   
      if(isset($_SESSION['delete-success'])) {
          echo "<span  class='msg'>" .$_SESSION['delete-success']. "</span>";
          unset($_SESSION['delete-success']);
      } 
      
      if(isset($_SESSION['update-failed'])) {
          echo "<span  class='msg1'>" .$_SESSION['update-failed']. "</span>";
          unset($_SESSION['update-failed']);
      }
     
      if(isset($_SESSION['add-failed'])) {
          echo "<span  class='msg1'>" .$_SESSION['add-failed']. "</span>";
         unset($_SESSION['add-failed']);
     }  
     
      if(isset($_SESSION['delete-failed'])) {
          echo "<span  class='msg1'>" .$_SESSION['delete-failed']. "</span>";
         unset($_SESSION['delete-failed']);
     } 
 ?><br><br><br><br>
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
          
            <th>Action</th>
        </tr>
        <?php 
            $sql = "SELECT * FROM checkout ";
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
     
            <td>
            <a href="<?php echo SITEURL;?>/register/orderupdate.php?id=<?php echo $id1;?>" class="btn-primary">Edit Order</a>
            <a href="<?php echo SITEURL;?>/register/orderdelete.php?id=<?php echo $id1;?>" class="btn-primary12">Delete Order</a>
            </td>
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
    <?php include ('../partials/footer.php')?>

</div>



	    
        </div>
	    	
	    </div>
	</div>
</div>
	

</body>
</html>