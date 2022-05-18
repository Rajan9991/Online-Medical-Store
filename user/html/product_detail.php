<?php
require('top.php');
$product_id=mysqli_real_escape_string($con,$_GET['id']);
$get_product=get_product($con,'','',$product_id);
?>
<style>
    .small-img-group{
        display:flex;
        justify-content:space-between;
    }
    .small-img-col{
        flex-basis:24%;
        cursor:pointer;
        gap:2rem;
        border:.2rem solid black;
        box-shadow: 0 1px 5px 0 rgba(0,0,0,.11);

    }
    .small-img-col:hover {
      border-color:#0ae0e7ee;
    }
    .sproduct input{
        width:50px;
        height:38px;
        padding-left:10px;
        font-size:16px;
        margin-right:10px;
        border: .2rem solid rgb(35, 182, 192);
	
    }
    .sproduct input:focus{
        outline:none;
    }

    </style>
    <main class="bg-light">
   <div class="container " style="margin-left:20px;">
   <br><p style="font-size:20px;"><a href="index.php" 
   style="color:black;">Home</a> &nbsp;&nbsp;<i class="fas fa-chevron-right" style="color:#D7DBDD;"></i>&nbsp;
   &nbsp;<a href="categories.php?id=<?php echo $get_product['0']
['categories_id']?>"style="color:black;"><?php echo $get_product['0']
['categories']?></a>&nbsp;&nbsp;<i class="fas fa-chevron-right" style="color:#D7DBDD;"></i>&nbsp;&nbsp;
<span><?php echo $get_product['0']['name']?></span></p> </div>

    <section class="container sproduct bg-light ">
    <div class="row mt-2 ">
                <div class="col-lg-5 col-md-12 ">
                <div class="icons" style="display: flex;
  position: absolute;
  top:2rem; 
  right:3rem;">
 <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" class="fas fa-heart" style="
  width:2.5rem;
 font-size: 2rem;
  color:#CACFD2;
  border:#CACFD2;
  border-radius: 9rem;
  background:#fff;
  margin-top: .5rem;"></a>
                            </div>
    <img class="img-fluid w-100 pb-1" width="100%" height="200" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" id="minimg" alt="">
        
            
        </div>
<div class="col-lg-5 col-md-12 col-12">
   <h4 class="py-4"><?php echo $get_product['0']['name']?></h4>
   <h4> Best price :<span>&#8377</span><span style="color:#F3084C; font-size:25px;"> <?php echo $get_product['0']
   ['price']?></span> </h4>
   <h5 style="color:#707B7C;"> MRP :<span>&#8377</span><strike style="color:#707B7C;"><?php echo $get_product['0']
   ['mrp']?></strike>&nbsp; </h5>
   <?php
					$productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
										
										$pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;
										
										$cart_show='yes';
										if($get_product['0']['qty']>$productSoldQtyByProductId){
											$stock='In Stock';			
										}else{
											$stock='Not in Stock';
											$cart_show='';
										}
										?>
   <h6>Availability:<span><?php echo $stock?></span></h6>
   <h6>Categories:&nbsp;<span style="color:#707B7C;">
   <?php echo $get_product['0']
['categories']?></span></h6>
   <h6 style="color:#707B7C;">(inclusive of all taxes)
    <li>Country of origin:India</li>
  <li>Delivery charges if applicable will appllied at checkout</li></h6>
  <h6 style="color:#707B7C;">Services
    <li><i class="fas fa-sync-alt"></i>&nbsp; 7 Days Return policy</li>
  <li><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;&nbsp;cash on delivery applicable</li></h6>

  <br><?php
										if($cart_show!=''){
										?>
                                        <p ><span style="color:black; font-size:18px;">Qty:</span> 
										<select id="qty" >
											<?php
											for($i=1;$i<=$pending_qty;$i++){
												echo "<option>$i</option>";
											}
											?>
										</select>
										</p>
										<?php } ?>

  <?php
								if($cart_show!=''){
								?>
   <a class="btn" href="javascript:void(0)" onclick="manage_cart
   ('<?php echo $get_product['0']['id']?>','add')">Add To Cart</a>
   <a class="btn" href="javascript:void(0)" onclick="manage_cart 
   ('<?php echo $get_product['0']['id']?>','add','yes')" style="background:#EC530C;">BUY NOW</a><?php } ?></p>
   <h4 class="mt-5 mb-5">Product Detail</h4>
   <span><?php echo $get_product['0']['description']?>
</span>
  
</div>
    </div>
</section>
<section class="products bg-white" id="products" style="margin-top:30px;">


  
</section>
</main>
<script>
    function manage_cart(pid,type,is_checkout){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}else{
				jQuery('.htc__qua').html(result);
                if(is_checkout=='yes'){
                    window.location.href="checkout.php";
                }
			}
		}	
	});	
}

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