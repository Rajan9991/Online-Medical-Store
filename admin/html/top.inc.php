<?php
require('connection.inc.php');
require('function.inc.php');

    if (isset($_SESSION['ADMIN_LOGIN'])&& $_SESSION['ADMIN_LOGIN']!='')
    {

    }else{
        header('location:form.php');
       die();
    }
?>
<!DOCTYPE html> 
<html lan="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"content="width=device-width intial-scale=1">
<meta http-equiv="X-UA-Compatable" content="ie=edge">
<title>Admin Dashboard</title>
<!..font awesome..>
<script src="https://kit.fontawesome.com/030448948b.js" crossorigin="anonymous"></script>
<!..custom stylesheet..>
<link rel="stylesheet" href="./css/style.css" />
<!...font...>


</head>
<body>
    <section id="sidebar">
    <div class="sidebar-brand">
        <h3>
            <i class=" fa fa-plus-square fa-1x" style="background-color:#0ae0e7ee;font-style: italic;"></i><span style="font-family: Georgia, 'Times New Roman', Times, serif;  font-style: italic; font-size:23px;">CAREPOINT</span>
        </h3>
    </div>
    <div class="sidebar-menu">
        <ul>
           <li><a href="user.php"><i class="fa fa-desktop"></i><span style="font-size:20px;">Dashboard</span></a></li><br>
           <li><a href="user.php"><i class="fa fa-users"></i><span style="font-size:20px;">Customers</span></a></li><br>
           <li><a href="product.php"><i class="fa fa-file"></i><span style="font-size:20px;">Products</span></a></li><br>
           <li><a href="order.php"><i class="fa fa-file-pdf"></i><span style="font-size:20px;">Orders</span></a></li><br>
           <li><a href="categories.php"><i class="far fa-clone"></i><span style="font-size:20px;">Categories</span></a></li><br>
           <li><a href="logout.php"><i class="fa fa-sign-out"></i><span style="font-size:20px;">Logout</span></a></li><br>
           <li><a href="contact_us.php"><i class="fas fa-portrait"></i><span style="font-size:20px;">Contact Us</span></a></li><br>

        </ul>
    </div>
    </section>
    <section id="main-content">
        <header class="main-header">
            <div class="header-left">
                <h2>
                    <i class="fa fa-bars"></i><span><a href="user.php">Dashboard</a></h2></span>
            </div>
            <div class="header-left">
                            </div>

            <div class="header-left">
            
                    <img src="assets/12.png" class="img-responsive"/>
                    <h3><?php echo $_SESSION['ADMIN_USERNAME'] 
                    ?></h3>
                    
            </div>
<div class="clear">
</div>
        </div>

        </header>
    