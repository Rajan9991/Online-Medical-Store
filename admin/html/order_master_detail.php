<?php
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($con,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
	}
	}
?>
<div class="clear"></div>
    <div class="main-content-info container">
        <div class="card-box">
            <h2 class="cus-num cus-h">1</h2>
            <p>Customers</p>
        </div>
        <div class="main-content-info container">
            <div class="card-box">
                <h2 class="cus-num cus-pro">16</h2>
                <p>Products</p>
            </div>
            <div class="main-content-info container">
                <div class="card-box">
                    <h2 class="cus-num cus-ord">4</h2>
                    <p>Orders</p>
                    
                </div>
                <div class="main-content-info">
                    <div class="card-box">
                        <h2 class="cus-num cus-inc">3</h2>
                        <p>Contact</p>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="content-pro-par ">
                                    <div class="pro_table"  style="background-color:#f0f5f5;">
                                    <div class="recent-pro">
                        <div class="rec-h" size="30">
                            <h2>Order Details</h2><br>
                                             </div>
                                                <div class="clear"></div>

                    </div>

                    <table class="table" >
    <thead>
<tr>
<th style="padding:18px; font-size:20px; text-transform:uppercase;">Name</th> 
<th style="padding:18px; font-size:20px; text-transform:uppercase;">Image</th>
<th style="padding:18px; font-size:20px; text-transform:uppercase;">QTY</th>
<th style="padding:18px; font-size:20px; text-transform:uppercase;">Price</th>
<th style="padding:18px; font-size:20px; text-transform:uppercase;">Address</th>
<th style="padding:18px; font-size:20px; text-transform:uppercase;">Order Status</th>

</tr>
</thead>
<tbody>
    
<?php
 $res=mysqli_query($con,"select distinct(product_detail.id) 
 ,product_detail.*,product.name,product.image,`order`.address,`order`.State,`order`.pincode from product_detail,product 
 ,`order` where product_detail.order_id='$order_id'  and product_detail.product_id=product.id");
 
 $total_price=0;
 while($row=mysqli_fetch_assoc($res)){
    $address=$row['address'];
    $State=$row['State'];
    $pincode=$row['pincode'];
    
 $total_price=$total_price+($row['qty']*$row['price']);
?>
<tr style="background:#fff;
   text-align: center;
  
      overflow: hidden;
    box-shadow:black;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  ">
	<td style=" padding:38px;  font-size:20px; text-transform:uppercase;"><?php echo $row['name']?></td>
    <td style=" padding:38px; background:#fff; border-radius: 2rem;   position: relative; overflow: hidden;   box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px; box-sizing:border-box; flex: .1  .1 15rem; "><img src="<?php echo PRODUCT_IMAGE_SITE_PATH
   .$row['image']?>" height="50" width="100"></td>
    <td style="padding:38px;  font-size:20px; text-transform:uppercase;"><?php echo $row['qty']?></td>
    <td style=" padding:38px; font-size:20px; text-transform:uppercase; color:#660066;" ><span style="color:#000;">&#8377</span>&nbsp;<span ><?php echo $row['price']?></span></td>
	<td style="padding:38px;  font-size:20px; text-transform:uppercase;"><?php echo $address?>,<br> <?php echo $State?>,<br> <?php echo $pincode?></td>
    <td style="padding:38px;  font-size:20px; text-transform:uppercase;"><?php 
							$order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from 
                            order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
							echo $order_status_arr['name'];
							?>
							</td>
	</tr>
    
    <?php } ?>
    <tr style="background:#fff;
   border-radius: 4rem;
   text-align: center;
   position: relative;
   overflow: hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  " >
  <td colspan="4"></td>
	<td class="product-name">Total Price</td>
<td class="product-name"><span style="color:#000;">&#8377</span>&nbsp;<?php echo $total_price?></td>
                                                
	</tr>
    

    			  
</tbody>

</table>
								<form method="post">
									<select class="form-control" name="update_order_status" required>
										<option value="">Select Status</option>
										<?php
										$res=mysqli_query($con,"select * from order_status");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
										}
										?>
									</select>
									<input type="submit" class="form-control"  style=" padding: 10px 15px;
    background-color: #ff3f6c; margin-top:30px; font-weight:900; font-size:20px; text-transform:uppercase; width: relative; margin: 10px auto; text-align: center;
    border-radius: 5px; cursor: pointer;"/>
								</form>
							</div>
						</div>
              
                </div>
                <div class="clear"></div>     
</div>
<?php
require('footer.inc.php');
?>
