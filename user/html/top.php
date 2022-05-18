<?php
require('connection.inc.php');
require('function.inc.php');
require('add_to_cart.inc.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID'];
	
	if(isset($_GET['wishlist_id'])){
		$wid=get_safe_value($con,$_GET['wishlist_id']);
		mysqli_query($con,"delete from wishlist where id='$wid' and user_id='$uid'");
	}

	$wishlist_count=mysqli_num_rows(mysqli_query($con,"select product.name,product.image,product.price,product.mrp,
	wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}

$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="My Ecom Website";
$meta_desc="My Ecom Website";
$meta_keyword="My Ecom Website";
if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='contact.php'){
	$meta_title='Contact Us';
}


?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"content="width=device-width intial-scale=1">
<meta http-equiv="X-UA-Compatable" content="ie=edge">
<title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
	<meta name="keywords" content="<?php echo $meta_keyword?>">
    <title>online medical store</title>
<link rel="stylesheet" herf="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
   <!..Bootstrap cdn..>
<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
crossorigin="anonymous">
<!..font awesome..>
<script src="https://kit.fontawesome.com/030448948b.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
 integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw==" crossorigin="anonymous"
 referrerpolicy="no-referrer" />
<!..custom stylesheet..>
<link rel="stylesheet" href="./css/style.css" />
</head>
<body>
<header>  
<div class="container"style="box-shadow:10px 10px 20px #5fa6c3;">
<div class="row">
<div class="col-md-4  col-4 text-left ">
<h4 class ="my-md-3 text-white" style="	font-family: Georgia, 'Times New Roman', Times, serif;  font-style: italic;

"><i class=" fa fa-plus-square fa-1x" style="background-color:#32aeb1;font-style:italic; ">&nbsp;</i>
 CAREPOINT</h4></div>
 <div class="col-md-4 col-4 text-center" style="margin-top:15px;">
 <form action="search.php" method="get">

  <input type="text"  placeholder="search for product" name="str" style="border:5px solid #fff;  height:40px; width:400px; background:#fff;  padding:5px 10px;">
  </form>
<label for="" class="icon" style="position:absolute; right:-3px; top:0;   width:5px; text-align:center; border:5px solid #fff; height:40px; color:#32aeb1; font-size:20px; ">
  <i class="fas fa-search"></i></label>
  
</div>

<div class ="col-md-4 col-4 text-right">
<p class="my-md-3 header-links">
<?php if(isset($_SESSION['USER_LOGIN'])){
	?>
<p style="font-size:20px; color:white;"><a href="profile.php" class="text-white"><i class="fas fa-user-circle"
 style="font-size:25px;"></i></a>&nbsp;
<?php echo $_SESSION['USER_NAME']?></p>
<?php
										}else{
											echo '<a href="login.php" class="text-white">Login/Register</a></p>';
										}
										?>
</div>
</div>
</div>
  <div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow:10px 10px 20px #bbb;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
   aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-Nav">
    <ul class="navbar-nav">
      <li class="nav-item active">
       <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
		</li>
    <?php
								foreach($cat_arr as $list){
									?>
							<li class="nav-item active"><a class="nav-link" href="categories.php?id=<?php
                echo $list['id']?>"><?php echo $list['categories']?></a></li>
				<?php
				}
				?>

      <li class="nav-item">
        <a class="nav-link" href="contact.php">CONTACT US</a>
      </li>
</ul>
  </div>
 
                    </li>
  <div class="navbar-nav">
 <li class="nav-item  mx-2 cart-icon" >
 <a href="#"><i class="fa fa-shopping-cart P-2 fa-1x" style=" color:black; background-color:white; border-radius:40%; width:20px; height:-30px;"></i></a>
 <a href="cart.php"><span class="htc__qua" style="position:absolute; color:red; top:7px; right:28px; height:-50px;"><?php echo $totalProduct?></span></a>
 </li>
</div>
</nav>
</header>
