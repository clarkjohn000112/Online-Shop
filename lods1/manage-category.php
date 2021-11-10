<?php include ('partials/menu.php')?>
 <div class="container">

        <h1>CATEGORY MANAGEMENT</h1><br><br><br>
       <?php 
	 		if(isset($_SESSION['add'])) {
				 echo $_SESSION['add'];
				 unset($_SESSION['add']);
			 } 
	   ?><br><br><br><br>

           


        <a href="add-category.php" class="btn-primary">ADD CATEGORY</a><br><br><br><br>
       
        <table>
				<tr>
					<th>Category ID</th>
					<th>Tittle</th>
					<th>Displayed</th>
					<th>Live</th>
                    <th>Actions</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM tbl_category";
					$res=mysqli_query($conn, $sql);
					$count = mysqli_num_rows($res);

					if($res==TRUE)
					{
							
							$yow =1;
							if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id=$rows['id'];
									$image = $rows['images_name'];
									$title=$rows['title'];
									$featured=$rows['featured'];
                                    $active=$rows['active'];
								?>
								 <tr>
					<th><?php echo $yow++;?></th>
					<td><?php echo $title;?></td>
					<td><?php echo $featured;?></td>
                    <td><?php echo $active;?></td>
					<td>
                    <a href="<?php echo SITEURL;?>/admin/update-category.php?id=<?php echo $id;?>" class="btn-primary">Edit Category</a>
                    <a href="<?php echo SITEURL;?>/admin/delete-category.php?id=<?php echo $id;?>" class="btn-primary">Delete Category</a>
					
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