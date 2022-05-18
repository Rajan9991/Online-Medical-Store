+<?php
require('connection.inc.php');
require('function.inc.php');
$msg="";
if(isset($_POST['submit'])){
    $username=get_safe_value($con,$_POST['username']);
    $password=get_safe_value($con,$_POST['password']);
    $sql="select * from admin_users where username='$username' and password='$password'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        $row=mysqli_fetch_assoc($res);
		if($row['status']=='0'){
			$msg="Account deactivated";	
		}else{
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_USERNAME']=$username;
        $_SESSION['ADMIN_ROLE']=$row['role'];
        header('location:categories.php');
        die();
        }
    }else{
        $msg="Please Enter Correct Login Details";
    }
}
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport"content="width=device-width intial-scale=1">
        <meta http-equiv="X-UA-Compatable" content="ie=edge">
        <title>sign in form</title>
        <script src="https://kit.fontawesome.com/030448948b.js" crossorigin="anonymous"></script>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&family=Gugi&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sofia&display=swap')
     *{
    margin : 0;
    padding: 0;
    box-sizing:border-box;

}
.bg-img-fluid{
    background: url('./assets/nine.jpg');
    padding-left: 0vh;
    height: 100vh;
    background-size:cover;
    width: 100vw;
    background-repeat: no-repeat;
    min-height: 100vh;
    background-position: center;
    width:unset;
}
.bg-img-after{
    position: absolute;
    content: '';
    top:0;
    left:0;
    height:100%;
    width:100%;
    background:rgba(0,0,0,7);
}
.content
{
    position: absolute;
    top:50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    z-index: 999;
   text-align: center;
    padding: 60px 32px;
    background:rgb(255,255,255,0.04);
    box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
}
.content header
{
    color:rgba(0,0,0);
    font-size: 30px;
    font-size: 50px;
    font-weight: 600;
    margin: 0 0 35px 0;
    font-family: 'Montserrat','Times New Roman', Times, 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.field{
        position: relative;
        height: 45px;
        width:100%;
        display: flex;
        background:rgba(255,255,255,0.94);
}
.field span{
    color: #222;
    width: 40px;
    line-height: 50px;

}
.show{
    position: absolute;
    right:13px;
    font-size: 13px;
    font-weight: 700;
    color: #222;
    cursor: pointer;
    display: none;
    font-family: 'Montserrat',Georgia, 'Times New Roman', Times, serif;
}
.password:valid ~ .show{
    display: block;
}

.field input{
    height: 100%;
    width:100%;
    background: transparent;
    border: none;
    outline: none;
    color: #222;
    font-size: 16px;
    font-family: 'poppins', Georgia, 'Times New Roman', Times, serif;
}
.space{
    margin-top: 16px;
}
.pass{
    text-align: left;
    margin: 10px 0;
}
.pass a{
    color: rgb(20, 20, 20);
    font-size: 20px;
    font-family: 'poppins',Georgia, 'Times New Roman', Times, serif;
    text-decoration:solid;
}
.pass:hover a{
    text-decoration: underline;
}
input[type="submit"]
{
    background: #3498db;
    border: 1px solid #2691d9;
    color: white;
    font-size: 18px;
    letter-spacing: 1px;
    font-weight: 600;
    cursor: pointer;
}
input[type="submit"]:hover{
    background: #2691d9;
}
.login{
    color: white;
    margin: 20px 0;
    color: black;
    font-family: 'poppins',Georgia, 'Times New Roman', Times, serif;
}
.link{
    display: flex;
    cursor: pointer;
    color:white;
    margin: 0 0 20px 0;
}
.link i{
    font-size: 17px;
}
.filed-error{
    color:#000;
    font-weight:700;
    font-family: 'poppins',Georgia, 'Times New Roman', Times, serif;
    margin-top:10px;

}

        </style>
        </head>
    <body>
        <div class="bg-img-fluid">
            <div class="content">
                <header> Login Form</header>
                <form method="post">
                    <div class="field space">
                        <span class="fa fa-user">
                        </span>
                        <input type="text"  name="username" class="form-control"  required placeholder="username">
                        
                    </div>
                    <div class="field space">
                        <span class="fa fa-lock">  
                        </span>
                        <input type="password"  name="password"  class="form-control"  required placeholder="password">
                        <span class="show">Show</span>
                    </div><br>
                                        <div class="field ">
                        <input type="submit" name="submit" value="LOGIN">
                    </div>
                    </form>
                    <div class="filed-error"><?php echo $msg?>
                    </div>
                    </div>
                    </div>
        <script>
            const pass_field=document.querySelector('.password');
            const show_btn=document.querySelector('.show');
            show_btn.addEventListener('click',function(){
             if(pass_field.type==="password"){
                 pass_field.type="text";
                show_btn.style.color="text";
                show_btn.style.color="#3498db"
                show_btn.textContent="HIDE";
             }
             else{
                 pass_field.type="password";
                 show_btn.style.color="#222"
                 show_btn.textContent="Show";

             }
            });
        </script>
    </body>
</html>