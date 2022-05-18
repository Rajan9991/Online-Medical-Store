<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
$best_seller='';
$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from product where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
    $row=mysqli_fetch_assoc($res);
    $categories_id=$row['categories_id'];
    $name=$row['name'];
    $mrp=$row['mrp'];
    $price=$row['price'];
    $qty=$row['qty'];
    $image=$row['image'];
    $short_desc=$row['short_desc'];
    $description=$row['description'];
    $meta_title=$row['meta_title'];
        $best_seller=$row['best_seller'];
    }else
    {
        header('location:product.php');
           die();
    }
   
}
if(isset($_POST['submit'])){
    $categories_id=get_safe_value($con,$_POST['categories_id']);
    $name=get_safe_value($con,$_POST['name']);

    $mrp=get_safe_value($con,$_POST['mrp']);

    $price=get_safe_value($con,$_POST['price']);

    $qty=get_safe_value($con,$_POST['qty']);

  

    $short_desc=get_safe_value($con,$_POST['short_desc']);

    $description=get_safe_value($con,$_POST['description']);

    $meta_title=get_safe_value($con,$_POST['meta_title']);

    $meta_desc=get_safe_value($con,$_POST['meta_desc']);

    $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
    $best_seller=get_safe_value($con,$_POST['best_seller']);
  $res=mysqli_query($con,"select * from product where name='$name'");
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }else{
                $msg="<h3>Product Already Exist</h3>";
            }
        }else{
            $msg="<h3>Product Already Exist</h3>";
        }
 
    } 
    if($msg=='')  {
if(isset($_GET['id'])&& $_GET['id']!=''){
    if($_FILES['image']['name']!=''){
$image=$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
        $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',image='$image',short_desc='$short_desc'
        ,description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' ,best_seller='$best_seller'
        where id='$id'";
    }else{
        $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',image='$image',short_desc='$short_desc'
        ,description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' ,best_seller='$best_seller'where id='$id'";   
    }
    mysqli_query($con,$update_sql);
    }else{
        $image=$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
        mysqli_query($con,"insert into product(categories_id,name, mrp, price,qty,image,short_desc,description,meta_title, meta_desc,meta_keyword,best_seller,
        Status) values('$categories_id','$name', '$mrp', '$price','$qty','$image','$short_desc','$description','$meta_title', '$meta_desc'
        ,'$meta_keyword','$best_seller',1)");

    }
  header('location:product.php');
   die();
}
}
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
                <div class="main-content-info container">
                    <div class="card-box">
                        <h2 class="cus-num cus-inc">3</h2>
                        <p>Contact</p>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="container">
        <div class="header">
            <h2>Add product</h2>
        </div>
        <form method="post" enctype="multipart/form-data">
        <div class="form-control ">
                <label>Categories</label>
                              <select class="form-control" name="categories_id" >
                               
                    <option>
                        select categories
                    </option>
                    <?php
                    $res=mysqli_query($con,"select id,categories from categories order by categories asc");
                    while($row=mysqli_fetch_assoc($res)){
                        if($row['id']==$categories_id){
                            echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
 
                        }else{
                            echo "<option value=".$row['id'].">".$row['categories']."</option>";

                        }
                       }
                       ?>
                </select>
                       </div>
            <div class="form-control ">
                <label>Product Name</label>
                <input type="Text" name="name"  required placeholder="Enter product name.." autocomplete="off" value="<?php echo $name ?>">
                       </div>
                       <div class="form-control ">
                <label>Best Seller</label>
                              <select class="form-control" name="best_seller"  required>
                              <option value=''>Select</option>
										<?php
										if($best_seller==1){
											echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
										}elseif($best_seller==0){
											echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
										}else{
											echo '<option value="1">Yes</option>
												<option value="0">No</option>';
										}
										?>
                                   </select>
                       </div>
        
                       <div class="form-control ">
                <label>MRP</label>
                <input type="Text" name="mrp"  required placeholder="Enter product MRP.." autocomplete="off" value="<?php echo $mrp ?>">
                       </div>
                       <div class="form-control ">
                <label>Price</label>
                <input type="Text" name="price"  required placeholder="Enter product price.." autocomplete="off" value="<?php echo $price ?>">
                       </div>
                       <div class="form-control ">
                <label>Qty</label>
                <input type="Text" name="qty"  required placeholder="Enter qty name.." autocomplete="off" value="<?php echo $qty ?>">
                       </div>
                       <div class="form-control ">
                <label>Image</label>
                <input type="file" name="image" required<?php echo $image_required?>>
                       </div>
 
                       <div class="form-control ">
                   <label>Short Description</label>
                <textarea name="short_desc"   placeholder="Enter Short Description.." required><?php echo $short_desc ?>
                    </textarea>   </div>
 
                       <div class="form-control ">
                <label>Description</label>
                <textarea name="description"  required placeholder="Enter  Description.."><?php echo $description?>
                    </textarea>    </div>
                    
                                   <input type="Submit" name="submit" class="btn"  id="btn" name="">
             <div class="filed-error"><?php echo $msg?>

        </form>
            </div>
     
         <?php
require('footer.inc.php');
?>