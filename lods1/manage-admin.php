<?php include ('partials/menu.php')?>
<link rel="stylesheet" type="text/css" href="style.css">


        <div class="container">

        <h1>ADMIN MANAGEMENT</h1><br><br><br>
       <?php 
	 		if(isset($_SESSION['add'])) {
				 echo $_SESSION['add'];
				 unset($_SESSION['add']);
			 } 
	   ?><br><br><br><br>
        <a href="add-admin.php" class="btn-primary">ADD ADMIN</a><br><br><br><br>
        <div style="overflow-x:auto;">
			<table>
				<tr>
					<th>Admin ID</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Actions</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM admin";
					$res=mysqli_query($conn, $sql);

					if($res==TRUE)
					{
							$count = mysqli_num_rows($res);
							$yow =1;
							if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id=$rows['id'];
									$name=$rows['name'];
									$username=$rows['username'];
								?>
								 <tr>
					<th><?php echo $yow++;?></th>
					<td><?php echo $name;?></td>
					<td><?php echo $username;?></td>
					<td>
                    <a href="<?php echo SITEURL;?>/update-admin.php?id=<?php echo $id;?>" class="btn-primary">Edit admin</a>
                    <a href="<?php echo SITEURL;?>/delete-admin.php?id=<?php echo $id;?>" class="btn-primary">Delete admin</a>
					
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


