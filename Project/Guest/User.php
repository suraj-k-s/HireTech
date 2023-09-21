<?php
include('../Connection/Connection.php');
if(isset($_POST["btn_submit"]))
{
	$name 	 = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	
	
	$uphoto=$_FILES["file_photo"]['name'];
	$temp=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($temp,"../Assets/UserPhoto/".$uphoto);
	
	$address = $_POST["txt_address"];
	$placeid = $_POST["sel_place"];
	$email   = $_POST["txt_email"];
	
	$password = $_POST["txt_password"];
	
	
	$ins = "insert into tbl_user(user_name,user_contact,user_photo,user_address,place_id,user_email,user_password)
	values('".$name."','".$contact."','".$uphoto."','".$address."','".$placeid."','".$email."','".$password."')";
	
	if($conn->query($ins))
	{
		?>
         <script type="text/javascript">
            alert("Registration Completed You Can Login Now");
            setTimeout(function(){window.location.href='Login.php'},40);
        </script>
        <?php
	}
	else
	{
		echo "<script>alert('Failed')</script>";
		echo $ins;
		
	}
	}


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Builderz - Construction Company Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Construction Company Website Template" name="keywords">
        <meta content="Construction Company Website Template" name="description">

        <!-- Favicon -->
        <link href="../Template/Main/img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="../Template/Main/lib/flaticon/font/flaticon.css" rel="stylesheet"> 
        <link href="../Template/Main/lib/animate/animate.min.css" rel="stylesheet">
        <link href="../Template/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../Template/Main/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="../Template/Main/lib/slick/slick.css" rel="stylesheet">
        <link href="../Template/Main/lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../Template/Main/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12">
                            <div class="logo">
                                <a href="../Template/Main/index.html">
                                    <h1>HIRE TECH</h1>
                                    <!-- <img src="../Template/Main/img/logo.jpg" alt="Logo"> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 d-none d-lg-block">
                            <div class="row">
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-calendar"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Opening Hour</h3>
                                            <p>Mon - Fri, 8:00 - 9:00</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-call"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Call Us</h3>
                                            <p>+012 345 6789</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-send-mail"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Email Us</h3>
                                            <p>info@example.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- Nav Bar Start -->
            <div class="nav-bar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a href="../Template/Main/#" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                           <div class="navbar-nav mr-auto">
                                <a href="../index.php" class="nav-item nav-link active">Home</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sign Up</a>
                                    <div class="dropdown-menu">
                                        <a href="Labour.php" class="dropdown-item">Worker</a>
                                        <a href="User.php" class="dropdown-item">User</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <a class="btn" href="Login.php">Sign In</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->
            

            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Registration</p>
                        <h2>User</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                               
                               <img src="../Template/Main/user.png" style="margin-left:80px;margin-top:250px" width="300" height="250"/>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>
                                <form method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="control-group">
                                        <input type="text" name="txt_name" class="form-control" id="name" placeholder="Your Name" required data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="tel" pattern="^\d{10}$" name="txt_contact" class="form-control" id="contact" placeholder="Your Contact" required data-validation-required-message="Please enter your contact" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
    <input type="email" name="txt_email" class="form-control" id="email" placeholder="Your Email" required data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="file" name="file_photo"  class="form-control" id="file_photo" required data-validation-required-message="Please select Your Photo" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <textarea class="form-control" name="txt_address" id="message" placeholder="Address" required data-validation-required-message="Please enter your Address"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                     <div class="control-group">
                                        <select class="form-control" style="background-color:transparent" required data-validation-required-message="Please enter your District"  name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                                             <option value="" style="text-align:center">Select District</option>
                                             <?php
                                                  $sel ="select * from tbl_district ";
                                          $row = $conn->query($sel);
                                          while($data = $row->fetch_assoc())
                                          {
                                         ?>
                                             <option style="text-align:center" value="<?php echo $data['district_id'];?>" 
                                              ><?php echo $data['district_name']; ?></option >
                                             
                                             <?php
                                             }
                                             ?>
                                            </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                     <div class="control-group">
                                        <select class="form-control" style="background-color:transparent" required data-validation-required-message="Please enter your Place"  name="sel_place" id="sel_place">
                                             <option value="" style="text-align:center">Select Place</option>
                                             
                                            </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    
                                     <div class="control-group">
    <input type="password" name="txt_password"  class="form-control" id="password" placeholder="Your Password" required data-validation-required-message="Please enter your Password" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn" name="btn_submit"  value="Submit"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->


            <!-- Footer Start -->
            <div class="footer wow fadeIn" data-wow-delay="0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-contact">
                                <h2>Office Contact</h2>
                                <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                                <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                                <p><i class="fa fa-envelope"></i>info@example.com</p>
                                <div class="footer-social">
                                    <a href="../Template/Main/"><i class="fab fa-twitter"></i></a>
                                    <a href="../Template/Main/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="../Template/Main/"><i class="fab fa-youtube"></i></a>
                                    <a href="../Template/Main/"><i class="fab fa-instagram"></i></a>
                                    <a href="../Template/Main/"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Services Areas</h2>
                                <a href="../Template/Main/">Building Construction</a>
                                <a href="../Template/Main/">House Renovation</a>
                                <a href="../Template/Main/">Architecture Design</a>
                                <a href="../Template/Main/">Interior Design</a>
                                <a href="../Template/Main/">Painting</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Useful Pages</h2>
                                <a href="../Template/Main/">About Us</a>
                                <a href="../Template/Main/">Contact Us</a>
                                <a href="../Template/Main/">Our Team</a>
                                <a href="../Template/Main/">Projects</a>
                                <a href="../Template/Main/">Testimonial</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="newsletter">
                                <h2>Newsletter</h2>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu
                                </p>
                                <div class="form">
                                    <input class="form-control" placeholder="Email here">
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container footer-menu">
                    <div class="f-menu">
                        <a href="../Template/Main/">Terms of use</a>
                        <a href="../Template/Main/">Privacy policy</a>
                        <a href="../Template/Main/">Cookies</a>
                        <a href="../Template/Main/">Help</a>
                        <a href="../Template/Main/">FQAs</a>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; <a href="../Template/Main/#">Your Site Name</a>, All Right Reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

            <a href="../Template/Main/#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>
<script src="../Jq/jquery.js"></script>
<script>
function getPlace(did)
{


	$.ajax({
	url: "../AjaxPages/AjaxPlace.php?did="+did,
	  success: function(result){
		$("#sel_place").html(result);
	  }
	});
}
</script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="../Template/Main/lib/easing/easing.min.js"></script>
        <script src="../Template/Main/lib/wow/wow.min.js"></script>
        <script src="../Template/Main/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../Template/Main/lib/isotope/isotope.pkgd.min.js"></script>
        <script src="../Template/Main/lib/lightbox/js/lightbox.min.js"></script>
        <script src="../Template/Main/lib/waypoints/waypoints.min.js"></script>
        <script src="../Template/Main/lib/counterup/counterup.min.js"></script>
        <script src="../Template/Main/lib/slick/slick.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="../Template/Main/mail/jqBootstrapValidation.min.js"></script>
        <script src="../Template/Main/mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="../Template/Main/js/main.js"></script>
    </body>
</html>
