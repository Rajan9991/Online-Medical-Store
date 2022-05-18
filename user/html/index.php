<?php 
require('top.php');	
				
?>
<style>
  .produc .pro-container{
  display: flex;
  flex-wrap: wrap;
  gap:10px;
}

.produc .pro-container .pro{
  position: relative;
  overflow: hidden;
  flex: 1  1 5rem;
}


.produc.pro-container .pro .content{
  padding: 0.1em;
}
.produc .pro-container .pro:hover .icon{
  left:1rem;
}
.product{
  border:.1rem solid rgb(190,190,190);
border-radius: 0.5rem;
background:#fff;
border-radius: 2rem;
text-align: center;
position: relative;
overflow: hidden;
background-repeat: no-repeat;
background:inherit;
box-shadow:0 5px 15px rgba(0,0,0,.1);
border-radius:4px;
box-sizing:border-box;
flex: .1  .1 15rem;
}

</style>
<main style="background-color:#E5F1FF; box-shadow:10px 10px 20px  30px #bbb;">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-100" src="./asset/9.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="animated bounceInRight"style="animation-delay:1s">Pharmacy Products</h1>
        <p class="animated bounceInLeft"style="animation-delay:2s">shop for health,wellness and beauty products</p>
        <p class="animated bounceInLeft"style="animation-delay:3s"><a href="categories.php?id=4">Order Now</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="https://assets.bharian.com.my/images/articles/suplemint.jpg.transformed.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="animated zoomIn" style="animation-delay: 1s">Natural supplements</h1>
        <p class="animated fadeInUp" style="animation-delay: 2s">For Immune System</p>
        </div>
      </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="http://gami-biochem.com/Uploads/2017/02/10/589d4e860b6b0.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<section>
<!-- <swiperrrrrr> -->
    <div class="lunchbox" style="background-color:#fff; width:100%; box-shadow:10px 10px 20px #bbb; height:50%; margin-top:20px;">
<h4 style="color:#A9A9A9;">BEST  SELLER<br><span  style="color:black;">on carepoint</span></h4><hr>
        <!-- slider main container -->
        <div id="swiper1" class="swiper-container"> 
      
            <!-- additional required wrapper -->
            <div class="swiper-wrapper">
            <?php
							$get_product=get_product($con,'');
							foreach($get_product as $list){
							?>
      
                <!-- slides -->
                <div class="swiper-slide">
                  <div class="product">
                   
             <a href="product_detail.php?id=<?php echo $list['id']?>"><center><img class="photograph" 
             src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>"alt="" style="width:80%; height:80%;"></a>
                    <h2 class="product__name"><?php echo $list['name']?></h2>
                  <div class="price"> 
                       
                        <p  style="color:#CD1534; font-size:20px;"><span>&#8377</span><?php echo $list['price']?></p></div>
                        <div class="stars" style="color:orange;">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fa fa-star-half"></i>
                      </div>
                               </div>
                </div>
                <?php } ?>
      
            </div>
            
            <!-- pagination -->
            <div class="swiper-pagination"></div>
      
        </div>
      
        <!-- navigation buttons -->
        <button class="leftlst" id="leftlst" style="margin-top:200px;">
<i class="fa fa-chevron-left"  aria-hidden="true"></i></button>
<button class="rightlst" id="rightlst" style="margin-top:200px;">
<i class="fa fa-chevron-right" aria-hidden="true"></i></button>
 
      </div>
</section>
    
<section>
<div class="lunchbox" style="background-color:#fff; box-shadow:10px 10px 20px #bbb; width:100%; height:70%; margin-top:20px; margin-bottom:20px;">
<h4>NEW ARRIVALS</h4><hr>
        <!-- slider main container -->
        <div id="swiper2" class="swiper-container"> 
      
            <!-- additional required wrapper -->
            <div class="swiper-wrapper">
            <?php
							$get_product=get_product($con,'','','','','','yes');
							foreach($get_product as $list){
							?>
      
                <!-- slides -->
                <div class="swiper-slide">
                  <div class="product">
                  <a href="product_detail.php?id=<?php echo $list['id']?>">
                  <center><img class="photograph" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>"alt="" style="width:70; height:50;"></a>
                    <h2 class="product__name"><?php echo $list['name']?></h2>
                  <div class="price"> 
                  <p  style="color:#CD1534; font-size:20px;"><span>&#8377</span><?php echo $list['price']?></p></div>

                             <div class="stars" style="color:orange;">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fa fa-star-half"></i>
                      </div>
                                          </div>
                </div>
               
                <?php } ?>
              </div>
            <!-- pagination -->
            <div class="swiper-pagination"></div>
      
        </div>
      
        <!-- navigation buttons -->
        <button class="leftlst" id="leftlst1" style="margin-top:200px;">
<i class="fa fa-chevron-left"  aria-hidden="true"></i></button>
<button class="rightlst" id="rightlst1" style="margin-top:200px;">
<i class="fa fa-chevron-right" aria-hidden="true"></i></button>
 
      </div>
</section>
</main>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>
      <script>
          (function() {

'use strict';
 
const mySwiper = new Swiper ('#swiper1', {
  
  loop: true, 
  
    slidesPerView: 'auto',
    centeredSlides: true,
  
  a11y: true,
  keyboardControl: true,
  grabCursor: true,
  
  // pagination
  pagination: '.swiper-pagination',
  paginationClickable: true,
  
  // navigation arrows
  nextButton: '#leftlst',
  prevButton: '#rightlst',
  
});



})(); /* IIFE end */
(function() {

'use strict';
 
const mySwiper = new Swiper ('#swiper2', {
  
  loop: true, 
  
    slidesPerView: 'auto',
    centeredSlides: true,
  
  a11y: true,
  keyboardControl: true,
  grabCursor: true,
  
  // pagination
  pagination: '.swiper-pagination',
  paginationClickable: true,
  
  // navigation arrows
  nextButton: '#leftlst1',
  prevButton: '#rightlst1',
  
});



})();


         
      </script>
      <?php
require('footer.php');
?>