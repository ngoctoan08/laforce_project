<?php
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
//    echo "<pre>";
//    print_r($_SESSION['toan']);
//    echo "</pre>";
// echo $email;
// echo $password;
$check = false;
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $check = true;
}
?>

<div class="login-form">
    <form action="index.php?page=login&method=check" method="POST">
        <div class="form-group">
            <label>Email <span style="color: red;"><?= isset($error['email']) ? $error['email'] : '' ?></span></label>
            <input class="au-input au-input--full" type="email" name="email" placeholder="Nhập email..." value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : ""; ?>">
        </div>
        <div class="form-group">
            <label>Mật khẩu <span style="color: red;"><?= isset($error['pass']) ? $error['pass'] : '' ?></span></label>
            <input class="au-input au-input--full" type="password" name="password" placeholder="Nhập mật khẩu..." value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : ""; ?>">
        </div>
        <div class="login-checkbox">
            <label>
                <input type="checkbox" name="remember" <?= $check ? "checked" : ""; ?> value="1">Nhớ mật khẩu
            </label>
            <label>
                <a href="#">Quên mật khẩu</a>
            </label>
        </div>
        <button class="au-btn au-btn--block au-btn--green m-b-20" name="submit_login" type="submit">Đăng nhập</button>
        <p style="color: red;"><?= isset($error['fail']) ? $error['fail'] : '' ?></p>
        <!-- <div class="social-login-content">
            <div class="social-button">
                <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                <button class="au-btn au-btn--block au-btn--blue2">sign in with google</button>
            </div>
        </div> -->
    </form>
    <div class="register-link">
        <p>
            Bạn chưa có tài khoản?
            <a href="index.php?page=register">Đăng ký tại đây</a>
        </p>
    </div>
</div>