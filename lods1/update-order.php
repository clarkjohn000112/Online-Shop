
<?php include ('partials/menu.php')?>



        <?php 
           if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql2="SELECT * from tbl_order WHERE id=$id";

                            $res=mysqli_query($conn, $sql2);
                            $rows=mysqli_fetch_assoc($res);
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
                        }
                        
                        else{
                            header("location:".SITEURL.'/admin/manage-order.php');
                        }
        ?>


    <div class="container">
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
  
            
                <tr>
                    <th>Food: </th>
                    <td>
                    <b><?php echo $food?></b>
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
               
                        <input type="submit" name="submit" value="Update" class="btn-primary">
                    </td>
                </tr>
                
            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $status = $_POST['status'];
                  
                    $customer_name = $_POST['customer_name'];
                    $customer_contact = $_POST['customer_contact'];
                    $customer_email = $_POST['customer_email'];
                    $customer_address = $_POST['customer_address'];
               
                    $sql3 = "UPDATE tbl_order set
            
                
                    qty = $qty,
                    total = $total,
             
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    where id=$id";

                    $res3=mysqli_query($conn,$sql3);

                    if($res3==TRUE){
                    $_SESSION['update-success']="<div class='error'> Update Successfully</div>";
                    header("location:".SITEURL.'/admin/manage-order.php');
                    }
                    else{
                     $_SESSION['update-failed']="<div class='error'> failed to replace current image</div>";
                    header("location:".SITEURL.'/admin/manage-order.php');
                    }


        }
        ?>

    </div>
</div>


<?php include ('partials/footer.php')?>