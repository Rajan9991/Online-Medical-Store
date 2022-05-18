<?php
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);
?>

<main style=" background-color:#eff5f5; ">
<section class="main-content"  style="margin-top:60px; margin-left:100px;">				
<div class="row">
<div class="span9">					
<table class="table" >
    <thead>
<tr style="background:#fff; border-radius: 2rem;   position: relative; overflow: hidden;   box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px; box-sizing:border-box; flex: .1  .1 15rem; ">
<th style="padding:70px;font-size:20px; text-transform:uppercase;">Name</th> 
<th style="padding:70px; font-size:20px; text-transform:uppercase;">Image</th>
<th style="padding:70px; font-size:20px; text-transform:uppercase;">QTY</th>
<th style="padding:70px; font-size:20px; text-transform:uppercase;">Price</th>

</tr>
</thead>
<tbody>
    
<?php
$uid=$_SESSION['USER_ID'];
 $res=mysqli_query($con,"select distinct(product_detail.id) 
 ,product_detail.*,product.name,product.image from product_detail,product 
 ,`order` where product_detail.order_id='$order_id' and `order`.user_id='$uid' and product_detail.product_id=product.id");
 $total_price=0;
 while($row=mysqli_fetch_assoc($res)){
 $total_price=$total_price+($row['qty']*$row['price']);
?>
<tr style="background:#fff;
   border-radius: 7rem;
   text-align: center;
      overflow: hidden;
    box-shadow:black;
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  ">
	<td style=" font-size:20px; text-transform:uppercase;"><?php echo $row['name']?></td>
    <td style="background:#fff; border-radius: 2rem;   position: relative; overflow: hidden;   box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px; box-sizing:border-box; flex: .1  .1 15rem; ">
   <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" height="150"></td>
    <td style=" font-size:20px; text-transform:uppercase;"><?php echo $row['qty']?></td>
    <td style=" font-size:20px; text-transform:uppercase; color:#660066;" ><span style="color:#000;">&#8377</span>&nbsp;<span ><?php echo $row['price']?></span></td>
	
	</tr>
    
    <?php } ?>
    <tr style="background:#fff;
   border-radius: 2rem;
   text-align: center;
   position: relative;
   overflow: hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  " >
  <td colspan="2"></td>
	<td class="product-name">Total Price</td>
												<td class="product-name"><span style="color:#000;">&#8377</span>&nbsp;<?php echo $total_price?></td>
                                                
	</tr>
    

    			  
</tbody>

</table>

</div>
</div>
</section>
                                            </main>			
<?php
require('footer.php');
?>