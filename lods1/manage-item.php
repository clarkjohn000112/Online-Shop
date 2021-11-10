

<?php include ('partials/menu.php')?>
<link rel="stylesheet" type="text/css" href="style.css">
	<div class="container">


        <h1>ITEM MANAGEMENT</h1><br><br><br>
       <?php 
	 		
	   ?><br><br><br><br>

           


        <a href="add-item.php" class="btn-primary">ADD ITEM</a><br><br><br>

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
       
        <table>
				<tr>
					<th>Item ID</th>
					<th>Title</th>
					<th>Image</th>

					<th>Description</th>
					<th>Price</th>
                    <th>Category ID</th>
                    <th>Displayed</th>
                    <th>Live</th>
                    <th>Actions</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM item";
					$res=mysqli_query($conn, $sql);
					$count = mysqli_num_rows($res);

					if($res==TRUE)
					{
							
							$yow =1;
							if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id=$rows['id'];
                                    $title = $rows['title'];
									$description = $rows['description'];
                                    $price = $rows['price'];
									$brand_id=$rows['brand_id'];
                                    $featured=$rows['featured'];
                                    $active=$rows['active'];
								?>
								 <tr>
					<th><?php echo $yow++;?></th>
					<td><?php echo $title;?></td>
					<td><img src="<?php echo $rows['images_name']; ?>" height="50" width="150"></td>
                    <td><?php echo $description;?></td>
                    <td><?php echo $price;?></td>
                    <td><?php echo $brand_id;?></td>
					<td><?php echo $featured;?></td>
                    <td><?php echo $active;?></td>
					<td>
                    <a href="<?php echo SITEURL;?>/update-item.php?id=<?php echo $id;?>" class="btn-primary">Edit Food</a>
                    <a href="<?php echo SITEURL;?>/delete-item.php?id=<?php echo $id;?>" class="btn-primary">Delete Food</a>
					
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
	<?php include ('partials/footer.php')?>