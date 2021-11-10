

<?php include ('partials/menu.php')?>
	 <div class="container">

        <h1>ORDER MANAGEMENT</h1><br><br><br>
       <?php 
	 		
	   ?><br><br><br><br>

           


       
        <?php
        	if(isset($_SESSION['upload'])){
        		echo $_SESSION['upload'];
        		unset($_SESSION['upload']);
        	}
        	if(isset($_SESSION['remove-failed'])){
        		echo $_SESSION['remove-failed'];
        		unset($_SESSION['remove-failed']);
        	}
        	if(isset($_SESSION['update-success'])){
        		echo $_SESSION['update-success'];
        		unset($_SESSION['update-success']);
        	}
        	if(isset($_SESSION['update-failed'])){
        		echo $_SESSION['update-failed'];
        		unset($_SESSION['update-failed']);
        	}
        ?>
       <div style="overflow-x:auto;">
        <table>
				<tr>
					<th>Order ID</th>
					<th>Food</th>
					<th>Price</th>
					<th>Qty</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                    <th>Customer Email</th>
                    <th>Customer Address</th>
                    <th>Action</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM tbl_order ";
					$res1=mysqli_query($conn, $sql);
					$count = mysqli_num_rows($res1);

					if($res1==TRUE)
					{
							
							$yow =1;
							if($count>0){
								while($rows=mysqli_fetch_assoc($res1)){
									$id=$rows['id'];
                                    $food = $rows['food'];
									$qty = $rows['qty'];
                                    $price = $rows['price'];
									$total=$rows['total'];
                                    $order_date=$rows['order_date'];
                                    $status=$rows['status'];
                                    $customer_name=$rows['customer_name'];
                                    $customer_contact=$rows['customer_contact'];
                                    $customer_email=$rows['customer_email'];
                                    $customer_address=$rows['customer_address'];
								?>
								 <tr>
					<th><?php echo $yow++;?></th>
					<td><?php echo $food;?></td>
                    <td><?php echo $qty;?></td>
                    <td><?php echo $price;?></td>
                    <td><?php echo $total;?></td>
					<td><?php echo $order_date;?></td>
                    <td><?php echo $status;?></td>
                    <td><?php echo $customer_name;?></td>
                    <td><?php echo $customer_contact;?></td>
                    <td><?php echo $customer_email;?></td>
                    <td><?php echo $customer_address;?></td>
					<td>
                    <a href="<?php echo SITEURL;?>/admin/update-order.php?id=<?php echo $id;?>" class="btn-primary">Edit Order</a>
                    <a href="<?php echo SITEURL;?>/admin/delete-order.php?id=<?php echo $id;?>" class="btn-primary">Delete Order</a>
					
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


		</div>
	</div>
	<?php include ('partials/footer.php')?>