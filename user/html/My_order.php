<?php
require('top.php');
?>
<main style=" background-color:#eff5f5; ">
<section class="main-content"  style="margin-top:60px; margin-left:90px;">				
<div class="row">
<div class="span9">					
<table class="table" >
    <thead>
<tr style="background:#fff; border-radius: 2rem;   position: relative; overflow: hidden;   box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px; box-sizing:border-box; flex: .1  .1 15rem; ">
<th style="padding:40px; font-size:20px; text-transform:uppercase;">Order_id &nbsp;&nbsp;&nbsp;</th> 
<th style="padding:40px;font-size:20px; text-transform:uppercase;">Address</th>
<th style="padding:40px; font-size:20px; text-transform:uppercase;">Name</th>
<th style="padding:40px; font-size:20px; text-transform:uppercase;" >Price</th>
<th style="padding:40px; font-size:20px; text-transform:uppercase;">Date</th>
<th style="padding:40px; font-size:20px; text-transform:uppercase;">Status</th>
</tr>
</thead>
<tbody>
    
<?php
$uid=$_SESSION['USER_ID'];
$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where
 `order`.user_id='$uid' and order_status.id=`order`.order_status");
while($row=mysqli_fetch_assoc($res)){
?>

<tr style="background:#fff; border-radius: 2rem;   position: relative; overflow: hidden;   box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px; box-sizing:border-box; flex: .1  .1 15rem; ">
	<td><a  href="order_detail.php?id=<?php echo $row['id']?>" style="background-color: #ff3f6c; color:#fff; 
      padding: 10px 15px;  width:100px; height:200%; cursor: pointer;"><?php echo $row['id']?></a></td>
	<td style=" font-size:20px; text-transform:uppercase;"><?php echo $row['address']?></td>
	<td style=" font-size:20px; text-transform:uppercase;"><?php echo $row['Name']?></td>
    <td style=" font-size:20px; text-transform:uppercase;"><span>&#8377</span>&nbsp;<?php echo $row['total_price']?></td>
    <td style=" font-size:20px; text-transform:uppercase;"><?php echo $row['added_on']?></td>
    <td style=" font-size:20px; text-transform:uppercase;"><?php echo $row['order_status_str']?></td>
	
	</tr>
    
    <?php } ?>
    			  
</tbody>

</table>

</div>
</div>
</section>
                                            </main>			
<?php
require('footer.php');
?>