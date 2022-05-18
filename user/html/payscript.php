<?php
 $apikey = "rzp_test_JiYaRn52devAze";
 
require('connection.inc.php');

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
<form action="thank_you.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_JiYaRn52devAze" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="28506"// Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
  
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
       data-buttontext="Pay with Razorpay"
    data-name="CAREPOINT"
    data-description="ONLINE PHARMACY STORE"
        data-prefill.name=""
    data-prefill.email=""
    data-theme.color="#AD1156"
></script>
</form>
