<?php
require('top.inc.php');
    $sql="select * from user  order by id  desc";
$res=mysqli_query($con,$sql);
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
                            <h2>Order</h2><br>
                                             </div>
                                                <div class="clear"></div>

                    </div>

                    <table class="table" >
    <thead>
<tr style="background:#fff; border-radius: 2rem;   position: relative; overflow: hidden;   box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px; box-sizing:border-box; flex: .1  .1 15rem; ">
<th style="padding:15px; font-size:18px; text-transform:uppercase;">Order_id &nbsp;&nbsp;&nbsp;</th> 
<th style="padding:15px;font-size:18px; text-transform:uppercase;">Address</th>
<th style="padding:15px;font-size:18px; text-transform:uppercase;">Payment_type</th>
<th style="padding:15px; font-size:18px; text-transform:uppercase;">Name</th>
<th style="padding:15px; font-size:18px; text-transform:uppercase;" >Price</th>
<th style="padding:15px; font-size:18px; text-transform:uppercase;">Date</th>
<th style="padding:15px; font-size:18px; text-transform:uppercase;">Status</th>
</tr>
</thead>
<tbody>
    
<?php
$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from 
`order`,order_status where  order_status.id=`order`.order_status");

while($row=mysqli_fetch_assoc($res)){
?>
<tr style="background:#fff; border-radius: 2rem;   position: relative; overflow: hidden;   box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px; box-sizing:border-box; flex: .1  .1 15rem; ">
	<td><a  href="order_master_detail.php?id=<?php echo $row['id']?>" style="padding: 10px 15px;  width:1000px; height:200%; cursor: pointer;"><?php echo $row['id']?></a></td>
	<td style=" font-size:18px; text-transform:uppercase;"><?php echo $row['address']?></td>
    <td style=" font-size:18px; text-transform:uppercase;"><?php echo $row['payment_type']?></td>
	<td style=" font-size:18px; text-transform:uppercase;"><?php echo $row['Name']?></td>
    <td style=" font-size:18px; text-transform:uppercase;"><span>&#8377</span>&nbsp;<?php echo $row['total_price']?></td>
    <td style=" font-size:18px; text-transform:uppercase;"><?php echo $row['added_on']?></td>
    <td style=" font-size:18px; text-transform:uppercase;"><?php echo $row['order_status_str']?></td>
	
	</tr>
    
    <?php } ?>
    			  
</tbody>

</table>
              
                </div>
                <div class="clear"></div>     
</div>
<?php
require('footer.inc.php');
?>
