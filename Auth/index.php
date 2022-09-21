
<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="">

<?php
include_once './public/head.php';
?>
<body class="animsition">
	<div class="page-wrapper">
		<div class="page-content--bge5">
			<div class="container">
				<div class="login-wrap">
					<div class="login-content">
						<div class="login-logo">
							<a href="../index.php">
								<img src="./img/icon-shortcut-logo.png" alt="Laforce">
							</a>
						</div>
						<?php
							$page = isset($_GET['page']) ? $_GET['page'] : 'index';

							switch ($page) {
								case 'register':
									include_once './Controllers/RegisterController.php';
									$register = new RegisterController();
									break;
								default:
									include_once './Controllers/LoginController.php';
									$login = new LoginController();
									break;
							}
						?>
					</div>
					
				</div>
			</div>
		</div>
	</div>

<?php
include_once './public/script.php';
?>
</body>
</html>