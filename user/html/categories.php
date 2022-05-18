<?php
require('top.php');
$cat_id=mysqli_real_escape_string($con,$_GET['id']);
$get_product=get_product($con,'',$cat_id);
?>

<main>
  
  <div class="container-fluid" style="margin-top:70px;">
    <div class="row">
      <div class="col-lg-3">
<h5>Filter Product</h5><hr>
<h4 class="text-info">Categories</h4>
<ul class="list-grup">
  <?php
 foreach($cat_arr as $list){
    ?>
 <li class="list-group-item">
      <div class="form-check">
        <label class="form-check-label">
                <a class="nav-link" style="color:black;" href="categories.php?id=<?php
                echo $list['id']?>"><?php echo $list['categories']?></a>
  </label>
      </div>
  </li>
  <?php
	}
	?>

</ul>
      </div>
      <div class="col-lg-9">
<h2 class="text-center" id="textchange" style="border:2rem solid #ecf7fc; border-radius: 0.5rem;
background:#fff; border-radius: 2rem; text-align: center; position: relative; overflow: hidden; background-repeat: no-repeat; background:inherit;
box-shadow:0 5px 15px rgba(0,0,0,.1); border-radius:4px; box-sizing:border-box; flex: .1  .1 15rem;">Products</h2>
<div class="products" id="products" style="background-color:#fff;">
<div class="row" id="result" style="margin:10px;">
<?php if(count($get_product)>0){ ?>
<div class="box-container">
<?php
							
							foreach($get_product as $list){
							?>
      
        <div class="box">
            <div class="icons">
                <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"
                 class="fas fa-heart" style="
  width:2.5rem;
 font-size: 2rem;
  color:#CACFD2;
  border:#CACFD2;
  border-radius: 9rem;
  background:#fff;
  margin-top: .5rem;"></a>
                
            </div><a href="product_detail.php?id=<?php echo $list['id']?>">
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>"  height="200" ></a>
            <div class="content">
                <h6><?php echo $list['name']?>
</h6>
<h5 style="color:#000;"> MRP :<span>&#8377</span><strike style="color:#707B7C;">
<?php echo $list['mrp']?></strike>&nbsp; </h5>

                <div class="price"><span>Price:<?php echo number_format($list['price'])?></span></div>
                <div class="stars" style="color:orange;">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <a href="product_detail.php?id=<?php echo $list['id']?>" class="btn">View</a>
            </div>
        </div>
        <?php } ?>
        </div>
       <?php } else{
           echo " <h1>Data not found</h1>";
       }?> 
  </div>
  </div>

      </div>
    </div>
  </div>
</main>
<script>
  function wishlist_manage(pid,type){
	jQuery.ajax({
		url:'wishlist_manage.php',
		type:'post',
		data:'pid='+pid+'&type='+type,
		success:function(result){
			if(result=='not_login'){
				window.location.href='login.php';
			}else{
				jQuery('.htc__wishlist').html(result);
			}
		}	
	});	
}
  </script>
<?php
require('footer.php');
?>

