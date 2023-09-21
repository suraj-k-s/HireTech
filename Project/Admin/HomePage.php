<?php
include('../Connection/Connection.php');
include('SessionValidator.php');

?>
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin</title>

        <!-- <link rel="icon" href="../Template/Admin/img/favicon.png" type="image/png"> -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../Template/Admin/css/bootstrap.min.css" />
        <!-- themefy CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/themefy_icon/themify-icons.css" />
        <!-- swiper slider CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/swiper_slider/css/swiper.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/select2/css/select2.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/niceselect/css/nice-select.css" />
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/owl_carousel/css/owl.carousel.css" />
        <!-- gijgo css -->
        <link rel="stylesheet" href="../Template/Admin/vendors/gijgo/gijgo.min.css" />
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/font_awesome/css/all.min.css" />
        <link rel="stylesheet" href="../Template/Admin/vendors/tagsinput/tagsinput.css" />
        <!-- datatable CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/datatable/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="../Template/Admin/vendors/datatable/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="../Template/Admin/vendors/datatable/css/buttons.dataTables.min.css" />
        <!-- text editor css -->
        <link rel="stylesheet" href="../Template/Admin/vendors/text_editor/summernote-bs4.css" />
        <!-- morris css -->
        <link rel="stylesheet" href="../Template/Admin/vendors/morris/morris.css">
        <!-- metarial icon css -->
        <link rel="stylesheet" href="../Template/Admin/vendors/material_icon/material-icons.css" />

        <!-- menu css  -->
        <link rel="stylesheet" href="../Template/Admin/css/metisMenu.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="../Template/Admin/css/style.css" />
        <link rel="stylesheet" href="../Template/Admin/css/colors/default.css" id="colorSkinCSS">
    </head>
    <body class="crm_body_bg">



        <!-- main content part here -->

        <!-- sidebar  -->
        <!-- sidebar part here -->
        <nav class="sidebar">
            <div class="logo d-flex justify-content-between">
                <a href="HomePage.php"><h2 align="center">Welcome<br><?php echo $_SESSION["adminname"]?></h2></a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>
            </div>
            <ul id="sidebar_menu">
                <li class="side_menu_title">
                    <span>Dashboard</span>
                </li>
                <li class="mm-active">
                    <a  href="HomePage.php"  aria-expanded="false">
                        <img src="../Template/Admin/img/menu-icon/1.svg" alt="">
                        <span>Dashboard</span>
                    </a>
                   
                </li>
                <li class="side_menu_title">
                    <span>Applications</span>
                </li><li class="">
                    <a   class="has-arrow" href="UserList.php" aria-expanded="false">
                        <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>User List</span>
                    </a>
<!--                    <ul>
                        <li><a href="../Template/Admin/login.html">Login</a></li>
                        <li><a href="../Template/Admin/resister.html">Register</a></li>
                        <li><a href="../Template/Admin/forgot_pass.html">Forgot Password</a></li>
                    </ul>
-->                </li>
					<li class="">
                    <a   class="has-arrow" href="LabourList.php" aria-expanded="false">
                        <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>Labour List</span>
                    </a>
<!--                    <ul>
                        <li><a href="../Template/Admin/login.html">Login</a></li>
                        <li><a href="../Template/Admin/resister.html">Register</a></li>
                        <li><a href="../Template/Admin/forgot_pass.html">Forgot Password</a></li>
                    </ul>
-->                </li>
                <li class="">
                    <a   class="has-arrow" href="District.php" aria-expanded="false">
                        <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>District</span>
                    </a>
<!--                    <ul>
                        <li><a href="../Template/Admin/login.html">Login</a></li>
                        <li><a href="../Template/Admin/resister.html">Register</a></li>
                        <li><a href="../Template/Admin/forgot_pass.html">Forgot Password</a></li>
                    </ul>
-->                </li>
 				   <li class="">
                        <a   class="has-arrow" href="Place.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Place</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="ComplaintType.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Comlaint Type</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="WorkType.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Work Type</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="ViewComplaint.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Complaints</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="ViewFeedback.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Feedbacks</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="../Logout.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Logout</span>
                        </a>	
                   </li>
            </ul>

        </nav>
        <!-- sidebar part end -->
        <!--/ sidebar  -->


        <section class="main_content dashboard_part">
            <!-- menu  -->
           
            <!--/ menu  -->
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="single_element">
                                <div class="quick_activity">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="quick_activity_wrap">
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="../Template/Admin/img/icon/labour.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter">
                                                        <?php
														$sel = "select count(labour_id) as id from tbl_labour";
														$res = $conn->query($sel);
                                                        $data = $res->fetch_assoc(); 
														echo $data["id"];
                                                        ?>
                                                        </span> </h3>
                                                        <p>Labour</p>
                                                    </div>
                                                </div>
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="../Template/Admin/img/icon/user.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter">
                                                        <?php
														$sel = "select count(user_id) as id from tbl_user";
														$res = $conn->query($sel);
                                                        $data = $res->fetch_assoc(); 
														echo $data["id"];
                                                        ?>
                                                        </span> </h3>
                                                        <p>User</p>
                                                    </div>
                                                </div>
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="../Template/Admin/img/icon/post.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter">
                                                        <?php
														$sel = "select count(workpost_id) as id from tbl_workpost";
														$res = $conn->query($sel);
                                                        $data = $res->fetch_assoc(); 
														echo $data["id"];
                                                        ?>
                                                        </span> </h3>
                                                        <p>Posts</p>
                                                    </div>
                                                </div>
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="../Template/Admin/img/icon/request.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter">
                                                        <?php
														$sel = "select count(workrequest_id) as id from tbl_workrequest";
														$res = $conn->query($sel);
                                                        $data = $res->fetch_assoc(); 
														echo $data["id"];
                                                        ?>
                                                        </span> </h3>
                                                        <p>Requests</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-12">
                            <div class="white_box card_height_100">
                                <div class="box_header border_bottom_1px  ">
                                    <div class="main-title">
                                        <h3 class="mb_25">Labour</h3>
                                    </div>
                                </div>
                                <div class="staf_list_wrapper sraf_active owl-carousel">
                                <?php
								$selz = "select * from tbl_labour";
								$rowz = $conn->query($selz);
								while($dataz = $rowz->fetch_assoc())
								{
									?>
                                    <!-- single carousel  -->
                                    <div class="single_staf">
                                        <div class="staf_thumb">
                                            <img src="../Assets/LabourPhoto/<?php echo $dataz["labour_photo"];?>" alt="">
                                        </div>
                                        <h4><?php echo $dataz["labour_name"];?></h4>
                                        <p><?php echo $dataz["labour_contact"];?></p>
                                    </div>
                                    <?php
								}
								?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="white_box card_height_100">
                                <div class="box_header border_bottom_1px  ">
                                    <div class="main-title">
                                        <h3 class="mb_25">User</h3>
                                    </div>
                                </div>
                                <div class="staf_list_wrapper sraf_active owl-carousel">
                                <?php
								$selx = "select * from tbl_user";
								$rowx = $conn->query($selx);
								while($datax = $rowx->fetch_assoc())
								{
									?>
                                    <!-- single carousel  -->
                                    <div class="single_staf">
                                        <div class="staf_thumb">
                                            <img src="../Assets/UserPhoto/<?php echo $datax["user_photo"];?>" alt="">
                                        </div>
                                        <h4><?php echo $datax["user_name"];?></h4>
                                        <p><?php echo $datax["user_contact"];?></p>
                                    </div>
                                    <?php
								}
								?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- main content part end -->

        <!-- footer  -->
        <!-- jquery slim -->
        <script src="../Template/Admin/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="../Template/Admin/js/popper.min.js"></script>
        <!-- bootstarp js -->
        <script src="../Template/Admin/js/bootstrap.min.js"></script>
        <!-- sidebar menu  -->
        <script src="../Template/Admin/js/metisMenu.js"></script>
        <!-- waypoints js -->
        <script src="../Template/Admin/vendors/count_up/jquery.waypoints.min.js"></script>
        <!-- waypoints js -->
        <script src="../Template/Admin/vendors/chartlist/Chart.min.js"></script>
        <!-- counterup js -->
        <script src="../Template/Admin/vendors/count_up/jquery.counterup.min.js"></script>
        <!-- swiper slider js -->
        <script src="../Template/Admin/vendors/swiper_slider/js/swiper.min.js"></script>
        <!-- nice select -->
        <script src="../Template/Admin/vendors/niceselect/js/jquery.nice-select.min.js"></script>
        <!-- owl carousel -->
        <script src="../Template/Admin/vendors/owl_carousel/js/owl.carousel.min.js"></script>
        <!-- gijgo css -->
        <script src="../Template/Admin/vendors/gijgo/gijgo.min.js"></script>
        <!-- responsive table -->
        <script src="../Template/Admin/vendors/datatable/js/jquery.dataTables.min.js"></script>
        <script src="../Template/Admin/vendors/datatable/js/dataTables.responsive.min.js"></script>
        <script src="../Template/Admin/vendors/datatable/js/dataTables.buttons.min.js"></script>
        <script src="../Template/Admin/vendors/datatable/js/buttons.flash.min.js"></script>
        <script src="../Template/Admin/vendors/datatable/js/jszip.min.js"></script>
        <script src="../Template/Admin/vendors/datatable/js/pdfmake.min.js"></script>
        <script src="../Template/Admin/vendors/datatable/js/vfs_fonts.js"></script>
        <script src="../Template/Admin/vendors/datatable/js/buttons.html5.min.js"></script>
        <script src="../Template/Admin/vendors/datatable/js/buttons.print.min.js"></script>

        <script src="../Template/Admin/js/chart.min.js"></script>
        <!-- progressbar js -->
        <script src="../Template/Admin/vendors/progressbar/jquery.barfiller.js"></script>
        <!-- tag input -->
        <script src="../Template/Admin/vendors/tagsinput/tagsinput.js"></script>
        <!-- text editor js -->
        <script src="../Template/Admin/vendors/text_editor/summernote-bs4.js"></script>

        <script src="../Template/Admin/vendors/apex_chart/apexcharts.js"></script>

        <!-- custom js -->
        <script src="../Template/Admin/js/custom.js"></script>

        <script src="../Template/Admin/vendors/apex_chart/bar_active_1.js"></script>
        <script src="../Template/Admin/vendors/apex_chart/apex_chart_list.js"></script>
    </body>
</html>