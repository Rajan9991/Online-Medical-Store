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
            <h1> FORGOT PASSWORD</h1>
            <form action="#" method="post">
                <div class="field space">
                    <span class="fa fa-user">
                    </span>
                    <input type="text"  name="email" id="email" placeholder="Email ..................">
                    
                </div>
                <span class="field_error" id="email_error" style="font-size:30px; text-transform:uppercase; color:solid black;"></span>
		<br>
                              
                <div class="field ">
                    <input type="button" class="fv-btn" value="Submit" id="btn_submit" onclick="forgot_password();">
                </div>
                

            </form>
            
        </div>
        <div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
    </div>
</main>
<script>
    function forgot_password(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'forgot_password_submit.php',
					type:'post',
					data:'email='+email,
					success:function(result){
						jQuery('#email').val('');
						jQuery('#email_error').html(result);
						jQuery('#btn_submit').html('Submit');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
    </script>
<?php
require('footer.php');
?>