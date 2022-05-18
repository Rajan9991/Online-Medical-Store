<?php
include ("top.php");
?>
<script>
function validate()
{
var fnm=document.getElementById("fname").value;
var lnm=document.getElementById("lname").value;
var mob=document.getElementById("mobile").value;
var email=document.getElementById("email").value;
var cdon=document.getElementById("cdon").value;
var address=document.getElementById("address").value;
if(fnm=="")
{
//alert("First Name is blank, please enter the Name");
swal("First Name is blank!", "...please enter the Name!");
document.getElementById("fname").focus();
return false;
}
if(!fnm.match(/^[A-Z]+$/))
{
//alert("Name must be in capital letter");
swal("First Name must be in capital letter!", "...please enter the name in given format!");
document.getElementById("fname").focus();
return false;
}
if(lnm=="")
{
//alert("Last Name is blank, please enter the Name");
swal("Last Name is blank!", "...please enter the Name!");
document.getElementById("lname").focus();
return false;
}
if(!lnm.match(/^[A-Z]+$/))
{
//alert("Last Name must be in capital letter");
swal("Last Name must be in capital letter!", "...please enter the name in given format!");
document.getElementById("lname").focus();
return false;
}
if(mob=="")
{
//alert("Mobile is blank, please enter the mobile number");
swal("Mobile is blank!", "...please enter the mobile number!");
document.getElementById("mobile").focus();
return false;
}
if(!mob.match(/^[\d]{10}$/))
{
//alert("Invalid mobile number");
swal("Invalid mobile number!");
document.getElementById("mobile").focus();
return false;
}
if(email=="")
{
//alert("email is blank, please enter the email");
swal("email is blank!", "...please enter the email!");
document.getElementById("email").focus();
return false;
}
if(!email.match( /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
{
//alert("Invalid mobile number");
swal("Invalid email address!");
document.getElementById("email").focus();
return false;
}
if(cdon=="")
{
//alert("donation amount is blank, please enter the amount");
swal("donation amount is blank!", "...please enter the amount!");
document.getElementById("cdon").focus();
return false;
}
if(!cdon.match(/^[\d]{3,}$/))
{
//alert("Invalid mobile number");
swal("You can't donate less than 100rs");
document.getElementById("cdon").focus();
return false;
}
if(address=="")
{
//alert("email is blank, please enter the email");
swal("address is blank!", "...please enter the address!");
document.getElementById("address").focus();
return false;
}
}
</script>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}</script>
<body>
  <?php
//include 'dbcon.php';
  if(isset($_POST['submit'])){
    $fname= mysqli_real_escape_string($con,$_POST['fname']);
	$lname= mysqli_real_escape_string($con,$_POST['lname']);
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $mobile= mysqli_real_escape_string($con,$_POST['mobile']);
    $cdon= mysqli_real_escape_string($con,$_POST['cdon']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    
        $insertquery= "insert into donation(fname,lname,email,mobile,cdon,address) values('$fname','$lname','$email','$mobile','$cdon','$address')";
        $iquery=mysqli_query($con,$insertquery);
        if($con){
       ?>
       <div class="bg-imagee"></div>
	<div class="bg-textt ">
		<div ><img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8Y2hhcml0eXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" 
		alt="nai aaya image" height="100%" width="100%" ></div>
       <form method="post" action="pgRedirect.php" class="pay" >
		<table 
			<tbody>
				<tr>
					<th><h3>CONFIRM YOUR DONATION AMOUNT</h3></th>
					
				</tr>
				<tr>
				
					
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off" type="hidden"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					
					
					<td><input id="CUST_ID" tabindex="2" type="hidden"  maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				<tr>
					
					
					<td><input id="INDUSTRY_TYPE_ID"type="hidden"tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					
				
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off"type="hidden" value="WEB">
					</td>
				</tr>
				<tr>
					
					<td><label class="mt-3">Total Amount of your Donation</label></td>
					<td><input class="mt-3 " title="TXN_AMOUNT" tabindex="10" class="form-control text-primary"
						type="text" name="TXN_AMOUNT" value="<?php echo $cdon; ?>"><span style="color:white"> INR</span>
					</td>
				</tr>
				<tr>
					
					
					<td><button type="cancel" class="btn btn-danger " onclick="window.location='donation.php';return false">Cancel</button></td>
		            <td><input class="btn btn-primary " value="Pay Now" type="submit"	onclick=""></td>		
				</tr>
			</tbody>
		</table>
		
	</form>
  </div>
          <script>
        // window.location.href="pgRedirect.php";
          </script>
          <?php
        }else{
          ?>
          <script>
           alert("not inserted");
          </script>
          <?php
        }

     }
    

  ?>
<div class="don">

<div class=" container-fluid">
<div class="container">
<div class="d-flex justify-content-center h-100">
<div class="card2">
<div class="card-header text-center">
<centre> <h3>Donation Form</h3><centre>
      </div>
      <div class="card-body">
<form method="post" >
<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
<input type="text" placeholder="first name" id="fname" name="fname" class="form-control"/>

<input type="text" placeholder="last name" id="lname" name="lname"  class="form-control"/>
</div>
<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
						</div>
            <input type="text" placeholder="mobile number" name="mobile" id="mobile" class="form-control">
</div>
<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i  class="fas fa-envelope"></i></span>
						</div>
<input type="text"placeholder="enter email" id="email" name="email"  class="form-control"/>
</div>

<div  class="contact-box name text-white" style=" margin-top: 2%; margin-left: 0; margin-right: 1%; width: 89%;">Donation<span style="color: red;"> *</span><br/>
<input type="text" id="cdon" style=" margin-left: 3%;" name="cdon" placeholder="Min 100Rs" class="form-control"/>
</div>
<div  class="contact-box name text-white" style=" margin-left: 0; margin-top: 4%; margin-right: 2%; padding-bottom: 18px;">Full Address<br/>
<textarea id="address"  placeholder="Enter your full address" name="address"  rows="3" class="form-control"></textarea>
</div>
<div class="form-group">
<button type="cancel" class="btn float-right cancel_btn" onclick="window.location='index.php';return false">Cancel</button>
<input class="btn float-left login_btn" name="submit" value="Submit" type="submit" onclick="return validate();"/>
</div>

</form>
</div>
</div>
	</div>
  </div>
  </div>
  </div>
<div>
<?php
include ('footer.php');
?>