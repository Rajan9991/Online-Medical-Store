<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='status'){
        $operation=get_safe_value($con,$_GET['operation']);
        $id=get_safe_value($con,$_GET['id']);
        if($operation=='Active'){
            $status='1';
        }else{
            $status='0';
        }
       $update_status="update product set status='$status' where id='$id'";
    mysqli_query($con,$update_status);
    }
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from product where id='$id'";
         mysqli_query($con,$delete_sql);
    }
        }
    $sql="select product.*,categories.categories from product,categories where
     product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);
?>
<style>
.card-box{
    float: left;
    width: 21%;
    margin-top: 120px;
    background:linear-gradient(45deg,#F08080 0%,#b4627d 100%);
    margin-left: 2%;
    display: fixed;
    margin-right: 2%;
    padding: 25px;
    color: #fff;
}
section#sidebar{
    width: 20%;
    background-image:linear-gradient(#85C1E9,#85C1E9), url("../assets/nine.jpg");
    top: 0;
    left: 0;
    color: white;
    position: fixed;
    height: 100%;

}
</style>
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
                        <p>contact</p>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="content-pro-par ">
                                    <div class="pro_table">
                                    <div class="recent-pro">
                        <div class="rec-h" size="30">
                            <h2>Products</h2><br>
                            <h2><a href="manage_product.php">Add Products</h2></a>

                        </div>
                        
                        <div class="clear"></div>

                    </div>

              <table style="width: 100%;">
                <tr>                                          
                <th><h3>#</h3></th>
                    <th><h3>ID </h3></th>
                    <th><h3>categories</h3></th>
                    <th><h3>Name</h3></th>
                    <th><h3>Image </h3></th>
                    <th><h3>MRP</h3></th>
                    <th><h3>Price</h3></th>
                    <th><h3>Qty</h3></th>
                    <th><h3></h3></th>
</tr>
<tbody>
    <?php 
    $i=1;
    while($row=mysqli_fetch_assoc($res)){?>
    
<tr>

<td><?php  echo $i?></td>
                    <td><?php echo $row ['id'] ?></td>
                    <td><?php echo  $row ['categories'] ?></td>
                    <td><?php echo $row ['name'] ?></td>
                    <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row ['image'] ?>" height="30px;" width="30px;"/></td>
                    <td><?php echo $row ['mrp'] ?></td>
                    <td><?php echo  $row ['price'] ?></td>
                    <td><?php echo $row ['qty'] ?>
                    <?php
							   $productSoldQtyByProductId=productSoldQtyByProductId($con,$row['id']);
							   $pneding_qty=$row['qty']-$productSoldQtyByProductId;
							   
							   ?>
							   
                </td>
                                        <td>
                      <?php 
                      if($row['status']==1){
                      echo "<span class='badge badge-complete'><a href='?type=status&operation=Deactive&id=".$row['id']."'> Active</a></span>&nbsp";
                      }else{
                        echo "<span class='badge badge-pending'><a href='?type=status&operation=Active&id=".$row['id']."'> Deactive</a></span>&nbsp";  
                      }
                      echo " <span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp";

                      echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp";
                      
                      ?>
                    </td>
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
