<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from users where id='$id'";
         mysqli_query($con,$delete_sql);
    }
        }
    $sql="select * from users  order by id  desc";
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
                                    <div class="pro_table">
                                    <div class="recent-pro">
                        <div class="rec-h" size="30">
                            <h2>Customers </h2><br>
                                             </div>
                                                <div class="clear"></div>

                    </div>

              <table style="width: 100%;">
                <tr>                                          
             <th><h3>#</h3></th>
                    <th><h3>ID </h3></th>
                    <th><h3>Name</h3></th>
                    <th><h3>Email</h3></th>
                    <th><h3>Mobile</h3></th>
                   <th><h3>Date</h3></th>
                    <th><h3></h3></th>

</tr>
<tbody>
    <?php 
    $i=1;
    while($row=mysqli_fetch_assoc($res)){?>
    
<tr>

<td><?php  echo $i?></td>
                    <td><?php echo $row ['id'] ?></td>
                    <td><?php echo  $row ['name'] ?></td>
                    <td><?php echo $row ['email'] ?></td>
                    <td><?php echo $row ['mobile'] ?></td>
                    <td><?php echo $row ['added_on'] ?></td>
                     <td>
                      <?php 
                      
                      echo "<span class='badge badge-delete'>
                      <a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp";
                      
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
