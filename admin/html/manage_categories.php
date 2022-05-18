<?php
require('top.inc.php');
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
    $row=mysqli_fetch_assoc($res);
    $categories=$row['categories'];
    }else{
        header('location:categories.php');
    die();
    }
   
}
if(isset($_POST['submit'])){
    $categories=get_safe_value($con,$_POST['categories']);
  $res=mysqli_query($con,"select * from categories where categories='$categories'");
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }else{
                $msg="<h3>Categories Already Exist</h3>";
            }
        }else{
            $msg="<h3>Categories Already Exist</h3>";
        }
 
    } if($msg=='')  {
if(isset($_GET['id'])&& $_GET['id']!=''){
        mysqli_query($con,"update categories set categories='$categories' where id='$id'");
    }else{
        mysqli_query($con,"insert into categories(categories,Status) values('$categories','1')");

    }
    header('location:categories.php');
    die();
}
}
?>
<style>
.card-box{
    float: left;
    width: 21%;
    margin-top: 120px;
    background:linear-gradient(45deg,#F08080 0%,#b4627d 100%);
    margin-left: 2%;
    display: fixed;
    margin-right: 2%;
    padding: 25px;
    color: #fff;
}
section#sidebar{
    width: 20%;
    background-image:linear-gradient(#85C1E9,#85C1E9), url("../assets/nine.jpg");
    top: 0;
    left: 0;
    color: white;
    position: fixed;
    height: 100%;

}
</style>
<div class="clear"></div>
    <div class="main-content-info container">
        <div class="card-box">
            <h2 class="cus-num cus-h">1</h2>
            <p>Customers</p>
        </div>
        <div class="main-content-info container">
            <div class="card-box">
                <h2 class="cus-num cus-pro">16</h2>
                <p>Products</p>
            </div>
            <div class="main-content-info container">
                <div class="card-box">
                    <h2 class="cus-num cus-ord">4</h2>
                    <p>Orders</p>
                    
                </div>
                <div class="main-content-info container">
                    <div class="card-box">
                        <h2 class="cus-num cus-inc">3</h2>
                        <p>Contact</p>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="container">
        <div class="header">
            <h2>Add Categories</h2>
        </div>
        <form method="post">
            <div class="form-control ">
                <label>Categories</label>
                <input type="Text" name="categories" id="company" required placeholder="Enter Categories name.." autocomplete="off" value="<?php echo $categories ?>">
                       </div>
             <input type="Submit" name="submit" class="btn"  id="btn" name="">
             <div class="filed-error"><?php echo $msg?>

        </form>
            </div>
     
         <?php
require('footer.inc.php');
?>