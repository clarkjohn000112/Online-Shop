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
           if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql2="SELECT * from checkout WHERE id=$id";
                            $res=mysqli_query($conn, $sql2);
                            $rows=mysqli_fetch_assoc($res);

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
                        }
                        
                        else{
                            header("location:".SITEURL.'/admin/manage-order.php');
                        }
        ?>


        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
  
            
                <tr>
                    <th>Item: </th>
                    <td>
                    <b><?php echo $item?></b>
                    </td>
                </tr>
                <tr>
                    <th>Price: </th>
                    <td>
                       <b><?php echo $price?></b>
                    </td>
                </tr>
                <tr>
                    <th>Quantity: </th>
                    <td>
                        <input type="number" name="qty"min="0" value="<?php echo $qty?>">
                    </td>
            </tr>     
            <tr>
                    <th>Status: </th>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";}?>value="Ordered"> Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";}?>value="On Delivery">On Delivery </option>
                            <option <?php if($status=="Delivered"){echo "selected";}?>value="Delivered"> Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";}?>value="Cancelled"> Cancelled</option>
                        </select>
                    </td>
            </tr> 
            <tr>
            <th>Size: </th>
            <td>
            <select name="size">
                         <?php
                         
                            $sql = "SELECT * FROM size";
                            $res=mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
					
							if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id1=$rows['id'];
									$title=$rows['description'];
								?>
							<option value="<?php echo $id1?>"><?php echo $title?></option>
                            
							<?php
							}
							}
							else{
                                ?>
								<option value="0">No Data Found</option>
                                <?php
							}
                            ?>
                        </select></td>
            </tr>   
   
             <tr>
                    <th>Customer Name: </th>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name?>">
                    </td>
            </tr>  
            <tr>
                    <th>Customer Contact: </th>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact?>">
                    </td>
            </tr>    
            <tr>
                    <th>Customer Email: </th>
                    <td>
                        <input type="text" name="customer_email"  size="40" value="<?php echo $customer_email?>">
                    </td>
            </tr>    
            <tr>
                    <th>Customer Address: </th>
                    <td>
                        <input type="text" name="customer_address"  size="50" value="<?php echo $customer_address?>"> 
                    </td>
            </tr>    
               
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="price" value="<?php echo $price;?>">
               
                        <input type="submit" name="submit" value="Update" class="btn btn-primary12">
                    </td>
                </tr>
                
            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {   $id1 = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $size = $_POST['size'];
                $status = $_POST['status'];
                $order_date = date("Y-m-d h:i:	sa");
                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];
                $abs=abs($qty);

               
                    $sql3 = "UPDATE checkout set
                    size='$size',
                    qty = $qty,
                    total = $total,
                    date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    where id=$id";

                    $res3=mysqli_query($conn,$sql3);

                    if($res3==TRUE){
                    $_SESSION['update-success']="<div class='error'> Update Successfully</div>";
                      echo '<script type="text/javascript">
                   location.replace("ordermanage.php");
                 </script>';
                    }
                    else{
                     $_SESSION['update-failed']="<div class='error'> failed to replace current image</div>";
                     echo '<script type="text/javascript">
                     location.replace("ordermanage.php");
                   </script>';
                    }


        }
        ?>

<?php include ('../partials/footer.php')?>
    </div>





        </div>
        </div>
	    	
	    </div>
	</div>
</div>
	

</body>
</html>