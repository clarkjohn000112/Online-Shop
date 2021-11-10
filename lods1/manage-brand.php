<?php include ('partials/menu.php')?>
<link rel="stylesheet" type="text/css" href="style.css">
 <div class="container">

        <h1>BRAND MANAGEMENT</h1><br><br><br>
       <?php 
	 		if(isset($_SESSION['add'])) {
				 echo $_SESSION['add'];
				 unset($_SESSION['add']);
			 } 
	   ?><br><br><br><br>

           


        <a href="add-brand.php" class="btn-primary">ADD BRAND</a><br><br><br><br>
       
        <table>
				<tr>
					<th>Brand ID</th>
					<th>Brand Logo</th>
					<th>Title</th>
					<th>Displayed</th>
					<th>Live</th>
                    <th>Actions</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM brand";
					$res=mysqli_query($conn, $sql);
					$count = mysqli_num_rows($res);

					if($res==TRUE)
					{
							
							$yow =1;
							if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id=$rows['id'];
								
									$title=$rows['title'];
									$featured=$rows['featured'];
                                    $active=$rows['active'];
								?>
								 <tr>
					<th><?php echo $yow++;?></th>
					<td><img src="<?php echo $rows['images_name']; ?>" height="50" width="150"></td>
					<td><?php echo $title;?></td>
					<td><?php echo $featured;?></td>
                    <td><?php echo $active;?></td>
					<td>
                    <a href="<?php echo SITEURL;?>/update-brand.php?id=<?php echo $id;?>" class="btn-primary">Edit Category</a>
                    <a href="<?php echo SITEURL;?>/delete-brand.php?id=<?php echo $id;?>" class="btn-primary">Delete Category</a>
					
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
	<?php include ('partials/footer.php')?><br>