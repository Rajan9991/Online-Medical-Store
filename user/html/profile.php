<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php

}
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
<main style="background:#ECF0F1 ;">
<div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                                  <div class="mt-3">
                      <h4><?php echo $_SESSION['USER_NAME']?></h4>
                      <?php 
    $i=1;
    while($row=mysqli_fetch_assoc($res)){?>
                      <p class="text-secondary mb-1"> <?php echo $row ['mobile'] ?></p>
                      <p class="text-muted font-size-sm"><?php echo $row ['email'] ?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <a href="profile.php"><h6 class="mb-0" style="font-size:20px; color:black;">
                <i class="fas fa-user-circle"></i>&nbsp;&nbsp;Account</h6></a>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><a href="My_order.php"><h6 class="mb-0" style="font-size:20px; color:black;"><i class="fab fa-first-order-alt"></i>
                    &nbsp;&nbsp;Order</h6></a>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><a href="#"><h6 class="mb-0" style="font-size:20px; color:black;"><i class="fas fa-user-circle"></i>
                    &nbsp;&nbsp;Edit Profile</h6></a>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><a href="logout.php"><h6 class="mb-0" style="font-size:20px; color:black;"><i class="fas fa-sign-out-alt"></i>
                    &nbsp;&nbsp;Logout</h6></a>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><a href="wishlist.php"><h6 class="mb-0" style="font-size:20px; color:black;"><i class="fas fa-heart"></i>
                    &nbsp;&nbsp;Wishlist</h6></a>
                    
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="name" id="name" placeholder="Your Name*" 
											style="width:50% color:white; border:white;" value="<?php echo $_SESSION['USER_NAME']?>">
                    </div>
                    
                  </div>
                  <span class="field_error" id="name_error"></span>
                  <hr>
                 
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row ['email'] ?>
                    </div>
                  </div>
                 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-1" style="margin-left:10px;">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row ['mobile'] ?>
                    </div>
                  </div>
                  <hr>
                    
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " 
                      class="fv-btn" onclick="update_profile()" id="btn_submit" style="margin-left:20px; background:#E74C3C ">Update</a>
                    </div>
                  </div>
                </div>
              </div>

                 </div>
                  </div>

                  <?php } ?>

            </div>
          </div>

        </div>
    </div>
    </main>
<style>

.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}

</style>
<script>
		function update_profile(){
			jQuery('.field_error').html('');
			var name=jQuery('#name').val();
			if(name==''){
				jQuery('#name_error').html('Please enter your name');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'update_profile.php',
					type:'post',
					data:'name='+name,
					success:function(result){
						jQuery('#name_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
		</script>

<?php 
require('footer.php');
?>
