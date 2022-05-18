<?php
function pr($arr){
    echo'<pre>';
    print_r($arr);
}
function prx($arr){
    echo'<pre>';
    print_r($arr);
    die();
}
function get_safe_value($con,$str){
    if($str!=''){
   $str=trim($str);
    return  mysqli_real_escape_string($con,$str);
}
}
function productSoldQtyByProductId($con,$pid){
	$sql="select sum(product_detail.qty) as qty from product_detail,`order` 
	where `order`.id=product_detail.order_id and product_detail.product_id=$pid and `order`.order_status!=4 and 
	((`order`.payment_type='payu' and `order`.payment_status='Success') or (`order`.payment_type='COD' and `order`
	.payment_status!=''))";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}
function productQty($con,$pid){
	$sql="select qty from product where id='$pid'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}

?>