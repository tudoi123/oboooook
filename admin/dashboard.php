<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: index.php');
	 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Admin</title>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <style>
    /* Đổi màu nền của body */
    body {
      background-color: #f9f9f9;
    }

    /* Đổi màu chữ trong thanh điều hướng */
    .navbar-light .navbar-nav .nav-link {
      color: #ffcc00;
    }

    /* Điều chỉnh kích thước chữ trong thanh điều hướng */
    .navbar-nav .nav-link {
      font-size: 20px;
    }

    /* Căn giữa các mục trong thanh điều hướng */
    .navbar-nav.mx-auto {
      justify-content: center;
    }
  </style>
  </style>
</head>
<body>
  <div class="container mt-4">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		
			<ul class="navbar-nav mx-auto"> <!-- Sử dụng lớp mx-auto để căn giữa các mục -->
			<li class="nav-item active">
				<a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục Bài viết</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="xulybaiviet.php">Bài viết</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
			</li>
			</ul>
		
		</nav>
      </div>
    </nav>
	<p>Xin chào: <?php echo $_SESSION['dangnhap']; ?> <a href="?login=dangxuat">Đăng xuất</a></p>
  </div>

  <!-- Thêm liên kết Bootstrap JS và Popper.js (cho dropdowns và các chức năng khác) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>