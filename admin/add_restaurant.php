<?php
include("../connection/connect.php");
session_start();

if (isset($_POST['submit'])) {
    $error = ''; // initialize error variable

    $c_name = $_POST['c_name'];
    $res_name = $_POST['res_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $url = $_POST['url'];
    $o_hr = $_POST['o_hr'];
    $c_hr = $_POST['c_hr'];
    $o_days = $_POST['o_days'];
    $address = $_POST['address'];

    if (empty($c_name) || empty($res_name) || empty($email) || empty($phone) || empty($url) || empty($o_hr) || empty($c_hr) || empty($o_days) || empty($address)) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>All fields Must be Fillup!</strong>
                  </div>';
    } else {
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = pathinfo($fname, PATHINFO_EXTENSION);
        $fnew = uniqid() . '.' . $extension;
        $store = "Res_img/" . basename($fnew);

        if (($extension == 'jpg' || $extension == 'png' || $extension == 'gif') && $fsize < 1000000) {
            $stmt = $db->prepare("INSERT INTO restaurant(c_id, title, email, phone, url, o_hr, c_hr, o_days, address, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssss", $c_name, $res_name, $email, $phone, $url, $o_hr, $c_hr, $o_days, $address, $fnew);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                move_uploaded_file($temp, $store);
                $success = '<div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        New Restaurant Added Successfully.
                    </div>';
            } else {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Something went wrong. Please try again later.
                            </div>';
            }
            $stmt->close();
        } elseif ($extension == '') {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Select image</strong>
                      </div>';
        } else {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Invalid extension!</strong> PNG, JPG, GIF are accepted.
                      </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Add Restaurant</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="images/koji.png" alt="homepage" class="dark-logo" style="width: 70px" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">




                    </ul>

                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);">
                                            <strong>Check all
                                                notifications</strong> <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i>
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
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-label">Hệ thống quản lý CRUD</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user f-s-20 color-warning"></i><span class="hide-menu">Tài khoản</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_users.php">Danh sách tài
                                        khoản</a></li>
                                <li><a href="add_users.php">Thêm tài khoản</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Nhà hàng</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">Danh sách nhà
                                        hàng</a></li>
                                <li><a href="add_category.php">Thêm danh mục</a>
                                </li>
                                <li><a href="add_restaurant.php">Thêm nhà
                                        hàng</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Món ăn</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">Danh sách món ăn</a>
                                </li>
                                <li><a href="add_menu.php">Thêm món ăn</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Đơn
                                    hàng</span></a></li>

                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">



            <div class="container-fluid">

                <?php echo $error;
                echo $success; ?>
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Thêm nhà hàng</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">

                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tên
                                                    Nhà Hàng</label>
                                                <input type="text" name="res_name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">E-mail</label>
                                                <input type="text" name="email" class="form-control form-control-danger">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Số
                                                    điện thoại </label>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Website
                                                    URL</label>
                                                <input type="text" name="url" class="form-control form-control-danger">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Open
                                                    Hours</label>
                                                <select name="o_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                                                    <option>--Select your
                                                        Hours--</option>
                                                    <option value="6am">6am
                                                    </option>
                                                    <option value="7am">7am
                                                    </option>
                                                    <option value="8am">8am
                                                    </option>
                                                    <option value="9am">9am
                                                    </option>
                                                    <option value="10am">10am
                                                    </option>
                                                    <option value="11am">11am
                                                    </option>
                                                    <option value="12pm">12pm
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Close
                                                    Hours</label>
                                                <select name="c_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                                                    <option>--Select your
                                                        Hours--</option>
                                                    <option value="3pm">3pm
                                                    </option>
                                                    <option value="4pm">4pm
                                                    </option>
                                                    <option value="5pm">5pm
                                                    </option>
                                                    <option value="6pm">6pm
                                                    </option>
                                                    <option value="7pm">7pm
                                                    </option>
                                                    <option value="8pm">8pm
                                                    </option>
                                                    <option value="9pm">9pm
                                                    </option>
                                                    <option value="10pm">10pm
                                                    </option>
                                                    <option value="11pm">11pm
                                                    </option>
                                                    <option value="12am">12am
                                                    </option>
                                                    <option value="1am">1am
                                                    </option>
                                                    <option value="2am">2am
                                                    </option>
                                                    <option value="3am">3am
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Open
                                                    Days</label>
                                                <select name="o_days" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                    <option>--Select your Days--
                                                    </option>
                                                    <option value="Mon-Tue">
                                                        Mon-Tue</option>
                                                    <option value="Mon-Wed">
                                                        Mon-Wed</option>
                                                    <option value="Mon-Thu">
                                                        Mon-Thu</option>
                                                    <option value="Mon-Fri">
                                                        Mon-Fri</option>
                                                    <option value="Mon-Sat">
                                                        Mon-Sat</option>
                                                    <option value="24hr-x7">
                                                        24hr-x7</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Hình
                                                    ảnh</label>
                                                <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                            </div>
                                        </div>




                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Chọn
                                                    Danh Mục</label>
                                                <select name="c_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                    <option>--Select Category--
                                                    </option>
                                                    <?php $ssql = "select * from res_category";
                                                    $res = mysqli_query($db, $ssql);
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        echo ' <option value="' . $row['c_id'] . '">' . $row['c_name'] . '</option>';;
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>



                                    </div>

                                    <h3 class="box-title m-t-40">Địa chỉ của nhà
                                        hàng</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">

                                                <textarea name="address" type="text" style="height:100px;" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                            <a href="add_restaurant.php" class="btn btn-inverse">Cancel</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2023 - Team Pixel </footer>
        </div>

    </div>

    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>