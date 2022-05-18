<?php 

if(isset($_POST['submit'])){


    $host      =      'localhost';
    $dbname    =      'ecom';
    $dbuser    =      'root';
    $dbpass    =      '';
    $tbname    =      'email_list';


	$conn = mysqli_connect($host,$dbuser,$dbpass,$dbname);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
 
	//Email
	$query_email = "SELECT * FROM `$tbname` WHERE email ='$email' ";

	$result_email = $conn->query($query_email);

	$client_email = $result_email->fetch_array();

	if($client_email)
	{
	$msg='<div class="msg-mailsb msg-mail-red">Your email '.$email.' already exists. Please check email</div> ';

	}else { 
	$sql = "INSERT INTO email_list (name, email) VALUES  ('$name', '$email')";

	$conn->query($sql);
	
	$msg= '<div class="msg-mailsb msg-mail-green">
						Thanks '.$name.' for Share Your Email '.$email.' .<br>
						  we  willl send you the latest news realted to our website.<br>
						<span class="mailsub-goback-btn"><a href="index.php">Click here</a></span>  return to the recent page you were browsing.
					</div> ';
}
}


?>

<section class="section-subscribe bg-light">
<div class="container">
<div class="row justify-content-center align-items-center">
<div class="col-md-12 mb-4">
<h1 class="heading">
GET News &amp; Update</h1>
</div>
<div class="col-md-12">
<p><?php if(isset($_POST['submit'])){  echo $msg; } ?></p>

<form action="#" method="post">
<div class="row">
<div class="col-md-4 mb-3">
<input type="text" class="form-control" name="name" id="name" placeholder="your name here">
</div>
<div class="col-md-4 mb-3">
<input type="email" class="form-control" name="email" id="email" placeholder="your email here">
</div>
<div class="col-md-4 mb-3">
<input type="submit" class="btn btn-secondary w-95" name="submit" value="Subscribe">
</div>


</div>
</form></div>
</div>
</div>
</section>
<footer class="site-footer">
<div class="container">

<div class="row mb-5">
<div class="col-md-3 mb-5">
<h2>About Us</h2>
<p>Accusantium dolor ratione maiores est deleniti nihil? 
Dignissimos est, sunt nulla illum autem in, quibusdam 
cumque recusandae, laudantium minima repellendus.</p>
</div>
<div class="col-md-3 mb-5">
<h2>Address</h2>
<ul class="list-unstyled footer-link">
<li class="d-flex">
<span class="me-3">Address:</span><span class="text-white">Boaring road,patna,near s.k puri park</span>
</li>
<li class="d-flex">
<span class="me-3">Telephone:</span><span class="text-white">620-548-674-8</span>
</li>
<li class="d-flex">
<span class="me-3">Email:</span><span class="text-white">nikitasharma82856@gmail.com</span>
</li>
</ul>
</div>
<div class="col-md-3 mb-5">
<h2>OUR Services</h2>
<ul class="list-unstyled footer-link">
<li><a href="Profile.php">My Account</li></a>
<li><a href="cart.php">My Cart</li></a>
<li><a href="Profile.php">My Account</li></a>
<li><a href="login.php">Login</li></a>
<li><a href="wishlist.php">Wishlist</li></a>
<li><a href="checkout.php">Checkout</li></a>
</div>
<div class="col-md-3">
<h2>social media</h2>
<ul class="list-unstyled footer-link d-flex footer-social">
<li><a href="https://www.facebook.com/profile.php?id=100047135152983"><span class="fa fa-facebook"></span></a></li>
<li><a href="https://www.facebook.com/profile.php?id=100047135152983"><span class="fa fa-instagram"></span></a></li>
<li><a href="https://www.facebook.com/profile.php?id=100047135152983"><span class="fa fa-twitter"></span></a></li>
<li><a href="https://www.facebook.com/profile.php?id=100047135152983"><span class="fa fa-youtube"></span></a></li>
</ul>
</div>
</div>
<div class="row">
<div class="col-12 text-md-center text-left">
<p>&copy; 2021 online Pharmacy Store. All rights reserved | Design by
						NIKITA SHARMA</p></div>
</div>
</div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./js/main.js"></script>
<script src="jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>	