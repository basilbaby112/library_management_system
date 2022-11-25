<?php
//if (isset($_SESSION['user_session']) && $_SESSION['user_session'] == true) {
include_once("db_connect.php");
session_start();
// $sql = "SELECT uid, user, pass, email FROM users WHERE uid='".$_SESSION['user_session']."'";
// $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
// $row = mysqli_fetch_assoc($resultset);

?>
<!doctype html>
<html lang="en">
<head>
	<title>Welcome To G Wealth Accountants & Advisors</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="#">
	<meta name="keywords" content="#" />
	<meta name="generator" content="#" />
	<meta name="author" content="#" />
	<meta name="publisher" content="#" />
	<meta name="copyright" content="#" />
	<meta name="audience" content="All" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<link rel="canonical" href="#">
	<meta property="og:title" content="#" />
	<meta property="og:url" content="#" />
	<meta property="og:site_name" content="#" />
	<meta property="og:type" content="website" />
	<link href="images/favicon.ico" rel="icon">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/gwealth-style.css"> 
</head>
<body>
	<div class="header-sec">
		<div class="header-inner">
			<div class="container">
				<div class="top-sec">
					<div class="logo-sec animated fadeInDown"><a href="index.php"><img src="images/gwealth-mlogo.png" class="img-fluid" alt=""></a></div>
					<div class="call-sec animated fadeInDown">
						<ul>
							<li><img src="images/call-top.png" class="img-fluid" alt=""></li>
							<li><a href="tel:03 9059 8030" title="Call">03 9059 8030</a></li>
						</ul>
					</div>
					<div class="menu-sec">
						<nav class="navbar navbar-expand-lg navbar-light animated fadeInDown">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
							<div class="collapse navbar-collapse" id="navbarNavDropdown">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item active"> <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
									<li class="nav-item"> <a class="nav-link" href="about.php">About</a> </li>
									<li class="nav-item"> <a class="nav-link" href="services.php">Services</a> </li>

									<?php //session_start();
									if (isset($_SESSION['user_session']) && $_SESSION['user_session'] == true) {?>
									<li class="nav-item"> <a class="nav-link clientmenu" href="./client-portal.php">Log Me In</a> </li>
									<?php } else {?>
									<li class="nav-item"> <a class="nav-link clientmenu" data-toggle="modal" data-target="#myModal" href="#">Log Me In</a> </li>
									<?php } ?>
									<li class="nav-item"> <a class="nav-link" href="contact.php">Contact</a> </li>
									<?php //session_start();
									if (isset($_SESSION['user_session']) && $_SESSION['user_session'] == true) {?>
                                    <li class="nav-item"> <a class="nav-link clientlogout" href="logout.php">Sign out</a> </li>
                                	<?php } ?>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>