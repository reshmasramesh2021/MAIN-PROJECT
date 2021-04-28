+<?php 

 require('db/db.php');
	//session_start();
    // If form submitted, insert values into the database.

   require 'src/Fernet.php';
   require 'src/Exception.php';
   require 'src/InvalidTokenException.php';
   require 'src/TypeException.php'; 
   require 'src/FernetMsgpack.php';

   use Fernet\Fernet;
   use Fernet\InvalidTokenException;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	{

        $typename = $_REQUEST['type_name'];
		$cname = $_REQUEST['cname'];
		$username = $_REQUEST['username'];
		$pswd = $_REQUEST['pswd'];
	    $cpswd = $_REQUEST['cpswd'];
		$phno = $_REQUEST['phno'];
		$gender = $_REQUEST['gender'];
		$email = $_REQUEST['email'];
		$address = $_REQUEST['address'];
		
    $key = Fernet::generateKey();
// $_SESSION['key']=$key;
$fernet = new Fernet($key); // or new FernetMsgpack($key);

$encryptpass = $fernet->encode($pswd);
// $message = $fernet->decode($encryptpass);
// var_dump($message);exit();
    if($typename=="1")
    {
        mysqli_query($con,"INSERT INTO `login` (`username`, `password`,`type`,`key_pass`) VALUES ('$username','$encryptpass','1','$key')") or die(mysqli_error($con));
        $last_login_id=mysqli_insert_id($con);
       

        mysqli_query($con,"INSERT INTO `customer` (`logid`,`type_name`,`cname`,`username`,`phno`, `gender`,`email`,`address`,`status`) VALUES ( '$last_login_id','$typename','$cname','$username','$phno', '$gender','$email','$address','1')") or die(mysqli_error($con));
		header('location: creg.php');
    }
    else
    {
        mysqli_query($con,"INSERT INTO `login` (`username`, `password`,`type`,`key_pass`) VALUES ('$username','$encryptpass','2','$key')") or die(mysqli_error($con));
        $last_login_id=mysqli_insert_id($con);

		mysqli_query($con,"INSERT INTO `customer` (`logid`,`type_name`,`cname`,`username`,`phno`, `gender`,`email`,`address`,`status`) VALUES ('$last_login_id','$typename','$cname','$username','$phno', '$gender','$email','$address','0')") or die(mysqli_error($con));
		header('location: creg.php');
	}
}
?>
<!-- Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>TYRE WAREHOUSE SYSTEM</title>
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
    <link href="css/screenshot_view.css" rel='stylesheet' type='text/css' />
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400i,700i" rel="stylesheet">

    <!--//online fonts -->
	<script src="js/jquery-2.2.3.min.js"></script>
 
    
    <script src="regvalidate.js"></script>   
<script type="text/javascript">
$(document).ready(function(){
	$("#username").keyup(function(){	
		var user = $("#username").val();
		if(user.length > 6){		
			$("#result").html('<img src="images/loading.gif">');
			$.ajax({
				type : 'POST',
				url  : 'username-check.php',
				data : 'user='+$("#username").val(),
				success : function(data)
						  {
					         $("#result").html(data);
					      }
			});
			return false;
		}
		else{
			$("#userfg").addClass('has-error');
			$("#result").html('<span style=\'color:red;\'>username must be of minimum 6 characters</span>');
			$('#submit').prop('disabled',true);
		}
	});
});
</script>
</head>

<body>
<script>
function myfunc(){
	
	var name=document.getElementById("cname").value;
	var password=document.getElementById("pswd").value;
    var phone=document.getElementById('phno').value;
    var email=document.getElementById('email').value;

	var nameRgx =  /^[a-z A-Z]{3,20}$/;
	var passwordRegx = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,20})$/;
    var phoneRegx = /^[6-9][0-9]{9}$/;
    var emailRegx= /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   
	
	
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
     if(phone=="")
     {
          alert(" phone Number is empty");
          return false;
     }
     else
     {
      if(!phoneRegx.test(phone))
      {
          alert("please Enter a valid phone");
          return false;
      }
     }
     if(email=="")
     {
          alert("Email is empty");
          return false;
     }
     else
     {
      if(!emailRegx.test(email))
      {
          alert("Please enter a valid email");
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
                    <h1><a class="navbar-brand" href="index.html">
                            <span>T</span>YRE
							<i class="w3-spacing"></i>
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
					<div class="login-wthree my-auto">
                                <a href="login.php" class="text-red text-capitalize"><span>login</span> <span class="fas fa-sign-in-alt flash animated infinite"></span></a>
                            </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- //header -->


<section class="wthree-row py-sm-5 py-3 about-top" id="ab-bot">
<div class="container pt-lg-5">
            <div class="title-section pb-4">
                <h3 class="main-title-agile">Registration</h3>
                <div class="title-line">
                </div>
            </div
	<div class="bootstrap-iso">
 <div class="container-fluid">
   <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form  class="form" method="POST" action="" onsubmit=" return myfunc();" >
    <div class="form-group">
											<label class="col-sm-4 control-label" for="vmf">User Type</label>
											<div class="col-md-8">
												<div class="input-group">
													<select id="type_name" name="type_name"  class="selectpicker select form-control">
														<option value=""></option>
<?php
		//taking projects data from database
		require('db/db.php');
        $query = "SELECT * FROM `user_tbl`ORDER BY `type_name`";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		while($obj=mysqli_fetch_object($result))
		{
				echo "<option value=\"$obj->type_id\">$obj->type_name</option>";
		}
?>
													</select>
												</div>
												<div class="help-block with-errors"></div>
											</div>
										</div>
     <div class="form-group ">
      <label class="control-label " for="cname">
       Dealer
      </label>
      <input class="form-control" id="cname" name="cname" type="text" autocomplete="off"/>
     </div>
	 <div class="form-group " id="userfg">
      <label class="control-label " for="username">
       Username
      </label>
      <input class="form-control" id="username" name="username" type="text" autocomplete="off"/>
	   <span id="result"> </span>
     </div>
	 <div class="form-group ">
      <label class="control-label " for="pswd">
       Password
      </label>
      <input class="form-control" id="pswd" name="pswd" type="password" autocomplete="off"/>
     </div>
	 <div class="form-group ">
      <label class="control-label " for="cpswd">
       Confirm password
      </label>
	 <input class="form-control" id="cpswd" name="cpswd" type="password"/>
     </div>
    
	 <div class="form-group ">
      <label class="control-label " for="phno">
     Phone No
      </label>
      <input class="form-control" id="phno" name="phno" type="tel"/>
      <!-- <span id="messages"> </span> -->
     </div>
    
     <div class="form-group ">
      <label class="control-label " for="email">
       Email
      </label>
      <input class="form-control" id="email" name="email" type="email"/>
     </div>
     <div class="form-group " >
      <label >
       GENDER:&nbsp;&nbsp;</label>
       Male<input  type="radio" name="gender" value="male"  >&nbsp;&nbsp;
       Female<input  type="radio" name="gender" value="female">
     </div>
     <div class="form-group ">
      <label class="control-label " for="address">
       Address
      </label>
      <input class="form-control" id="address" name="address" type="text"/>
     </div>
     
	
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit" id="submit" onclick="return myfunc()">
        Submit
       </button>
     </div>
	 
    </form>
   </div>
  </div>
 </div>
</div>


            <div class="agileits-top-row row py-md-5">
                <div class="col-lg-4 col-md-6  mb-lg-0 mb-4">
                    </div>
            </div>
	</div>
</section>
    <!-- pages grid-->
    <section class="py-lg-5 pages-sec">
        
    </section>
    <!-- //pages grid-->
    <!-- footer top -->
    
    <footer>
        </div>
                </div>
        </div>
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
<script>
function form validate()
{    
if(document.form1.cname.value="")
{
	alert("enter name");
	return false;
}
if(! iscname(document.form1.cname.value))
{
	alert("enter only alphabet");
return false;}
</script>

</html>