<?php
require('connection.inc.php');
require('function.inc.php');
if(isset($_POST['action'])){
    $sql="SELECT * FROM 'product' WHERE `categories_id` !=''";
    
    if(isset($_POST['categories_id'])){
        $categories=implode("','", $_POST['categories_id']);
        $sql .="AND categories_id IN('".$categories_id."')";

    }
    $result=$conn->query($sql);
    $output='';
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $output .='<div class="box-container">
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="'.$row['image'].'" height="200">
                <div class="content">
                    <h6>'.$row['name'].'</h6>
                    <div class="price"><span>Price:'.number_format($row['price']).'<span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Add To cart</a>
                </div>
            </div>
            </div>';
        }
    }
    else{
        $output="<h3>No product found!</h3>";
    }
    echo $output;
}

?>