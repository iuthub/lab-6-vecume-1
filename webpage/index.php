<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<?php

		$date_of_birth_regex = '/^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/';
		
		$gender_options = ["male", "female"];
		$marital_status_options = ["single", "married", "divorced", "widowed"];

		$name = $_REQUEST["name"];
		$email = $_REQUEST["email"];
		$username = $_REQUEST["username"];
		$password = $_REQUEST["password"];
		$confirm_password = $_REQUEST["confirm_password"];
		$date_of_birth = $_REQUEST["date_of_birth"];
		$gender = $_REQUEST["gender"];
		$marital_status = $_REQUEST["marital_status"];
		$address = $_REQUEST["address"];
		$city = $_REQUEST["city"];
		$postal_code = $_REQUEST["postal_code"];
		$home_phone = $_REQUEST["home_phone"];
		$mobile_phone = $_REQUEST["mobile_phone"];
		$card_number = $_REQUEST["card_number"];
		$card_due_date = $_REQUEST["card_due_date"];
		$monthly_salary = $_REQUEST["monthly_salary"];
		$web_site_url = $_REQUEST["web_site_url"];
		$gpa = $_REQUEST["gpa"];
	?>
	<body>
		<form action="index.php">
			<h1>Registration Form</h1>

			<p>
				This form validates user input and then displays "Thank You" page.
			</p>
			
			<hr />
			
			<h2>Please, fill below fields correctly</h2>
			<dl>
				<dt>Name 
						<mark>
							<?php 
								if (strlen($name) < 2) {
									echo "Name has to contain at least 2 chars.";
								} 
							?>
							</mark>
					</dt>
				<dd>
					<input type="text" name="name" required value="<?= $name ?>">
				</dd>

				<dt>Email <mark><?php if (!filter_var($email, FILTER_VALIDATE_EMAIL)) echo "Invalid email"?></mark>
				</dt>
				<dd>
					<input type="text" name="email" required value="<?= $email ?>">
				</dd>

				<dt>Username <mark><?php if (strlen($username) < 5) echo "Username has to contain at least 5 chars."?></mark></dt>
				<dd>
					<input type="text" name="username" required value="<?= $username ?>">
				</dd>
				
				<dt>Password <mark><?php if (strlen($password) < 8) echo "Passowd has to contain at least 8 chars."?></mark></dt>
				<dd>
					<input type="text" name="password" required value="<?= $password ?>">
				</dd>

				<dt>Confirm Password <mark><?php if ($password != $confirm_password) echo "Passowds should match"?></mark></dt>
				<dd>
					<input type="text" name="confirm_password" required value="<?= $confirm_password ?>">
				</dd>

				<dt>Date of birth <mark><?php if(!preg_match($date_of_birth_regex ,$date_of_birth)) echo "Date should be written in dd.MM.yyyy format. For ex, 07.03.2019"?></mark></dt>
				<dd>
					<input type="text" name="date_of_birth" required value="<?= $date_of_birth ?>" placeholder="07.03.2019">
				</dd>

				<dt>Gender</dt>
				<dd>
					<select name="gender" required  >
						<?php
							for ($i=0; $i < count($gender_options); $i++) { 
								$is_selected = $gender_options[$i] === $gender;
								if ($is_selected) {
										echo "<option value=$gender_options[$i] selected >$gender_options[$i]</option>";
								} else {
									echo "<option value=$gender_options[$i] >$gender_options[$i]</option>";
								}
							}
						?>
					</select>
				</dd>
				
				<dt>Marital status</dt>
				<dd>
					<select name="marital_status" required value="<?= $marital_status ?>">
					<?php
							for ($i=0; $i < count($marital_status_options); $i++) { 
								$is_selected = $marital_status[$i] === $marital_status;
								if ($is_selected) {
										echo "<option value=$marital_status[$i] selected >$marital_status[$i]</option>";
								} else {
									echo "<option value=$marital_status[$i] >$marital_status[$i]</option>";
								}
							}
						?>
					</select>
				</dd>
				
				<dt>Address</dt>
				<dd>
					<input type="text" name="address" required value="<?= $address ?>">
				</dd>

				<dt>City</dt>
				<dd>
					<input type="text" name="city" required value="<?= $city ?>">
				</dd>

				<dt>Postal code</dt>
				<dd>
					<input type="text" name="postal_code" required value="<?= $postal_code ?>" placeholder="100011">
				</dd>

				<dt>Home phone</dt>
				<dd>
					<input type="text" name="home_phone" required value="<?= $home_phone ?>" placeholder="97 1234567">
				</dd>

				<dt>Mobile phone</dt>
				<dd>
					<input type="text" name="mobile_phone" required value="<?= $mobile_phone ?>" placeholder="97 1234567">
				</dd>
				
				<dt>Card Number</dt>
				<dd>
					<input type="text" name="card_number" required value="<?= $card_number ?>" placeholder="1234 1234 1234 1234">
				</dd>

				<dt>Card Expiry date</dt>
				<dd>
					<input type="text" name="card_due_date" required value="<?= $card_due_date ?>" placeholder="07.03.2019">
				</dd>

				<dt>Monthly salary</dt>
				<dd>
					<input type="text" name="monthly_salary" required value="<?= $monthly_salary ?>" placeholder="UZS 200,000.00">
				</dd>

				<dt>Web Site URL</dt>
				<dd>
					<input type="text" name="web_site_url" required value="<?= $web_site_url ?>" placeholder="http://github.com">
				</dd>
				
				<dt>GPA</dt>
				<dd>
					<input type="text" name="gpa" required value="<?= $gpa ?>">
				</dd>

				<!-- Write other fiels similar to Name as specified in lab6.pdf -->
			</dl>
			
			<button type="submit">
				Register
			</button>
		</form>
	</body>
</html>