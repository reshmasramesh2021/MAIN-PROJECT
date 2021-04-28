<?php require('session.php'); ?>
<!-- Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title> Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Skill Point Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <!-- animation -->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400i,700i" rel="stylesheet">

    <!--//online fonts -->
</head>

   
<body>
<?php

 require('db/db.php');
    // If form submitted, insert values into the database.

    require 'src/Fernet.php';
    require 'src/Exception.php';
    require 'src/InvalidTokenException.php';
    require 'src/TypeException.php'; 
    require 'src/FernetMsgpack.php';
 
    use Fernet\Fernet;
    use Fernet\InvalidTokenException;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
       
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `login` WHERE username='$username'";
		
		$result = mysqli_query($con,$query) or die(mysqli_error());
        $result1=mysqli_fetch_assoc($result);

// $key_fetch = 'stOQyxim0WxwEoj2TndRkiI2ftK2QL8O9GlwK7RfKNU';
// $pass='gAAAAABgeRuKl5CZz3NDIYoV44o16cOu4CWds_1T6_P0zZZPdCDmJcx7zofG_Wom-nl__PSoEGp5Wh-qUsB8CNzZkZGq6cJ_rw';
// $fernet = new Fernet($key_fetch);
// $decrypt_pass=$fernet->decode($pass);
// var_dump($decrypt_pass);exit();


        //var_dump($result1);exit();
		if(mysqli_num_rows($result)=='1')
		  {
			
			$key_fetch = 'stOQyxim0WxwEoj2TndRkiI2ftK2QL8O9GlwK7RfKNU';
            //var_dump($key_fetch);exit();
            $pass='gAAAAABgeRuKl5CZz3NDIYoV44o16cOu4CWds_1T6_P0zZZPdCDmJcx7zofG_Wom-nl__PSoEGp5Wh-qUsB8CNzZkZGq6cJ_rw';
        //var_dump($pass);exit();
            $fernet = new Fernet($key_fetch);
            $decrypt_pass=$fernet->decode($pass);
              //var_dump($decrypt_pass);exit();
			$type = $result1['type'];
			if( $decrypt_pass==$password)
			  {
				//also want to specify different pages for different users here..
                
				$_SESSION['user'] = $username;
				$_SESSION['type'] = $type;
				switch($type)
				{
					case 0 :
						header("Location: admin/index.html"); // Redirect to client home
						break;
					case 1 :
						header("Location: distributor/index.php"); // Redirect to wmanager home
						break;
					case 2 :
						header("Location: customer/index.php"); // Redirect to  smanager home
						break;
					case 3 :
						header("Location: wmanager/index.html"); // Redirect to  customer home
						break;
                        case 4 :
                            header("Location: smanager/index.html"); // Redirect to  customer home
                            break;
                            case 5 :
                                header("Location: stockmanager/index.html"); // Redirect to  customer home
                                break;
					default :
						
						echo "<div class=\"alert alert-warning alert-dismissible fade show\"  role=\"alert\">Sorry!! Some error occured.<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span></button></div>";
					
				}
              }
			else
			  {
				echo "<div class=\"alert alert-danger alert-dismissible fade show\"  role=\"alert\"> Incorrect  Password <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span></button></div>";
			  }
		  }
		else
		  {
				echo "<div class=\"alert alert-danger alert-dismissible fade show\"  role=\"alert\"> Incorrect Username<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span></button></div>";
		  }
	}
?>
<script src="regvalidate.js"></script> 
<script>

function myfunc(){
	var name=document.getElementById("username").value;
	var password=document.getElementById("password").value;
	var nameRgx =  /^[a-z A-Z]{3,20}$/;
	var passwordRegx = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,20})$/;
	
	if(name==""){
          alert("Name is empty");
          return false;
     }
     else
     {
	 if(!(nameRgx.test(name)))
       {
          alert("Please enter a valid name");
          return false;
       }
     
	 if(password=="")
     {
          alert("Password is empty");
          return false;
     }
    else
     {
     if(!(passwordRegx.test(password)))
     {
        alert("Please enter a valid password");
        return false;
     }
     }
}
</script>
	 
    <div class="se-pre-con"></div>
    <!-- header -->
    <header>
        <div class="header-top">
            <div class="container">
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <h1><a class="navbar-brand" href="index">
							<span>T</span>YRE
                            <span>W</span>AREHOUSE
							<i class="w3-spacing"></i>
                            </a></h1>
                    <button class="navbar-toggler ml-lg-auto ml-sm-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav text-center ml-auto">
                            <li class="nav-item mr-lg-3 mt-lg-0 mt-4">
                                <a class="hover-fill" href="index.php" data-txthover="Home">Home</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- //header -->
    <!-- banner -->
    <!-- Carousel -->
    <div class="row justify-content-center align-items-center no-gutters banner-agile">
        <div class="col-lg-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item bg1 active">
                        <img src="images/22.jpg" alt="" class="img-fluid" />
                    </div>
                    <!-- slider text -->
                    <div class="carousel-item bg3">
                        <img src="images/ss.jpg" alt="" class="img-fluid" />
                    </div>
                    <!-- slider text -->
					<div class="carousel-item bg3">
                        <img src="images/ff.jpg" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
            <!-- Carousel -->
            <!-- //banner -->
        </div>
        <div class="col-lg-4">
            <div class="wthree-form">
                <h4>Login Details</h4><br>
                <form action="login.php" method="POST" onsubmit= "return myfunc();" >
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="fas fa-envelope-open"></span>
                                <label>
                                    Username
                                </label>
                                <input class="form-control" type="text" autocomplete="off" placeholder="Username" name="username"  required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="fas fa-lock"></span>
                                <label>
                                    password
                                </label>
                                <input type="password" class="form-control" placeholder="*******" name="password"  required="">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-agile btn-block w-100">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //carousel -->
    <!-- //banner -->
    <!-- footer -->
    <footer>
        
    </footer>
    <!-- //footer -->
    <!-- js-->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- loading-gif Js -->
    <script src="js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->
    <!-- Multiple select filter using jQuery -->
    <script src="js/custom-select.js"></script>
    <!-- //Multiple select filter using jQuery -->
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js">
    </script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
             var defaults = {
            	 containerID: 'toTop', // fading element id
            	 containerHoverID: 'toTopHover', // fading element hover id
            	 scrollSpeed: 1200,
            	 easingType: 'linear' 
             };
             */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js">
    </script>
    <!-- //Bootstrap Core JavaScript -->
</body>

</html>