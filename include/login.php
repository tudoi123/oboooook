<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path_to_your_css_file.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="login-container">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Đăng nhập</h5>
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
</body>
</html>