<?php 
	$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
?>

<div class="navbar-inner">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  active ">
                    <a class="nav-link " href="index.php"><strong>Trang chủ<span class="sr-only">(current)</span></strong></a>
                </li>
                <?php 
                    $sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
                    while($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){
                ?>
				<li class="nav-item dropdown">
                    <?php
                    $sql_danhmuctin = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC"); 
                    ?>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Dòng sản phẩm</a>
                    <div class="dropdown-menu">
						<?php 
							$sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
							while($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){
						?>
                        <a class="nav-link" href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>">
                        <?php echo $row_category_danhmuc['category_name'] ?>
                    </a>
                        <?php
                        } 
                        ?>
                    </div>
                </li>
                <?php
                } 
                ?>
                <li class="nav-item dropdown">
                    <?php
                    $sql_danhmuctin = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC"); 
                    ?>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Tin tức</a>
                    <div class="dropdown-menu">
                        <?php
                        while($row_danhmuctin = mysqli_fetch_array($sql_danhmuctin)){ 
                        ?>
                        <a class="dropdown-item" href="?quanly=tintuc&id_tin=<?php echo $row_danhmuctin['danhmuctin_id'] ?>">
                            <?php echo $row_danhmuctin['tendanhmuc'] ?>
                        </a>
                        <?php
                        } 
                        ?>
                    </div>
                </li>
				
                
            </ul>
        </div>
		<?php 
				if(isset($_SESSION['dangnhap_home'])){
					echo '<p style="color:#000;">Người dùng : '.$_SESSION['dangnhap_home'].'      '.'<a href="index.php?quanly=giohang&dangxuat=1">Đăng xuất</a></p>';
				}else{
					echo '';
				}
				?>
    </nav>
	 
</div>