<div class="auth-container">
    <div class="auth-form" id="loginForm">
        <h2>Đăng nhập</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Đăng nhập</button>
        </form>
        <div class="switch-form">
            <a onclick="showRegisterForm()">Chưa có tài khoản? Đăng ký</a>
        </div>
    </div>

    <div class="auth-form" id="registerForm" style="display: none;">
        <h2>Đăng ký</h2>
        <form action="#" method="post" onsubmit="return validatePassword();">
            <div class="form-group">
                <label for="regUsername">Tên đăng nhập</label>
                <input type="text" id="regUsername" name="regUsername" required>
            </div>
            <div class="form-group">
                <label for="regPassword">Mật khẩu</label>
                <input type="password" id="regPassword" name="regPassword" required>
            </div>
            <div class="form-group">
                <label for="regPassword">Mật khẩu</label>
                <input type="password" id="regConfirmPassword" name="regConfirmPassword" required>
            </div>
            <button type="submit" name="register">Đăng ký</button>
        </form>
        <div class="switch-form">
            <a onclick="showLoginForm()">Đã có tài khoản? Đăng nhập</a>
        </div>
    </div>
</div>

<script src="View/js/login.js"></script>
<?php 
if (isset($_POST['login'])) {
    echo "<script>alert('test')</script>";
    include("Controller/controllerUser.php");
    
    $p = new controllerUser();
    $p->cLogin($_POST['username'], $_POST['password']);
}

if (isset($_POST['register'])) {
    include("Controller/controllerUser.php");
    $p = new controllerUser();
    $p->cRegister($_POST['regUsername'], $_POST['regPassword']);
}
?>