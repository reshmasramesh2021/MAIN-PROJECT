<?php require('admin_session.php'); 

 require('../db/db.php');
	//session_start();
    // If form submitted, insert values into the database.
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
        
		$type = $_REQUEST['type'];
		$tnid = $_REQUEST['tnid'];
		$date = $_REQUEST['date'];
		$name = $_REQUEST['name'];
		$trbrand = $_REQUEST['trbrand'];
		$tstock = $_REQUEST['tstock'];
		$count = $_REQUEST['count'];
		$amount = $_REQUEST['amount'];
		$tax = $_REQUEST['tax'];
		$paid = $_REQUEST['paid'];
		$balance = $_REQUEST['balance'];
        $today=date('Y-m-d');

        if($date>$today)
  {
    echo "<script>alert('invalid date');</script>";
    echo "<script>window.history.back();</script> ";
  }
  else{
		
        $query = "INSERT INTO `transactionin` (`trid`,`tnid`,`date`, `name`, `type`,`trbrand`,`tstock`,`count`,`amount`,`tax`,`paid`,`balance`) VALUES (NULL,'$tnid','$date','$name', '$type', '$trbrand','$tstock','$count','$amount','$tax','$paid','$balance')";
		
		mysqli_query($con,$query) or die(mysqli_error($con));
	}
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TYRE WAREHOUSE</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><i class="navbar-brand"></i>TYRE WAREHOUSE </a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>ADMIN PANEL </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class=""></i>PRODUCT</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="fa fa-id-badge"></i><a href="tables-basic.php">View Tyre</a></li>
                           
                        </ul>
                    </li>
                   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class=""></i>CUSTOMERS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="viewcust.php">View Customer</a></li>
                           
                        </ul>
                    </li>
                   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class=""></i>DISTRIBUTORS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="viewdist.php">View Distributors</a></li>
                           
                        </ul>
                    </li>
                   

                    

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class=""></i>TRANSACTION</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            
                            <li><i class="fa fa-id-badge"></i><a href="viewin.php">View Transaction In</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="viewout.php">View Transaction Out</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class=""></i>STOCKS</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="fa fa-id-badge"></i><a href="viewstock.php">View Stocks</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class=""></i>SUPPLIERS</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="fa fa-id-badge"></i><a href="viewsuppliers.php">View Suppliers</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class=""></i>MONTHLY REPORTS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="repin.php"> Transaction In Report</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="reout.php">Transaction Out Report</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class=""></i>ADD MANAGERS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="smanager.php">Sales Manager</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="wmanager.php">Warehouse Manager</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="stockmanager.php">Stock Manager</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="passchange.php"> <i class=""></i>Change Password </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/m.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="passchange.php"><i class="fa fa-cog"></i>Change Password</a>

                            <a class="nav-link" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>TRANSACTION DETAILS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                

                

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>ADD</strong>  <strong>TRANSACTION IN</strong>  
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                       
                                                        </div>
                                                <div class="form-group ">
                                             <label class="control-label " for="type"> TYPE </label>
	                                           <input type="radio" name="type" value="Supplier">Supplier
                                               </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Transaction ID</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="tnid" name="tnid" placeholder="id" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="date" class=" form-control-label">Transaction Date</label></div>
                                                                <div class="col-12 col-md-9"><input type="date" id="date" name="date" placeholder="DD/MM/YYYY" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">FROM</label></div>
                                                                <div class="col-12 col-md-9"><select id="name" name="name" required class="selectpicker select form-control">
														<option value=""></option>
<?php
		//taking projects data from database
		require('../db/db.php');
        $query = "SELECT * FROM `supplier`ORDER BY `sname`";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		while($obj=mysqli_fetch_object($result))
		{
				echo "<option value=\"$obj->ssid\">$obj->sname</option>";
		}
?>
													</select></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tyre Brand</label></div>
                                                                <div class="col-12 col-md-9"><select id="trbrand" name="trbrand" required class="selectpicker select form-control">
														<option value=""></option>
<?php
		//taking projects data from database
		require('../db/db.php');
        $query = "SELECT * FROM `tyre`ORDER BY `tbrand`";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		while($obj=mysqli_fetch_object($result))
		{
				echo "<option value=\"$obj->tid\">$obj->tbrand</option>";
		}
?>
													</select></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Product Stock</label></div>
                                                                <div class="col-12 col-md-9"><select id="tstock" name="tstock" required class="selectpicker select form-control">
														<option value=""></option>
<?php
		//taking projects data from database
		require('../db/db.php');
        $query = "SELECT * FROM `tyre`ORDER BY `stock`";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		while($obj=mysqli_fetch_object($result))
		{
				echo "<option value=\"$obj->tid\">$obj->stock</option>";
		}
?>
													</select></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Count</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" name="count" id="count"  placeholder="" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Amount</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" name="amount" id="amount" placeholder="" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tax</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" name="tax" id="tax"  placeholder="tax" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Paid</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" name="paid" id="paid"  placeholder="vehicle brand" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Balance</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" name="balance" id="balance"  placeholder="vehicle model" class="form-control"></div>
                                                            </div>
                                                               
                                                                           
                                                    <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>

                                            
                                                   
                                                </div>
                                                
                                                       
                                                    </div>
                                                   
                                                </div>
                                                
                                            </div>

                                           
                                               
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
