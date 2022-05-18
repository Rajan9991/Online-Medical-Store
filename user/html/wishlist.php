<?php
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$uid=$_SESSION['USER_ID'];
$res=mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.id from 
product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>
<main>
    <div class="wrapper">

        <div class="wrapper_content">
        <?php
         while($row=mysqli_fetch_assoc($res)){
             ?>
               
										
            <div class="product_wrap" style="background:#fff;
            width:90%;
   border-radius: 2rem;
   text-align: center;
   position: relative;
   overflow: hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
   border-radius:4px;
   box-sizing:border-box;
   flex: .1  .1 15rem;
  ">
            
             
                <div class="product_info">
                    <div class="product_img">
                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" 
                        alt="ProductImage" width="250px" height="250px">
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="product_data">
                        <div class="description">
                            <div class="main_header">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['name']?>                            </div>
                            <div class="sub_header">
                                <span></span>
                            </div>
                        </div>
                        <div class="qty">
<p><a href="wishlist.php?wishlist_id=<?php echo $row['id']?>" 
 style="background-color: #ff3f6c; color:#fff;  font-weight: 600;  padding: 10px 15px; cursor: pointer;">Remove</a> </p>            
                    </div>
                        <div class="price">
                            <div class="current_price"><span>&#8377</span>&nbsp;<?php echo $row['price']?></div>
                            <div class="normal_price"><span style="color:#707B7C;">&#8377
                        </span><?php echo  number_format($row['mrp'])?></div>
                                                    </div>
                    </div>
                </div><hr>
                         
            <div class="slider">
                <div class="bg_shadow"></div>
                <div class="select_size">
                                    </div>
                
            </div>
            <?php } ?>
        </div>
        
         </div>
    </main>
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
    width: 90%;
    height: auto;
    padding: 15px;
    margin: 50px 0;
    position: relative;
    margin-left: 50px;
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