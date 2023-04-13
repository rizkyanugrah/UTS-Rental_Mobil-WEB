<?php
require '../session.php';

// if (isset($_SESSION['logged_account']) && $_SESSION['logged_account']) {
// 	$accountRole = $_SESSION['logged_account']['role'];

// 	if ($accountRole == 'member') header('Location: books.php');
// 	if ($accountRole == 'staff') header('Location: books.php');
// 	if ($accountRole == 'admin') header('Location: dashboard.php');

// 	die;
// }

if (isset($_POST['login'])) {
	$errorMessage = null;
	$oldEmail = null;

	if ($_POST['role'] != 'null') {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		$accounts = $_SESSION['accounts'];


		foreach ($accounts as $account) {
			if ($email == $account['email'] && password_verify($password, $account['password'])) {
				$logged_account = [
					'email' => $account['email'],
					'name' => $account['name'],
					'role' => $account['role'],
					'logged_at' => time()
				];

				if ($role == 'member' && $account['role'] == 'Member') {
					header('Location: ../member/dashboard.php');
					$_SESSION['logged_account'] = $logged_account;
					die;
				}

				if ($role == 'staff' && $account['role'] == 'Staff') {
					header('Location: ../member/dashboard.php');
					$_SESSION['logged_account'] = $logged_account;
					die;
				}

				if ($role == 'admin' && $account['role'] == 'Admin') {
					header('Location: ../member/dashboard.php');
					$_SESSION['logged_account'] = $logged_account;
					die;
				}
			}
		}

		$errorMessage = 'Invalid Email or Password!';
		$oldEmail = $email;
	} else {
		$errorMessage = 'Silahkan Pilih Role Anda';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="loginBox">
		<img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
		<h3>Sign in here</h3>
		<?php if (isset($errorMessage)) : ?>
			<div class="alert alert-danger alert-dismissible"><?= $errorMessage; ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<form action="" method="post">
			<div class="inputBox">
				<input id="email" type="email" name="email" placeholder="Email" value="<?= isset($oldEmail) ? $oldEmail : ''; ?>">
				<input id="pass" type="password" name="password" placeholder="Password">
				<select name="role" id="role" class="form-control required" style="background-color: #656ac2; color: white;">
					<option value="null">Select Role</option>
					<option value="member">Member</option>
					<option value="staff">Staff</option>
					<option value="admin">Admin</option>
				</select>
			</div>
			<!-- <br> -->
			<input type="submit" name="login" value="Login">
		</form>
		<div class="text-center">
			<a href="../register/register.php" style="color: #59238F;" class="mt-2">Sign-Up</a>
		</div>

	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>