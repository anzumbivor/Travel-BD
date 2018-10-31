<?php  
include "dbConnect.php";
$name = $_SESSION["id"];
$danger = $_SESSION["danger"];
$name1 = $_SESSION["p_name"];
$dis_type = $_SESSION["dis_type"];

?>

<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>Travel Bd</title>
	<meta name="description" content="HTML template for multiple tour agency, local agency, traveller, tour hosting based on Twitter Bootstrap 3.x.x" />
	<meta name="keywords" content="tour agency, tour guide, travel, trip, holiday, vocation, relax, adventure, virtual tour, tour planner" />
	<meta name="author" content="crenoveative">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Fav and Touch Icons -->
	<link rel="apple-touch-icon" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="images/ico/favicon.png">

	<!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/main.css" rel="stylesheet">
	<link href="css/plugin.css" rel="stylesheet">

	<!-- CSS Custom -->
	<link href="css/style.css" rel="stylesheet">
	
	<!-- Add your style -->
	<link href="css/your-style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>

<body>
	
	


	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

			<!-- start Navbar (Header) -->
						<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="index.html"><img src="images/logo-white.png" alt="Logo" /></a>
						</div>
					</div>
					
					
					<div id="navbar" class="navbar-nav-wrapper">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
								<a href="index.html">Home</a>
							</li>
							
							<li>
								<a href="#">Destinations</a>
								<ul>
									<li><a href="#">Dhaka</a></li>
									<li><a href="category\special-promos\promo.html">Sylhet</a></li>
									<li><a href="#">Khulna</a></li>
									<li><a href="#">Chittagong</a></li>
									<li><a href="#">Rajshahi</a></li>
									<li><a href="#">Barishal</a></li>
								</ul>
							</li>
							
							<li>
								<a href="#">Tour Packages</a>
								<ul>
									<li><a href="#">Request Tour</a></li>
									<li><a href="#">Offer Tour</a></li>
								</ul>
							</li>
							
							<li>
								<a href="#">Tour Agency</a>
								<ul>
									<li><a href="#">Guides</a></li>
									<li><a href="#">Helplines</a></li>
								</ul>
							</li>
							
							<li>
								<a href="#">Others</a>
								<ul><li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Blog</a></li>
								</ul>
							</li>
							
						</ul>
				
					</div><!--/.nav-collapse -->

				
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

		</header>


		
		<?php
				include "dbConnect.php";
					
				$sql_query = "select username,email from users where id like '$name'";
					
				$result = mysqli_query($con,$sql_query);

			if(mysqli_num_rows($result) >0)  	 
			 {  
				$row = mysqli_fetch_assoc($result); 
				$username =$row["username"]; 
				$email =$row["email"];
			 }  
			 
			$to = $email;
			$subject = "Weather Update";
			$body = "
			
			There is going to be a $dis_type in $name1. Please stay safe. 
			
			";
			
			
			
			mail($to,$subject,$body);
			
			//echo "Check Your Email";	

				?>
				
				
			<?php
				include "dbConnect.php";
					
				$sql_query = "select place from location where user_id like '$name'";
					
				$result = mysqli_query($con,$sql_query);

				if(mysqli_num_rows($result) >0)  	 
				{  
					$row = mysqli_fetch_assoc($result); 
					$place =$row["place"]; 

				}  

				?>
				
				
		<!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Profile</li>
					</ol>
				</div>
			</div>
			
			<!-- end Breadcrumb -->

			<div class="user-profile-wrapper">

				<div class="user-header">
					
					<div class="content">
					
						<div class="content-top">
						
							<div class="container">
							
								<div class="inner-top">
								
									<div class="image">
										<img src="images/testimonial/linkedin-icon.png" alt="image" />
									</div>
									
									<div class="GridLex-gap-20">
									
										<div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">
							
											<?php echo '<div class="GridLex-col-7_sm-12_xs-12_xss-12">
											
												<div class="GridLex-inner">
													<div class="heading clearfix">
														<h3>'.$username.'</h3>
													</div>
													<ul class="user-meta">
														<li><i class="fa fa-map-marker">Your Current Location:'.$place.'</i><br></li>
														<li><i class="fa fa-map-marker" style="color: red; font-size: 20px; font-weight: bold;">'.$danger.'</i><br></li>
														<li><i class="fa fa-map-marker">There is a '.$dis_type.' in '.$name1.'</i><br></li>
														<li>
															<div class="user-social inline-block">
																<a href="#"><i class="icon-social-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a>
																<a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a>
																<a href="#"><i class="icon-social-gplus" data-toggle="tooltip" data-placement="top" title="google plus"></i></a>
																<a href="#"><i class="icon-social-instagram" data-toggle="tooltip" data-placement="top" title="instrgram"></i></a>
															</div>
														</li>
														<li>
														</li>
													</ul>
												</div>' ?>
												
											</div>
								
											
										</div>
								
									</div>
									
								
								</div>
							
							</div>
							
						</div>
				

					</div>

				</div>
				
			</div>

			<div class="pt-30 pb-50">
			
				<div class="container">

					<div class="row">
						
						<div class="col-xs-12 col-sm-4 col-md-3 mt-20">

							<aside class="sidebar-wrapper pr-15 pr-0-xs">
	
								<div class="common-menu-wrapper">
							
									<ul class="common-menu-list">
										
										<li class="active"><a href="guide-detail-setting.html">Dashboard</a></li>
										<li><a href="guide-detail-setting-edit-profile.html">Edit profile</a></li>
										<li><a href="guide-detail-setting-guide-information.html">Submit Reviews</a></li>
										<li><a href="guide-detail-setting-my-tour.html">My tour</a></li>
										<li><a href="index.html">Logout</a></li>
										
									</ul>
									
								</div>
								
							</aside>
						
						</div>
						
						
						
						
			
						
						<div class="col-xs-12 col-sm-8 col-md-9 mt-20">
						
							<div class="dashboard-wrapper">
							
								<?php echo '<h4 class="section-title">'.$username.'</h4>'; ?>
								
								
								<div class="admin-empty-dashboard">
									
									<div class="icon">
										<i class="ion-ios-book-outline"></i>
									</div>
									
									<h4>You have no any activities yet!</h4>
									
									<a href="#" class="btn btn-primary">Create Tour Offer</a>
									<a href="#" class="btn btn-primary">Browse Tour Offer</a>
								
								</div>
								
							</div>
							
						</div>

					</div>

				</div>
			
			</div>

		</div>
		
		<!-- end Main Wrapper -->
		
		<!-- start Footer Wrapper -->
		
		<div class="footer-wrapper scrollspy-footer">
		
			<footer class="main-footer">
			
	<div class="footer">
    <div class="container clearfix">
                    <div class="col-md-4 f_col f_col_1">
                <div class="widget-container widget_text">        <h3 class="widget-title">Travel Bangladesh</h3>			<div class="textwidget"><div class="widget_contact">
<address>
    <strong>For traveling through the beautiful</strong><br>
	<strong>Bangladesh, a perfect solution.</strong><br>
   <a href="https://demo.themefuse.com/paradisecovemultihotel/?page_id=115">Find your tour..</a><br><br>
</address>
</div></div>
		</div>            </div>
            <div class="col-md-2 f_col f_col_3">
                <div class="widget-container widget_text">        <h3 class="widget-title">Direct Links</h3>			<div class="textwidget"><div class="widget_pages">
<ul>
                        <li ><a href="#" ><span>Home</span></a></li>
                        <li><a href="#"><span>Destinations</span></a></li>
                        <li><a href="#"><span>Tour Packages</span></a></li>
                        <li><a href="#"><span>Guide</span></a></li>
                        <li><a href="#"><span>Pages</span></a></li>
                    </ul>
</div></div>
		</div>            </div>
            <div class="col-md-2 f_col f_col_3">
                      </div>
                            <div class="col-md-4 f_col f_col_4">
                <!-- newsletter widget -->
                <div class="widget-container newsletter_subscription_box newsletterBox">
                    <h3 class="widget-title">Mail Us</h3>
                    <form action="#" method="post" class="newsletter_subscription_form">
                        <input type="text" value="" name="newsletter" id="newsletter" class="newsletter_subscription_email inputField" placeholder="Your email address" />
                        <button type="submit" class="btn-form newsletter_subscription_submit" value="Send"><span class="icon-caret-right"></span></button>
                  
                        </div>
                    </form>
                </div>
                <!--/ newsletter widget -->
                               

            </div>
            </div>
</div>
<div class="copyright">
    <div class="container">
        <p style="color:white;">Travel Bangladesh by<a rel="nofollow" href="https://themefuse.com/" target="_blank"> MIST_Juveniles</a></p>
    </div>
</div>
				
		
			</footer>
		</div>
		
		<!-- end Footer Wrapper -->

	</div>
	
	<!-- end Container Wrapper -->
 
 
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->


 

<!-- start Sign-in Modal -->
<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Sign-in into your account</h4>
	</div>
	
	<div class="modal-body">
		<div class="row gap-20">
		
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-facebook btn-block mb-5-xs">Log-in with Facebook</button>
			</div>
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-google-plus btn-block">Log-in with Google+</button>
			</div>
			
			<div class="col-md-12">
				<div class="login-modal-or">
					<div><span>or</span></div>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Username</label>
					<input class="form-control" placeholder="Min 4 and Max 10 characters" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
			
				<div class="form-group"> 
					<label>Password</label>
					<input class="form-control" placeholder="Min 4 and Max 10 characters" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-6 col-md-6">
				<div class="checkbox-block"> 
					<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
					<label class="" for="remember_me_checkbox">Remember me</label>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-6">
				<div class="login-box-link-action">
					<a data-toggle="modal" href="#forgotPasswordModal" class="block line18 mt-1">Forgot password?</a> 
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
				<div class="login-box-box-action">
					No account? <a data-toggle="modal" href="#registerModal">Register</a>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal-footer text-center">
		<button type="button" class="btn btn-primary">Log-in</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
	
</div>
<!-- end Sign-in Modal -->

<!-- start Register Modal -->
<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Create your account for free</h4>
	</div>
	
	<div class="modal-body">
	
		<div class="row gap-20">
		
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-facebook btn-block mb-5-xs">Register with Facebook</button>
			</div>
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-google-plus btn-block">Register with Google+</button>
			</div>
			
			<div class="col-md-12">
				<div class="login-modal-or">
					<div><span>or</span></div>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Username</label>
					<input class="form-control" placeholder="Min 4 and Max 10 characters" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Email Address</label>
					<input class="form-control" placeholder="Enter your email address" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
			
				<div class="form-group"> 
					<label>Password</label>
					<input class="form-control" placeholder="Min 8 and Max 20 characters" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
			
				<div class="form-group"> 
					<label>Password Confirmation</label>
					<input class="form-control" placeholder="Re-type password again" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
				<div class="checkbox-block"> 
					<input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
					<label class="" for="register_accept_checkbox">By register, I read &amp; accept <a href="#">the terms</a></label>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
				<div class="login-box-box-action">
					Already have account? <a data-toggle="modal" href="#loginModal">Log-in</a>
				</div>
			</div>
			
		</div>
	
	</div>
	
	<div class="modal-footer text-center">
		<button type="button" class="btn btn-primary">Register</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
	
</div>
<!-- end Register Modal -->

<!-- start Forget Password Modal -->
<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Restore your forgotten password</h4>
	</div>
	
	<div class="modal-body">
		<div class="row gap-20">
			
			<div class="col-sm-12 col-md-12">
				<p class="mb-20">Maids table how learn drift but purse stand yet set. Music me house could among oh as their. Piqued our sister shy nature almost his wicket. Hand dear so we hour to.</p>
			</div>
			
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Email Address</label>
					<input class="form-control" placeholder="Enter your email address" type="text"> 
				</div>
			
			</div>

			<div class="col-sm-12 col-md-12">
				<div class="checkbox-block"> 
					<input id="forgot_password_checkbox" name="forgot_password_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
					<label class="" for="forgot_password_checkbox">Generate new password</label>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
				<div class="login-box-box-action">
					Return to <a data-toggle="modal" href="#loginModal">Log-in</a>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal-footer text-center">
		<button type="button" class="btn btn-primary">Restore</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
	
</div>
<!-- end Forget Password Modal -->

<!-- Core JS -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/core-plugins.js"></script>
<script type="text/javascript" src="js/customs.js"></script>

<!-- Detail Page JS -->
<script type="text/javascript" src="js/jquery.stickit.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.sumogallery.js"></script>
<script type="text/javascript" src="js/images-grid.js"></script>
<script type="text/javascript" src="js/jquery.bootstrap-touchspin.js"></script>
<script type="text/javascript" src="js/customs-detail.js"></script>

</body>


<!-- Mirrored from crenoveative.com/envato/togoby/guide-detail-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Aug 2017 12:11:04 GMT -->
</html>