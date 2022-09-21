<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
?>
<div class="login-form">
	<form action="index.php?page=register&method=check" method="POST" name="frm_register">
		<div class="form-group">
			<label>Họ tên <span style="color: red;"><?= isset($error['name']) ? $error['name'] : '' ?></span></label>
			<input class="au-input au-input--full" type="text" name="name" placeholder="Nhập họ tên...">
		</div>
		<div class="form-group">
			<label>Email <span style="color: red;"><?= isset($error['email']) ? $error['email'] : '' ?></span></label>
			<input class="au-input au-input--full" type="email" name="email" placeholder="Nhập email...">
		</div>
		<div class="form-group">
			<label>Mật khẩu <span style="color: red;"><?= isset($error['password']) ? $error['password'] : '' ?></label>
			<input class="au-input au-input--full" type="password" name="password" placeholder="Nhập mật khẩu...">
		</div>
		<div class="form-group">
			<label>Xác nhận mật khẩu <span style="color: red;"><?= isset($error['check_pass']) ? $error['check_pass'] : '' ?></label>
			<input class="au-input au-input--full" type="password" name="check_pass" placeholder="Nhập lại mật khẩu...">
		</div>
		<div class="login-checkbox">
			<label>
				<input type="checkbox" name="aggree">Đồng ý với mọi điều khoản?
			</label>
		</div>
		<button class="au-btn au-btn--block au-btn--green m-b-20 btn_register" name="submit_register" type="submit">Đăng ký</button>
	</form>
	<div class="register-link">
		<p>
			Bạn đã có tài khoản?
			<a href="index.php?page=login">Đăng nhập ngay</a>
		</p>
	</div>
</div>