<?php
	session_start();
 include('../db/connect.php'); 
?>
<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap'])) {
		$taikhoan = $_POST['taikhoan'];
		$matkhau = md5($_POST['matkhau']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<p>Xin nhập đủ</p>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
				$_SESSION['admin_id'] = $row_dangnhap['admin_id'];
				header('Location: dashboard.php');
			}else{
				echo '<p>Tài khoản hoặc mật khẩu sai</p>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập Admin</title>
  <!-- Thêm các liên kết Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            <h2>Đăng nhập Admin</h2>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="form-group">
                <label>Tài khoản</label>
                <input type="text" name="taikhoan" placeholder="Điền Email" class="form-control">
              </div>
              <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="matkhau" placeholder="Điền mật khẩu" class="form-control">
              </div>
              <div class="text-center">
                <input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập Admin">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Thêm liên kết Bootstrap JS và Popper.js (cho dropdowns và các chức năng khác) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>