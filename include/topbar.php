<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap_home'])) {
		$taikhoan = $_POST['email_login'];
		$matkhau = md5($_POST['password_login']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<script>alert("Làm ơn không để trống")</script>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap_home'] = $row_dangnhap['name'];
				$_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
				
				header('Location: index.php?quanly=giohang');
			}else{
				echo '<script>alert("Tài khoản mật khẩu sai")</script>';
			}
		}
	}elseif(isset($_POST['dangky'])){
		$name = $_POST['name'];
	 	$phone = $_POST['phone'];
	 	$email = $_POST['email'];
	 	$password = md5($_POST['password']);
	 	$note = $_POST['note'];
	 	$address = $_POST['address'];
	 	$giaohang = $_POST['giaohang'];
 
 		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
 		$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
 		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
 		$_SESSION['dangnhap_home'] = $name;
		$_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
		
 		header('Location:index.php?quanly=giohang');
	}
?>

<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top">

            </div>
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>

                    <?php
						if(isset($_SESSION['dangnhap_home'])){ 
						
						?>
                    <li class="text-center border-right text-white">
                        <a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>"
                            class="text-white">
                            <i class="fas fa-truck mr-2"></i>Xem đơn hàng : <?php echo $_SESSION['dangnhap_home'] ?></a>
                    </li>
                    <?php
					}
						?>

                    <li class="text-center border-right text-white">
                        <a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
                            <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
                    </li>
                    <li class="text-center text-white">
                        <a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
                    </li>
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>
<!-- modals -->
<!-- log in -->
<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="text" class="form-control" placeholder=" " name="email_login" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder=" " name="password_login" required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
                    </div>

                    <p class="text-center dont-do mt-3">Chưa có tài khoản?
                        <a href="#" data-toggle="modal" data-target="#dangky">
                            Đăng ký</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- register -->
<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng ký</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" placeholder=" " name="name" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder=" " name="email" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Phone</label>
                        <input type="text" class="form-control" placeholder=" " name="phone" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input type="text" class="form-control" placeholder=" " name="address" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder=" " name="password" required="">
                        <input type="hidden" class="form-control" placeholder="" name="giaohang" value="0">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Ghi chú</label>
                        <textarea class="form-control" name="note"></textarea>
                    </div>

                    <div class="right-w3l">
                        <input type="submit" class="form-control" name="dangky" value="Đăng ký">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- //modal -->
<!-- //top-header -->


<!-- header-bottom-->
<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div class="col-md-3 logo_agile">
                <a class="nav-item mx-2" href="index.php">

                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-apple" viewBox="0 0 16 16">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M352 124.5l-51.9-13c-6.5-1.6-11.3-7.1-12-13.8s2.8-13.1 8.7-16.1l40.8-20.4L294.4 28.8c-5.5-4.1-7.8-11.3-5.6-17.9S297.1 0 304 0H416h32 16c30.2 0 58.7 14.2 76.8 38.4l57.6 76.8c6.2 8.3 9.6 18.4 9.6 28.8c0 26.5-21.5 48-48 48H538.5c-17 0-33.3-6.7-45.3-18.7L480 160H448v21.5c0 24.8 12.8 47.9 33.8 61.1l106.6 66.6c32.1 20.1 51.6 55.2 51.6 93.1C640 462.9 590.9 512 530.2 512H496 432 32.3c-3.3 0-6.6-.4-9.6-1.4C13.5 507.8 6 501 2.4 492.1C1 488.7 .2 485.2 0 481.4c-.2-3.7 .3-7.3 1.3-10.7c2.8-9.2 9.6-16.7 18.6-20.4c3-1.2 6.2-2 9.5-2.2L433.3 412c8.3-.7 14.7-7.7 14.7-16.1c0-4.3-1.7-8.4-4.7-11.4l-44.4-44.4c-30-30-46.9-70.7-46.9-113.1V181.5v-57zM512 72.3c0-.1 0-.2 0-.3s0-.2 0-.3v.6zm-1.3 7.4L464.3 68.1c-.2 1.3-.3 2.6-.3 3.9c0 13.3 10.7 24 24 24c10.6 0 19.5-6.8 22.7-16.3zM130.9 116.5c16.3-14.5 40.4-16.2 58.5-4.1l130.6 87V227c0 32.8 8.4 64.8 24 93H112c-6.7 0-12.7-4.2-15-10.4s-.5-13.3 4.6-17.7L171 232.3 18.4 255.8c-7 1.1-13.9-2.6-16.9-9s-1.5-14.1 3.8-18.8L130.9 116.5z" />
                        </svg>
                    </svg>
                </a>
            </div>
            <!-- //logo -->
            <!-- header-bot -->
            <div class="col-md-9 header mt-4 mb-md-0 mb-4">

                <div class="row">
                    <!-- search -->
                    <div class="col-10 agileits_search">
                        <form class="form-inline" action="index.php?quanly=timkiem" method="POST">
                            <input class="form-control mr-sm-2" name="search_product" type="search"
                                placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
                            <button class="btn my-2 my-sm-0" name="search_button" type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                    <!-- //search -->
                    <!-- cart details -->
                    <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <form action="#" method="post" class="last">
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="display" value="1">
                                <button class="btn w3view-cart" type="submit" name="submit" value="">
                                    <i class="fas fa-cart-arrow-down"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- //cart details -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop locator (popup) -->
<!-- //header-bottom -->
<!-- navigation -->