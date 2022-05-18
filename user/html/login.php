<?php
require('top.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='my_order.php';
	</script>
	<?php
}
?>
<main>
    <div class="bg-img-fluid">
        <div class="contant">
            <h1> Log In</h1>
            <form action="#" method="post">
                <div class="field space">
                    <span class="fa fa-user">
                    </span>
                    <input type="text"  name="login_email" id="login_email" placeholder="Email or  phone">
                    
                </div>
                <span class="field_error" id="login_email_error"></span>
		
                               <div class="field space">
                    <span class="fa fa-lock">  
                    </span>
                    <input type="password" name="login_password" class ="login_password"  id="login_password" placeholder="password">
                                  </div>
                                  <span class="field_error" id="login_password_error"></span>
                                  
               
                <div class="pass">
                    <a href="forget.php">Forgot  password</a>
                </div>
                <div class="field ">
                    <input type="button" name="form" id="form" value="LOGIN" onclick="user_login()" style="background: #26a6d9;
  border: 1px solid #2eb6a4;
  color: white;
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer;">
                </div>
                

<div class="Signup">Don't have account?
<a href="create.php">Signup Now</a></div>
            </form>
            <div class="form-output">
									<p class="form-messege"></p>
								</div>

        </div>
    </div>
</main>
<script>
    function user_login(){
	jQuery('.field_error').html('');
	var email=jQuery("#login_email").val();
	var password=jQuery("#login_password").val();
	var is_error='';
	if(email==""){
		jQuery('#login_email_error').html('Please enter email');
		is_error='yes';
	}if(password==""){
		jQuery('#login_password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'login_submit.php',
			type:'post',
			data:'email='+email+'&password='+password,
			success:function(result){
                
               window.location.href=window.location.href;
               }
		});
       
    }
    }
    
    </script>
<?php
require('footer.php');
?>