<?php
session_start();
include "src/variables.php";
include "src/random_number.php";

// if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
// 	header("Location: index.php");
// }

if (isset($_GET['message'])) {
	$error_message = 'Invalid Username and/or Password';
}


if (isset($_POST['login'])) {
	require "src/database.php";

	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	$sql_query = "select * from accounts where username='$username'";
	$result = mysqli_query($db, $sql_query);

	$count = mysqli_num_rows($result);

	if ($count > 0) {
		$error_message = 'Could find the username, looking for password';

		$sql_query = "SELECT customer_id, username, pass from accounts where username = '$username'";
		$passwordQuery = mysqli_query($db, $sql_query);
		$passwordSalt = mysqli_fetch_row($result);

		if (password_verify( $password, $passwordSalt[2])) {
			$customerID = $passwordSalt[0];

			$sqlOrders = "SELECT order_id, customer_id FROM orders WHERE customer_id = '$customerID' AND complete = false";
			$orderQuery = mysqli_query($db, $sqlOrders);
			$basketID = mysqli_fetch_column($orderQuery, 0);
			echo $basketID;
			if (mysqli_num_rows($orderQuery) < 1) {
				do {
					$no = randomNumber();
					$basketNo = $no;
		
					$sqlCheckID = "SELECT order_id from orders where order_id = " . $basketNo;
					$checkID = mysqli_query($db, $sqlCheckID);
		
					$_SESSION['basket_id'] = $basketNo;
				} while (mysqli_num_rows($checkID) != 0);
			} else {
				$_SESSION['basket_id'] = mysqli_fetch_column($orderQuery, 0);
			}

			foreach ($passwordQuery as $row){
				$_SESSION['customer_id'] = $row['customer_id'];
				$_SESSION['username'] = $row['username'];
				if ( $row['username'] === 'joshuakelly' ) {
					$_SESSION['admin'] = true;
				} else {
					$_SESSION['admin'] = false;
				}
			}

			$_SESSION['basket_id'] = $basketID;
			$_SESSION['loggedIn'] = true;
			if ( $_SESSION['username'] === 'joshuakelly' ) {
				$_SESSION['admin'] = true;
			} else {
				$_SESSION['admin'] = false;
			}
			

			setcookie("customer_id", $row['customer_id'], time() + 3600 );
			setcookie('basket_id', $basketID, time() + 3600);
			setcookie('username', $_POST['username'], time() + 3600);
			$_COOKIE['loggedIn'] = true;
			setcookie("admin", false, time() + 3600);

			$error_message = 'It has been matched and verified';
			header('location: account.php');
			exit();
		} else {
			header("location: login.php?message=invalid");
		}
	} else {
		header('location: login.php?message=invalid');
	}
	$_POST['login'] = null;
}


	//	header('Location: index.php');
	// /$error_message = $username . ' - ' . $password;
	// $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
	// $password = trim( filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING));
	// $error_message = 'yep';

	// if (login_account($username, $password)) {
	// 	$error_message = 'Yes, it worked';
	// 	$_SESSION['loggedIn'] = true;
	// 	$_SESSION['username'] = $username;
	// 	$_SESSION['id'] = $user['customer_id'];
	// 	header("Location: account.php");
	// 	exit();
	// } else {
	// 	$error_message = 'Could not login successfully';
	// 	header("Location: login.php");
	// 	die();
	// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="description" content="Login to an existing account">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $websiteName . ' - Login'; ?></title>
	<link type="text/css" href="src/css/css.css" rel="stylesheet" />
</head>

<body>
	<?php
	include "inc/header.php";
	?>

	<div id="container">
		<div id="messages">
			<?php
			if (isset($error_message)) {
				echo '<p class="message">' . $error_message . '</p>';
			}
			?>
		</div>
		<form method="post" action="login.php" id="login">
			<table>
				<tr>
					<th colspan="2">
						<h2>Login</h2>
					</th>
				</tr>
				<tr>
					<td><label for="username">Username: </label></td>
					<td><input type="text" name="username" id="username" placeholder="Please enter your username" /></td>
				</tr>
				<tr>
					<td><label for="password">Password: </label></td>
					<td><input type="password" name="password" id="password" placeholder="Please enter your password" /></td>
				</tr>
				<tr>
					<td colspan="2"><a href="register.php">No Account? Click Here to Register</a></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="login" value="Login" /></td>
				</tr>
			</table>
		</form>
	</div>
	<?php

	include "inc/footer.php";
	?>
	<script type="text/javascript" src="src/js/js.js"></script>
</body>

</html>