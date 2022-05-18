<?php
require('top.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    ?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}
$cart_total=0;
if(isset($_POST['submit'])){
    $Name=get_safe_value($con,$_POST['Name']);
	$phone=get_safe_value($con,$_POST['phone']);
	$address=get_safe_value($con,$_POST['address']);
    $State=get_safe_value($con,$_POST['State']);
    $pincode=get_safe_value($con,$_POST['pincode']);
    $locality=get_safe_value($con,$_POST['locality']);
    $district=get_safe_value($con,$_POST['district']);
    $payment_type=get_safe_value($con,$_POST['payment_type']);
	$user_id=$_SESSION['USER_ID'];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
		
	}
    $total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
    }
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into `order`(user_id,Name,phone,address,State,pincode,locality,district,
    payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$Name','$phone','$address',
    '$State','$pincode','$locality','$district','$payment_type','$payment_status','$order_status','$added_on',
    '$total_price')");
	
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($con,"insert into product_detail(order_id,product_id,qty,price) 
        values('$order_id','$key','$qty','$price')");
	}
	

    unset($_SESSION['cart']);
	
	if($payment_type=='Razorpay'){
		
		$userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
		$apikey = "rzp_test_JiYaRn52devAze";
?>
<script>
window.location.href='payscript.php';
</script>
<?php

		
		}else{	

		?>
		<script>
			window.location.href='thank_you.php';
		</script>
		<?php
	}	
	
}
	

?>
<main style="background-color:#F5F5F5;">
<div class="site-section" >
      <div class="container">
      
        <div class="row mb-5">
          <div class="col-md-12">
          <?php 
									$text_id='ship_different_address';
									if(!isset($_SESSION['USER_LOGIN'])){
									$text_id='ship_diff';
									?>

        
            <div class="bg-light rounded p-3" style="margin-top:30px;">
              <p class="mb-0">Returning customer? <a href="login.php" class="d-inline-block">Click here</a> to login</p>
            </div>
            <?php } ?>
          </div>
          
        </div>
        
        <div class="row" >
            
          <div class="col-md-6 mb-5 mb-md-0"  >
            
            <div class="py-4"></div>
            <div class="p-3 p-lg-5 border" style="background:#f0f5f5;
   border-radius: 2rem;
   text-align: center;
   position: relative;
   overflow: hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  "    >
  <form  action ="#" method="POST">
           <div class="grup"   style="background:#fff;
   border-radius: 2rem;
   text-align: center;
   position: relative;
   overflow: hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  "    >
                <label for="c_ship_different_address" class="text" data-toggle="collapse"
                  href="#ship_different_address" role="button" aria-expanded="false"
                  aria-controls="ship_different_address"><span id="c_ship_different_address">
                  Delivery Address<span></label>
                <div class="collapse" id="<?php echo $text_id?>">
                  <div class="py-2">

                    <div class="grup row">
                      <div class="col-md-6">
                        <label for="c_diff_fname" class="text"> Name <span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_fname" name="Name">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_lname" class="text">Phone<span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_lname" name="phone">
                      </div>
                    </div>

                   
                    <div class="grup row">
                      <div class="col-md-12">
                        <label for="c_diff_address" class="text">Address <span
                            class="text-danger">*</span></label>
                          <textarea name="address" id="c_diff_address" cols="30" rows="5" class="form-control"
                  placeholder="Write your address here..."></textarea>
             
                      </div>
                    </div>

                    
                    <div class="grup row">
                      <div class="col-md-6">
                        <label for="c_diff_state_country" class="text">State / Country <span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_state_country" name="State">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_postal_zip" class="text">Pincode<span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_postal_zip" name="pincode">
                      </div>
                    </div>

                    <div class="grup row mb-5">
                      <div class="col-md-6">
                        <label for="c_diff_email_address" class="text">Locality <span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_email_address" name="locality">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_phone" class="text"> District<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_phone" name="district"
                          placeholder="District">
                      </div>
                    </div>
                                   
                  </div>

                </div>
                                    
                
              </div>
              <div class="grup"   style="background:#fff;
   border-radius: 2rem;
   margin-top:20px;
   text-align: center;
   position: relative;
   overflow: hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  "    >
                <label for="c_ship_different" class="text" data-toggle="collapse"
                  href="#ship_different" role="button" aria-expanded="false"
                  aria-controls="ship_different"><span id="c_ship_different">
                Order Status<span></label>
                <div class="collapse" id="ship_different">
                <?php
         $cart_total=0;
         foreach($_SESSION['cart'] as $key=>$val){
             $productArr=get_product($con,'','',$key);
             $pname=$productArr[0]['name'];
             $mrp=$productArr[0]['mrp'];
             $price=$productArr[0]['price'];
             $image=$productArr[0]['image'];
             $qty=$val['qty'];
             $cart_total=$cart_total+($price*$qty);

             ?>
        
                  <div class="py-2">

                    
                  <div class="product_info">
                    <div class="product_img">
                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="ProductImage" width="200px" height="200px">
                    </div>
                    <div class="product_data">
                        <div class="description">
                            <div class="main_header">
                            <?php echo $pname?>                           
                           </div>
                            <div class="sub_header">
                            </div>
                        </div>
                        <div class="qty">
        <p><span>QTY: <input type="number"  id="<?php echo $key?>qty"  value="<?php echo $qty?>" style=" margin-right: 5px; 
        border-radius: 3px;    width:50px; height:38px;  background-color: #e4e4e4;"></span>&nbsp;
        <a href="javascript:void(0)"  onclick="manage_cart('<?php echo $key ?>','remove')" 
        style="background-color:#ff3f6c; color:#fff;  font-weight:600;  padding:10px 15px; cursor:pointer;">Remove</a> </p>            
                   
                   
</div>
                        <div class="price">
                            <div class="current_price"><span>&#8377</span>&nbsp;<?php echo $qty*$price?></div>
                            <div class="normal_price"><span style="color:#707B7C;">&#8377</span><?php echo  number_format($mrp)?></div>
                                                    </div>
                    </div>
                </div>
                             
                                        
                    
                                   
                  </div><hr>
<?php } ?>
                </div>
                                    
                
              </div>
    
           
    
              <div class="grup"    style="background:#fff;
              margin-top:20px;
   border-radius: 2rem;
   text-align: center;
   position: relative;
   overflow: hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  "    >
                <label for="c_create_account" class="text" data-toggle="collapse" href="#create_an_account"
                  role="button" aria-expanded="false" aria-controls="create_an_account"><span
                    id="c_create_account"> Payment method</span></label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                  <div class="border mb-3">
                  <div class="single-method">
													<input type="radio" name="payment_type" value="COD" required/>COD 
													&nbsp;&nbsp;
												</div>
	
                                    </div>

                   <div class="border mb-5">
                   <div class="single-method">

                 <input type="radio" name="payment_type" value="Razorpay" 
                 style="color:black;" required> Razorpay</div>
                    </div>
                  </div>
                </div>
                
          
              </div>
              <input type="submit" name="submit" style=" padding: 10px 15px;
    background-color: #ff3f6c;
    margin-top:30px;
    font-weight:900;
    width: 440px;
    margin: 10px auto;
    text-align: center;
    border-radius: 5px;
    cursor: pointer;">
</form>
                                    
            </div>
          </div>
          <div class="col-md-6" >

                        <div class="row mb-5" >
              <div class="col-md-12">
                <h2 class="h3 mb-3 text">Total Price Details</h2>
                <div class="p-3 p-lg-2 border" style="background:#fff;
  
   text-align: center;
   position:auto;
   overflow: hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  "  >
                  <table class="table site-block-order-table mb-2">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead> 
                    <tbody>
                    <?php
                    $cart_total=0;
			    foreach($_SESSION['cart'] as $key=>$val){
                $productArr=get_product($con,'','',$key);
                $pname=$productArr[0]['name'];
                $mrp=$productArr[0]['mrp'];
                $price=$productArr[0]['price'];
                $image=$productArr[0]['image'];
                $qty=$val['qty'];
                $cart_total=$cart_total+($price*$qty);
                ?>
		                     <tr>
                        <td><?php echo $pname?><strong class="mx-2"></strong> </td>
                        <td>₹ <?php echo $price*$qty?></td>
                      </tr>
                      <?php } ?>
                       <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>₹ <?php echo $cart_total?></strong></td>
                      </tr>
                      
                    </tbody>
                  </table>

                   <div class="grup">
                    <button class="btn btn-primary btn-lg btn-block" >Place
                      Order</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  
</body>
<style>

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

*{
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style: none;
    font-family: 'roboto', sans-serif;
    box-sizing: border-box;
}

body{
    background-color: #F5F5F5;
    line-height: 22px;
}

.green{
    color: #03a685;
}

.wrapper{
    display: flex;
}

.wrapper_content{
    width: 50%;
    height: auto;
    padding: 15px;
    margin: 50px 0;
    position: relative;
    margin-left: 50px;
}

.wrapper_amount{
    width: 50%;
    height: auto;
    padding: 15px;
    margin: 50px 0;
    position: relative;
    margin-right: 50px;
}

.header_title{
    display: flex;
    justify-content: space-between;
    width: 560px;
    margin: 0 auto;
    margin-bottom: 15px;
    font-size: 20px;
}

.product_wrap,.price_details{
    width: 560px;
    margin: 0 auto;
    background-color: #fff;
    padding: 15px;
    margin-bottom: 15px;
}

.product_info{
    display: flex;
    align-items: center;
}

.product_data{
    margin: 0 10px;
}

.description{
    margin-bottom: 15px;
}
.product_img img{
    display: block;
}

.main_header{
    font-weight: 700;
}

.sub_header{
    color: pink;
}

.product_btns{
    display: flex;
    margin: 0 auto;
    text-align: center;
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid #e4e4e4;
    color: #aca9a9;
}

.product_btns > div{
    padding : 5px 15px;
    cursor: pointer;
    
   
}

.product_btns > div:hover{
    background-color: #efefef;
    border-radius: 3px ;
    color: black;
    font-weight: 700;
}

.remove{
    border-right: 1px solid #e4e4e4;
    width: 40%;
    
}

.whishlist{
    width: 60%;
}

.qty , .price{
    display: flex;
    margin-bottom: 10px;
}

.qty  {
    
}


.current_price{
    font-weight: 700;
    margin-right: 10px;
}

.normal_price{
    color: #adadad;
    margin-right: 10px;
    text-decoration: line-through;
}

.discount{
    color: #f16565;
}

.wrapper_amount{
    width: 50%;
    
}

.price_details .item,.total,.coupon{
    display: flex;
    justify-content: space-between;
}

.price_details .item{
    margin-bottom: 10px;
}

.price_details .coupon{
    margin-top: 20px;
}

.price_details .total{
    padding-top: 10px;
    border-top: 1px solid #e4e4e4 ;
    font-weight: 700;
    margin-top: 20px;
}

.price_details .coupon a{
    color: #ff3f6c;
    background-color: #efefef;
    padding: 10px 15px;
    border-radius: 5px;
}

.price_details .coupon a:hover{
    font-weight: 700;
}

.slider.active{
    display: block;
}

.slider{
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    display: none;
}

.slider .bg_shadow{
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: #000;
    opacity: 0.7;
}

.slider .select_size,.select_quantity{
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: #fff;
    width: 100%;
}

.slider .header{
    padding:10px 15px 0;
    display: flex;
    justify-content: space-between;
    font-weight: 700;
}

.close{
    cursor: pointer;
}

.button{
    background-color: #ff3f6c;
    color: fff;
    font-weight: 700;
    text-align: center;
    letter-spacing: 2px;
    padding: 10px 15px;
    cursor: pointer;
}

.body ul{
    display: flex;
    padding: 10px 15px 15px;
}

.body ul li{
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    border: 1px solid #000;
    border-radius: 50%;
    margin-right:10px ;
    cursor: pointer;
}

.body ul li:hover,.body ul li.active{
    border-color: #ff3f6c;
    
    color: #ff3f6c;
}

.checkout{
    padding: 10px 15px;
    background-color: #ff3f6c;
    width: 560px;
    margin: 10px auto;
    text-align: center;
    border-radius: 5px;
    cursor: pointer;
}

.checkout_btn{
    color: #fff;
    width: 100%;
    display: block;
}

.cart_navigation{
    background-color: #fff;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
}

.cart_logo{
    padding: 10px;
    margin: 1px 10px;
    margin-right: 110px;
}

.cart_logo i{
    font-size: 50px;
   color: black;
}

.middle_content{
    font-weight: 700;
    letter-spacing: 3px;
    margin: auto;
    display: flex;
}

.bag{
    color: #20BD99;
   
}

.secure{
    display: flex;
    margin: auto 0;
    font-weight: 700;
    margin-right: 10px;
}

.secure i{
    font-size: 35px;
    color: #20BD99;
}

.secure p{
    margin: auto 5px;
}

@media screen and (max-width:1100px) {
    .wrapper{
        flex-direction: column;
    }

    .wrapper_amount{
        margin: -20px 50px;
    }

    .slider{
        width: 173%;
    }
    
    .bag{
        display: none;
    }

    .payment{
        display: none;
    }

    .address{
        display: none;
    }
    
    
}
    </style>
    <script>
      function manage_cart(pid,type){
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
				window.location.href='cart.php';
			}
			jQuery('.htc__qua').html(result);
		}	
	});	
}

    </script>


    

<?php
require('footer.php');
?>