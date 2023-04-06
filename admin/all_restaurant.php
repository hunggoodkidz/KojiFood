<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Koji Food</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none"
                stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="images/koji.png" alt="homepage"
                                class="dark-logo" style="width: 70px" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">


                    </ul>

                    <ul class="navbar-nav my-lg-0">



                        <li class="nav-item dropdown">

                            <div
                                class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications
                                        </div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center"
                                            href="javascript:void(0);">
                                            <strong>Check all
                                                notifications</strong> <i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  "
                                href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img
                                    src="images/bookingSystem/user-icn.png"
                                    alt="user" class="profile-pic" /></a>
                            <div
                                class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">

                                    <li><a href="logout.php"><i
                                                class="fa fa-power-off"></i>
                                            Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i
                                    class="fa fa-tachometer"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-label">Hệ thống quản lý CRUD</li>
                        <li> <a class="has-arrow  " href="#"
                                aria-expanded="false"><i
                                    class="fa fa-user f-s-20 color-warning"></i><span
                                    class="hide-menu">Tài khoản</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_users.php">Danh sách tài
                                        khoản</a></li>
                                <li><a href="add_users.php">Thêm tài khoản</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#"
                                aria-expanded="false"><i
                                    class="fa fa-archive f-s-20 color-warning"></i><span
                                    class="hide-menu">Nhà hàng</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">Danh sách nhà
                                        hàng</a></li>
                                <li><a href="add_category.php">Thêm danh mục</a>
                                </li>
                                <li><a href="add_restaurant.php">Thêm nhà
                                        hàng</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#"
                                aria-expanded="false"><i class="fa fa-cutlery"
                                    aria-hidden="true"></i><span
                                    class="hide-menu">Món ăn</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">Danh sách món ăn</a>
                                </li>
                                <li><a href="add_menu.php">Thêm món ăn</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i
                                    class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><span>Đơn
                                    hàng</span></a></li>

                    </ul>
                </nav>

            </div>

        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->

            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách các nhà hàng
                                </h4>
                                <h6 class="card-subtitle">Export data to Copy,
                                    CSV, Excel, PDF & Print</h6>

                                <div class="table-responsive m-t-40">
                                    <table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Danh mục</th>
                                                <th>Tên Nhà Hàng</th>
                                                <th>Email</th>
                                                <th>Số Điện Thoại</th>
                                                <th>Url</th>
                                                <th>Open Hrs</th>
                                                <th>Close Hrs</th>
                                                <th>Open Days</th>
                                                <th>Địa chỉ</th>
                                                <th>Store-Image</th>
                                                <th>Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>


                                            <?php
												$sql="SELECT * FROM restaurant order by rs_id desc";
												$query=mysqli_query($db,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="11"><center>No Srores-Data!</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																					
																				$mql="SELECT * FROM res_category where c_id='".$rows['c_id']."'";
																					$res=mysqli_query($db,$mql);
																					$row=mysqli_fetch_array($res);
																				
																					echo ' <tr><td>'.$row['c_name'].'</td>
																								<td>'.$rows['title'].'</td>
																								<td>'.$rows['email'].'</td>
																								<td>'.$rows['phone'].'</td>
																								<td>'.$rows['url'].'</td>
																								
																								
																								<td>'.$rows['o_hr'].'</td>
																								<td>'.$rows['c_hr'].'</td>
																								<td>'.$rows['o_days'].'</td>
																								
																								<td>'.$rows['address'].'</td>
																								
																								<td><div class="col-md-3 col-lg-8 m-b-10">
																								<center><img src="Res_img/'.$rows['image'].'" class="img-responsive radius"  style="min-width:150px;min-height:100px;"/></center>
																								</div></td>
																								
																								<td>'.$rows['date'].'</td>
																									 <td><a href="delete_stores.php?res_del='.$rows['rs_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																									 <a href="update_restaurant.php?res_upd='.$rows['rs_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
																									</td></tr>';
																					 
																						
																						
																		}	
														}
												
											
											?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer"> © 2023 - Team Pixel </footer>
    <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script
        src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js">
    </script>
    <script
        src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js">
    </script>
    <script
        src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
    </script>
    <script
        src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
    </script>
    <script
        src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
    </script>
    <script
        src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js">
    </script>
    <script
        src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js">
    </script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>