<?php include ('partials/menu.php')?>
	<div class="container">


        <h1>FOOD MANAGEMENT</h1><br><br><br>
       <?php 
	 		if(isset($_SESSION['add'])) {
				 echo $_SESSION['add'];
				 unset($_SESSION['add']);
			 } 
             if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            } 
	   ?><br><br><br><br>

<form action="" method="POST" enctype="multipart/form-data">
			<table>
              			<tr>
					<th>Title: </th>
					<td>
                        <input type="text" name="title" placeholder="Title" required>
                    </td>
				</tr>
                <tr>
					<th>Desciption: </th>
					<td>
                        <input type="text" name="description" placeholder="Description" required>
                    </td>
				</tr>
                <tr>
					<th>Price: </th>
					<td>
                        <input type="number" name="price" placeholder="Price" min="0" required>
                    </td>
				</tr>
                <tr>
					<th>Category: </th>
					<td>
                        <select name="category">
                       <?php
                         
                            $sql = "SELECT * FROM tbl_category where active='Yes'";
                            $res=mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
					
							if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id=$rows['id'];
									$title=$rows['title'];
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
                    </td>
				</tr>
                <tr>
					<th>Display: </th>
					<td>
                        <input type="radio" name="featured" value="Yes" >Yes
                        <input type="radio" name="featured" value="No">No</td>
				</tr>
                <tr>
					<th>Live: </th>
					<td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No</td>
				</tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add food" class="btn-secondary">
                    </td>
                </tr>
                
			</table>
</form>
<?php
    

    if(isset($_POST['submit']))
    {
     
        $title=$_POST['title'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category'];
        if(isset($_POST['featured']))
        {
            $featured=$_POST['featured'];
            
        }
        else{
         $featured = "No";
        }
        if(isset($_POST['active']))
        {
            $active=$_POST['active'];
            
        }
        else{
        $active = "No";
        }

        $sql1= "SELECT * FROM tbl_food where title='$title' and description = '$description' and price = '$price' and category_id='$category' and featured = '$featured' and active = '$active'";
        $res1 = mysqli_query($conn, $sql1);
  
        if(mysqli_num_rows($res1)>0)
        {   
            $_SESSION['add'] = "FOOD ALREADY EXIST";
            header("location:".SITEURL.'/admin/add-food.php');
        }
        else
        {

        $sql = "INSERT INTO tbl_food (title,description,price,category_id,featured,active)
        values ('$title','$description',$price,'$category','$featured','$active')";
        $res=mysqli_query($conn,$sql);
         
         if($res==TRUE){
            header("location:".SITEURL.'/admin/manage-food.php');
        }
        else{
            header("location:".SITEURL.'/admin/add-food.php');
        }
    }}
        ?>





</div>
<?php include ('partials/footer.php')?>