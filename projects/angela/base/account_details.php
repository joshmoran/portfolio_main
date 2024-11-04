<?php
session_start();
require "src/variables.php";
require "src/database.php";

$addressID = null;

// Important information

// customer name = split into first and second namer 
// email 
// home no
// mobile no


// add card to account
// add address to account 
$errors = array();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
	header("Location: login.php");
}

if (isset($_GET['address'])) {
	$addressID = $_GET['address'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Three Sections of Details 
	// Customer Information
	// Addresses
	// Credit Card Numbers
	require "src/database.php";

	function checkSql($statement, $identifier)
	{
		if (!$statement) {
			if ($identifier == 'customer') {
				return 'UPDATE customers SET ';
			} else if ($identifier == 'address') {
				return 'UPDATE address SET ';
			} else if ($identifier == 'account') {
				return 'UPDATE accounts SET ';
			}
		} else {
			return ', ';
		}
	}

	if (isset($_POST['makeChangesCustomer'])) {

		// $sqlCustomer = "UPDATE customers SET ";
		// Check if variables are empty, if empty and not required, move on
		//	- first_name
		//	- last_name
		//	- email
		//	- home
		//	- mobile

		$sqlCustomer = '';
		$errorCustomer = array();

		function checkEmail($str)

		{
			return (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? true : false;
		}

		if (!empty($_POST['firstName'])) {
			if (strlen($_POST['firstName']) > 3) {
				$comma = checkSql($sqlCustomer, 'customer');
				$sqlCustomer .= $comma . ' first_name = "' . mysqli_real_escape_string($db, $_POST['firstName']) . '" ';
			} else {
				$errorCustomer[] = 'firstname';
				$errorFirstName = 'First name must not be empty or less than 3 characters.';
			}
		} else {
			$errorCustomer[] = "firstname";
			$errorFirstName = ' First name is a required.';
		}

		if (!empty($_POST['lastName'])) {
			if (strlen($_POST['lastName']) > 3) {
				$comma = checkSql($sqlCustomer, 'customer');
				$sqlCustomer .= $comma . ' last_name = "' . mysqli_escape_string($db, $_POST['lastName']) . '" ';
			} else {
				$errorCustomer[] = 'lastname';
				$errorLastName = 'Last name must not be empty or less than 3 characters.';
			}
		} else {
			$errorCustomer[] = 'lastname';
			$errorLastName = 'Last name is a required.';
		}

		if (!empty($_POST['email'])) {
			if (checkEmail($_POST['email']) === true || strlen($ema_POST['email']) != '' || $_POST['email'] != null) {
				$comma = checkSql($sqlCustomer, 'customer');
				$sqlCustomer .= $comma . ' email = "' . mysqli_escape_string($db, $_POST['email']) . '" ';
			} else {
				$errorCustomer[] = 'Email';
				$errorEmail = 'Must be a valid email address.';
			}
		} else {
			$errorCustomer[] = 'email';
			$errorEmail = 'Email is a required field';
		}

		if (!empty($_POST['mobile'])) {
			if (strlen($_POST['mobile']) == 11) {
				$comma = checkSql($sqlCustomer, 'customer');
				$sqlCustomer .= $comma . 'mobile = "' . mysqli_escape_string($db, $_POST['mobile']) . '"';
			} else {
				$errorCustomer[] = 'mobile phone';
				$errorMobile = 'Enter a valid mobile number, must start with 11 characters and starts with 0.';
			}
		} 

		if (!empty($_POST['home'])) {
			if (strlen($_POST['home']) == 11) {
				$comma = checkSql($sqlCustomer, 'customer');
				$sqlCustomer .= $comma . ' home = "' . mysqli_escape_string($db, $_POST['home']) . '" ';
			} else {
				$errorCustomer[] = 'home phone';
				$errorHome = 'Enter a valid home number, must start with 11 characters and starts with 0.';
			}
		}

		$sqlCustomer .= ' WHERE customer_id = "' . $_SESSION['customer_id'] . '"';

		if (count($errorCustomer) === 0) {
			
			if (mysqli_query($db, $sqlCustomer)) {
				$errorCustomer[] = 'Successfully updated your customer details';
			} else {
				$errorCustomer[] = 'Something went wrong. Please try again later';
			}
		} else {
			$error_message = 'There has been a problem submitting your results. Please try again.';
		}

		$_POST['makeChangesCustomer'] = null;
	}

	if (isset($_POST['deleteAddress'])) {
		echo $_POST['whichAddress'];
		if (isset($_POST['whichAddress']) && $_POST['whichAddress'] != 'new') {
			if (mysqli_query($db, "DELETE FROM address WHERE customer_id = '" . $_SESSION['customer_id'] . "' AND 1_line = '" . $_POST['whichAddress'] . "';")) {
				$error_message = 'Successfully deleted the address';
			} else {
				$error_message = 'There has been a problem deleting the address. Please try again.';
			}
		} else {
			$error_message = 'There are no addresses in the system. Please add an address to delete it.';
		}
		$_POST['deleteAddress'] = null;
	}

	if (isset($_POST['updateAddress'])) {
		$sqlAddress = 'INSERT INTO address ( customer_id, 1_line, 2_line, 3_line, region, postcode ) VALUES ( "' . $_SESSION['customer_id'] . '"';
		$errorsAddress = array();

		// Address Line 1
		if (!empty($_POST['address1st'])) {

			$sqlAddress .= ', "' . mysqli_real_escape_string($db, $_POST['address1st']) . '" ';
		} else {
			$errorsAddress[] = 'Address line 1';
			$errorLine1 = "Line 1 is a required field";
		}

		// Address Line 2
		if (!empty($_POST['address2nd'])) {
			$sqlAddress .= ', "' . mysqli_real_escape_string($db, $_POST['address2nd']) . '" ';
		} else {
			$errorsAddress[] = "Address line 2";
			$errorLine2 = 'Line 2 is a required field.';
		}

		// Address Line 3
		$sqlAddress .= ', "' . mysqli_real_escape_string($db, $_POST['address3rd']) . '" ';

		// Address Region
		if (!empty($_POST['region'])) {
			$sqlAddress .=  ', "' . mysqli_real_escape_string($db, $_POST['region']) . '" ';
		} else {
			$errorsAddress[] = 'Region';
			$errorRegion = "Region is a required field";
		}

		// Address Postcode
		if (!empty($_POST['postcode']) && strlen($_POST['postcode']) == 7) {
			$sqlAddress .= ', "' . mysqli_real_escape_string($db, $_POST['postcode']) . '" ';
		} else {
			$errorsAddress[] = 'Postcode';
			$errorPostcode = "Postcode is a required field and have no spaces.";
		}

		$sqlAddress .= ')';

		if (count($errorsAddress) == 0) {
			if (mysqli_query($db, $sqlAddress)) {
				$error_message = 'Successfully updated.';
			} else {
				$error_message = 'Something went wrong. Please try again later. Or if the problem continues, please contact the support team.';
			}
		} else {
			$error_message = 'Please resolve the issues to continue with the change.';
		}

		$_POST['updateAddress'] = null;
	}

	if (isset($_POST['addAddress'])) {
		$sqlAddAddress = 'INSERT INTO address ( customer_id, 1_line, 2_line, 3_line, region, postcode) VALUES ( "' . $_SESSION['customer_id'] . '"';
		$errorAddAddress = array();

		if (!empty($_POST['address1st'])) {
			$sqlAddAddress .= ', "' . mysqli_real_escape_string($db, $_POST['address1st']) . '"';
		} else {
			$errorAddAddress[] = 'Address line 1';
			$errorLine1 = 'Please enter your address line 1 to continue.';
		}

		if (!empty($_POST['address2nd'])) {
			$sqlAddAddress .= ', "' . mysqli_real_escape_string($db, $_POST['address2nd']) . '"';
		} else {
			$errorAddAddress[] = 'Address line 2';
			$errorLine2 = 'Please enter your address line 2 to continue.';
		}

		$sqlAddAddress .= ', "' . mysqli_real_escape_string($db, $_POST['address3rd']) . '"';

		if (!empty($_POST['region'])) {
			$sqlAddAddress .= ', "' . mysqli_real_escape_string($db, $_POST['region']) . '"';
		} else {
			$errorAddAddress[] = 'Address region';
			$errorRegion = 'Please enter your region to continue.';
		}

		if (!empty($_POST['postcode'])) {
			if (strlen($_POST['postcode']) == 7) {
				$sqlAddAddress .= ', "' . mysqli_real_escape_string($db, $_POST['postcode']) . '"';
			} else {
				$errorAddAddress[] = 'Postcode';
				$errorPostcode = 'Please enter a valid postcode to continue.';
			}
		} else {
			$errorAddAddress[] = 'Postcode';
			$errorPostcode = 'Please enter your postcode to continue.';
		}

		$sqlAddAddress .= ')';

		if (count($errorAddAddress) == 0) {
			if (mysqli_query($db, $sqlAddAddress)) {
				$error_message = 'Successfully added the address to your account.';
			} else {
				$error_message = 'Something went wrong. Please try again later. Or if the problem continues, please contact the support team.';
			}
		} else {
			$error_message = 'Please resolve the issues to continue with the change.';
		}

		$_POST['addAddress'] = null;
	}

	if (isset($_POST['makeChangesAccount'])) {
		$sqlAccount = '';
		$errorsAccount = array();

		if (!empty($_POST['username'])) {
			$sqlUsername = "SELECT username FROM accounts WHERE username = '" . mysqli_real_escape_string($db, $_POST['username']) . "'";
			$usernameQuery = mysqli_query($db, $sqlUsername);

			if (strlen($_POST['username']) > 7) {
				if (mysqli_num_rows($usernameQuery) === 0) {
					$comma = checkSql($sqlAccount, 'account');
					$sqlAccount .= $comma . ' username = "' . mysqli_real_escape_string($db, $_POST['username']) . '" ';
				} else {
					$errorsAccount[] = 'Username is already used';
					$errorUsername = 'Username is already used. Please try another.';
				}
			} else {
				$errorsAccount[] = 'Username is not long enough.';
				$errorUsername = 'Username is not long enough.';
			}
		} else {
			$errorsAccount[] = "Username is empty";
		}

		if (!empty($_POST['password'])) {
			if (strlen($_POST['password']) < 7) {
				$errorsAccount[] = 'Increase the length of the password';
				$errorPassword = 'Password is not long enough.';
			} else {
				$comma = checkSql($sqlAccount, 'account');
				$sqlAccount .= $comma . ' pass = "' . mysqli_real_escape_string($db, $_POST['password']) . '" ';
			}
		} else {
			$errorsAccount[] = "Password is invalid";
		}

		$sqlAccount .= ' WHERE customer_id = "' . $_SESSION['customer_id'] . '";';


		if (!count($errorsAccount)) {
			try {
				mysqli_query($db, $sqlAccount);
				$error_message = 'Successfully updated your account details.';
			} catch (Exception $e) {
				$error_message = $e->getMessage() . ', Something went wrong. Please try again later. Or if the problem continues, please contact the support team.';
			}
		} else {
			$error_message = 'Please resolve the errors to continue with the change.';
		}

		$_POST['makeChangesAccount'] = null;
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Account Portal allowing the user to change details. Split into 3 sections: customer details, address and account details">
	<title><?php echo $websiteName; ?> - Change Account Details</title>
	<link type="text/css" href="src/css/css.css" rel="stylesheet" />

	<link type="text/css" href="src/css/account_details.css" rel="stylesheet" />
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
		<form method="post" id="makeChanges" action="account_details.php">
			<!-- 
				Main categories, each with a select button
					- Details
					- Address
					- Credit Cards
			 -->
			<table>
				<!-- 
					CHANGE CUSTOMER DETAILS 
				 -->

				<?php
				$sqlCustomer = "SELECT * FROM customers WHERE customer_id = '" . $_SESSION['customer_id'] . "'";
				$customerQuery = mysqli_query($db, $sqlCustomer);

				while ($user  = mysqli_fetch_assoc($customerQuery)) :
				?>
					<tr>
						<th colspan="3">
							<h1>Change account details</h1>
						</th>
					</tr>
					<tr>
						<th colspan="3">
							Change Personal Details
						</th>
					</tr>
					<tr>
						<td colspan="3"><label for="personalChanges">Make changes to my personal details</label></td>
					</tr>
					<!-- 
					INPUTS TO BE ADDED
						- FIRST NAME
						- LAST NAME
						- EMAIL
						- HOME NO
						- MOBILE NO
				 -->
					<tr>
						<td><label for="firstName">First Name: </label></td>
						<td><input type="text" name="firstName" <?php if (isset($user['first_name'])) {
																	echo 'value="' . $user['first_name'] . '"';
																} ?> placeholder="John" /></td>
						<td><?php if (isset($errorFirstName)) {
								echo $errorFirstName;
							} ?></td>
					</tr>
					<tr>
						<td><label for="lastName">Last Name: </label></td>
						<td><input type="text" name="lastName" <?php if (isset($user['last_name'])) {
																	echo 'value="' . $user['last_name'] . '"';
																} ?> placeholder="Smith" /></td>
						<td><?php if (isset($errorLastName)) {
								echo $errorLastName;
							} ?></td>
					</tr>
					<tr>
						<td><label for="email">Email: </label></td>
						<td><input type="text" name="email" <?php if (isset($user['email'])) {
																echo 'value="' . $user['email'] . '"';
															} ?> placeholder="johnsmith@email.com" /></td>
						<td><?php if (isset($errorEmail)) {
								echo $errorEmail;
							} ?></td>
					</tr>
					<tr>
						<td><label for="home">Home Number: </label></td>
						<td><input type="text" name="home" <?php if (!empty($user['home'])) {
																echo 'value="' . $user['home'] . '"';
															} ?> placeholder="01661827937"></td>

						<td><?php if (isset($errorHome)) {
								echo $errorHome;
							} ?></td>
					</tr>
					<tr>
						<td><label for="mobile">Mobile Number: </label></td>
						<td><input type="text" name="mobile" <?php if (!empty($user['mobile'])) {
																	echo 'value="' . $user['mobile'] . '"';
																} ?> placeholder="07826384781" /></td>
						<td><?php if (isset($errorMobile)) {
								echo $errorMobile;
							} ?></td>
					</tr>
					<tr>
						<td colspan="3"><button type="submit" name="makeChangesCustomer" value="Submit">Submit</button></td>
					</tr>

				<?php
				endwhile;
				?>
				<!--
					CHANGE ADDRESS DETAILS
						- first line 
						- second line 
						- third line 
						- region
						- postcode
				 -->
				<tr>
					<th colspan="3">Change Address Details</th>
				</tr>
				<tr>
					<td colspan="3"><label for="addressChanges">Make changes to my addresses.</label></td>
				</tr>



				<tr>
					<?php
					$count = 0;
					$sqlAddress = "SELECT * FROM address WHERE customer_id = '" . $_SESSION['customer_id'] . "'";
					$addressRows = mysqli_query($db, $sqlAddress);

					//$address_id = mysqli_fetch_row($addressRows);

					echo '<td colspan="3"><select onchange="changeAddress()" name="whichAddress" id="whichAddress" >';
					while ($address = mysqli_fetch_array($addressRows)) {
						$fullAddress = $address['1_line'] . ', ' . $address['2_line'] . ', ' . $address['3_line'] . ', ' .$address['region'] . ', ' . $address['postcode'];
						// echo $fullAddress;
						if ($addressID == null) {
							$addressID = $address[1];
						}
						echo '<option value="' . $address[1] . '"';
						if (isset($_GET['address']) && $_GET['address'] == $address[1]) {
							echo ' selected';
						}
						echo '>' . $fullAddress . '</option>';
					}
					echo '<option value="new"';
					if (isset($_GET['address']) && $_GET['address'] == 'new') {
						// echo ' " ';
					}
					echo '  selected="selected" >Add a new Address</option>';
					echo '</select></td>';
					?>
				</tr>

				<div id="address">
					<?php
					$rowAddress = array();
					$addressID;

					if (!isset($addressID)) {
						if (isset($_GET['addressID']) && $_GET['address'] != 'new') {

							$addressRow1 = "SELECT * FROM address WHERE customer_id = " . $_SESSION['customer_id'] . " AND 1_line = " . $_GET['address'];
							$addressRow1Query = mysqli_query($db, $addressRow1);
							echo 'address row';
							while ($address =  mysqli_fetch_row($addressRow1Query)) {
								$addressID = $address[1];
							}
						} else if (isset($_POST['addressID'])) {
							$addressID = $_POST['addressID'];
						}
					}


					if (isset($_GET['address']) && $_GET['address'] != 'new' ) {
						$row = "SELECT * FROM address WHERE customer_id = '" . $_SESSION['customer_id'] . "' AND 1_line = '" . $addressID . "'";

						$rowQuery = mysqli_query($db, $row);

						while ($address = mysqli_fetch_row($rowQuery)) {
							$rowAddress[0] = $address[1];
							$rowAddress[1] = $address[2];
							$rowAddress[2] = $address[3];
							$rowAddress[3] = $address[4];
							$rowAddress[4] = $address[5];
						}
					} else {
						for ($a = 0; $a < 5; $a++) {
							$rowAddress[$a] = '';
						}
					}
					?>

					<tr>
						<td><label for="address1st">First Line</label></td>
						<td><input type="text" name="address1st" value="<?php if (isset($rowAddress[0])) {
																			echo $rowAddress[0];
																		} else if (isset($_POST['address1st'])) {
																			echo $_POST['address1st'];
																		} ?>" /></td>
						<td><?php if (isset($errorLine1)) {
								echo $errorLine1;
							} ?></td>
					</tr>
					<tr>
						<td><label for="address2nd">Second Line</label></td>
						<td><input type="text" name="address2nd" value="<?php if (isset($rowAddress[1])) {
																			echo $rowAddress[1];
																		} else if (isset($_POST['address2nd'])) {
																			echo $_POST['address2nd'];
																		} ?>" /></td>
						<td><?php if (isset($errorLine2)) {
								echo $errorLine2;
							} ?></td>
					</tr>
					<tr>
						<td><label for="address3rd">Third Line</label></td>
						<td><input type="text" name="address3rd" value="<?php if (isset($rowAddress[2])) {
																			echo $rowAddress[2];
																		} else if (isset($_POST['address3rd'])) {
																			echo $_POST['address3rd'];
																		} ?>" /></td>
						<td><?php if (isset($errorLine3)) {
								echo $errorLine3;
							} ?></td>
					</tr>
					<tr>
						<td><label for="region">Region</label></td>
						<td><input type="text" name="region" value="<?php if (isset($rowAddress[3])) {
																		echo $rowAddress[3];
																	} else if (isset($_POST['region'])) {
																		echo $_POST['region'];
																	} ?>" /></td>
						<td><?php if (isset($errorRegion)) {
								echo $errorRegion;
							} ?></td>
					</tr>
					<tr>
						<td><label for="postcode">Postcode</label></td>
						<td><input type="text" name="postcode" value="<?php if (isset($rowAddress[4])) {
																			echo $rowAddress[4];
																		} else if (isset($_POST['postcode'])) {
																			echo $_POST['postcode'];
																		} ?>"></td>
						<td><?php if (isset($errorPostcode)) {
								echo $errorPostcode;
							} ?></td>
					</tr>
					<tr>
						<td colspan="3"><input type="hidden" name="addressID" value="<?php if (isset($addressID)) {
																							echo $addressID;
																						} ?>"></td>
					</tr>
				</div>
				<tr>
					<td><button type="submit" name="updateAddress">Update Address</button></td>
					<td><button type="submit" name="deleteAddress">Delete Address</button></td>
					<td><button type="submit" name="addAddress">Add Address</button></td>
				</tr>
				<!-- 
					CHANGE ACCOUNT
				  -->
				<?php
				$sqlAccount = "SELECT * FROM accounts WHERE customer_id = '" . $_SESSION['customer_id'] . "'";
				$accountQuery = mysqli_query($db, $sqlAccount);

				while ($account = mysqli_fetch_assoc($accountQuery)) :
				?>
					<tr>
						<th colspan=" 3">
							Change Account Details
						</th>
					</tr>
					<tr>
						<td colspan="3"><label for="accountChanges">Make changes to my account details.</label></td>
					</tr>
					<tr>
						<td><label for="username">Username: </label></td>
						<td><input type="text" name="username" value="<?php echo $account['username']; ?>" /></td>
						<td><?php if (isset($errorUsername)) {
								echo $errorUsername;
							} ?></td>
					</tr>
					<tr>
						<td><label for="password">Password: </label></td>
						<td><input type="password" name="password" value="<?php echo $account['pass']; ?>" /></td>
						<td><?php if (isset($errorPassword)) {
								echo $errorPassword;
							} ?></td>
					</tr>
				<?php
				endwhile;
				?>
				<tr>
					<td colspan="3"><button type="submit" name="makeChangesAccount">Make account changes</button></td>
				</tr>

			</table>
		</form>
		<?php
		include "inc/footer.php";
		?>
		<script src="src/js/js.js"></script>
		<script src="src/js/account_details.js"></script>
</body>

</html>