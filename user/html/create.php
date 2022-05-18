<?php
require('top.php');
?>
<main>
    <div class="bg-img-fluid">
        <div class="contant" style="width:35%; height:80%;">
            <h1 > REGISTER </h1>
            <form  action="#" method="post">
                <div class="field space">
                    <span class="fa fa-user">
                    </span>
                    <input type="text" name="name" id="name" placeholder="Enter your name">
                                        </div>
                                        <span class="field_error" id="name_error"></span>        

                               <div class="field space">
                               <span class="fas fa-envelope">
</span>
                                    <input type="email" name="email" id="email"  placeholder="Enter your email" style="width:65%;">&nbsp;
                                   
                    </div>
                    <span class="field_error" id="email_error"></span> 
                <div class="field space">
                    <span class="fa fa-mobile">
                    </span>
                    <input type="number" id="mobile" name="mobile"   placeholder="Enter your phone number">
                    
											

                </div>
               
                <span class="field_error" id="mobile_error"></span>
                                <div class="field space">
                    <span class="fa fa-lock">  
                    </span>
                    <input type="password" name="password" id="password" placeholder=" Enter Your password">
                    </div>
                    <span class="field_error" id="password_error"></span>
                    
                    <div class="field space">
<input type="button" value="SIGNUP" name="form" id="form" onclick="user_register()" style="background: #26a6d9;
  border: 1px solid #2eb6a4;
  color: white;
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer;">
                </div>
            </form>
            <div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>

            	
	</div>
    </div>
</main>
<script>
function user_register(){
	jQuery('.field_error').html('');
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var password=jQuery("#password").val();
	var is_error='';
	if(name==""){
		jQuery('#name_error').html('Please enter name');
		is_error='yes';
	}if(email==""){
		jQuery('#email_error').html('Please enter email');
		is_error='yes';
	}if(mobile==""){
		jQuery('#mobile_error').html('Please enter mobile');
		is_error='yes';
	}if(password==""){
		jQuery('#password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'register_submit.php',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
			success:function(result){
				if(result=='email_present'){
					jQuery('#email_error').html('Email id already present');
				}
				    
window.location.href='login.php';

        }	
		});
	}
	
}
function email_sent_otp(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('.email_sent_otp').html('Please wait..');
				jQuery('.email_sent_otp').attr('disabled',true);
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'email='+email+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('#email').attr('disabled',true);
							jQuery('.email_verify_otp').show();
							jQuery('.email_sent_otp').hide();
							
						}else if(result=='email_present'){
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Email id already exists');
						}else{
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Please try after sometime');
						}
					}
				});
			}
		}
		function email_verify_otp(){
			jQuery('#email_error').html('');
			var email_otp=jQuery('#email_otp').val();
			if(email_otp==''){
				jQuery('#email_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+email_otp+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('.email_verify_otp').hide();
							jQuery('#email_otp_result').html('Email id verified');
							jQuery('#is_email_verified').val('1');
							if(jQuery('#is_mobile_verified').val()==1){
								jQuery('#btn_register').attr('disabled',false);
							}
						}else{
							jQuery('#email_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		}
		
		function mobile_sent_otp(){
			jQuery('#mobile_error').html('');
			var mobile=jQuery('#mobile').val();
			if(mobile==''){
				jQuery('#mobile_error').html('Please enter mobile number');
			}else{
				jQuery('.mobile_sent_otp').html('Please wait..');
				jQuery('.mobile_sent_otp').attr('disabled',true);
				jQuery('.mobile_sent_otp');
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'mobile='+mobile+'&type=mobile',
					success:function(result){
						if(result=='done'){
							jQuery('#mobile').attr('disabled',true);
							jQuery('.mobile_verify_otp').show();
							jQuery('.mobile_sent_otp').hide();
						}else if(result=='mobile_present'){
							jQuery('.mobile_sent_otp').html('Send OTP');
							jQuery('.mobile_sent_otp').attr('disabled',false);
							jQuery('#mobile_error').html('Mobile number already exists');
						}else{
							jQuery('.mobile_sent_otp').html('Send OTP');
							jQuery('.mobile_sent_otp').attr('disabled',false);
							jQuery('#mobile_error').html('Please try after sometime');
						}
					}
				});
			}
		}
		function mobile_verify_otp(){
			jQuery('#mobile_error').html('');
			var mobile_otp=jQuery('#mobile_otp').val();
			if(mobile_otp==''){
				jQuery('#mobile_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+mobile_otp+'&type=mobile',
					success:function(result){
						if(result=='done'){
							jQuery('.mobile_verify_otp').hide();
							jQuery('#mobile_otp_result').html('Mobile number verified');
							jQuery('#is_mobile_verified').val('1');
							if(jQuery('#is_email_verified').val()==1){
								jQuery('#btn_register').attr('disabled',false);
							}
						}else{
							jQuery('#mobile_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		}		
					</script>
                

<?php
require('footer.php');
?>
