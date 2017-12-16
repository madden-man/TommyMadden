<?php

if ($_POST['email'] != null) {
	
	// Get account information
	$member_email = $_POST['email'];
	$member_pass = $_POST['pass'];
	$member_passCheck = $_POST['passCheck'];
	$member_firstname = $_POST['firstname'];
	$member_lastname = $_POST['lastname'];
	$member_gender = $_POST['gender'];
	// birthday
	$birthday_year = $_POST['year'];
	$birthday_month = $_POST['month'];
	$birthday_day = $_POST['day'];
	if ($birthday_month >= 1 && $birthday_month < 10) {
		$birthday_month = "0" . $birthday_month;
	}
	if ($birthday_day >= 1 && $birthday_day < 10) {
		$birthday_day_ = "0" . $birthday_day;
	}
	$member_birthday = $birthday_year . '-' . $birthday_month . '-' . $birthday_day;
	$member_fav_quotes = $_POST['fav_quotes'];
	$member_fav_band = $_POST['fav_band'];
	$member_generation = "";
	$status = $_POST['gen_status'];
	if ($status == "Cousin" || $status == "Brother" || $status == "Sister") {
		$member_generation = 0;
	} else if ($status == "Father" || $status == "Mother" || $status == "Aunt" || $status == "Uncle") {
		$member_generation = 1;
	} else if ($status == "Grandfather" || $status == "Grandmother" || $status == "Great-aunt" || $status == "Great-uncle") {
		$member_generation = 2;
	}
	$member_profile_path = "";
	if (isset($_FILES['profile_pic'])) {
		$errors = array();
		$file_name = $_FILES['profile_pic']['name'];
		$file_size = $_FILES['profile_pic']['size'];
		$file_tmp = $_FILES['profile_pic']['tmp_name'];
		$file_type = $_FILES['profile_pic']['type'];
		$file_dimensions = getimagesize($file_tmp);
		$member_profile_path = $file_name;
	}
	// Check for errors in filling out the form
	$errorArray = array();
	
	$anyErrors = false;
	
	if ($member_firstname == "") {
		$errorArray["firstNameBlank"] = "You must enter a first name! I like the name \"Tommy\" but it\'s up to you.";
	} if ($member_lastname == "") {
		$errorArray["lastNameBlank"] = "You must enter a last name! I like the last name \"Madden\" but it\'s up to you.";
	} if ($member_email == "") {
		$errorArray["emailBlank"] = "You must enter an email address. This is how we will contact you if someone posts!";
	} if ($member_gender == "") {
		$errorArray["genderBlank"] = "You must enter a gender, unless you\'re an alien. If you are, call Tommy up to learn about Earth.";
	} if (checkAccountExists($member_email)) {
		$errorArray["emailTaken"] = "An account already exists with that email! You must choose a unique email account.";
	} if ($member_pass == "") {
		$errorArray["passBlank"] = "The password cannot be blank, this is how we keep your account secure!";
	} if ($member_pass != $member_passCheck) {
		$errorArray["noPassMatch"] = "The passwords you enter must match!";
	} if ($member_birthday == "") {
		$errorArray["birthdayBlank"] = "The birthday is blank! Please enter a birthday.";
	} if (isset($_FILES['profile_pic'])) {
		if ($file_size > 10000000) {
			$errorArray["profileTooBig"] = "The profile pic is too large a file!";
		} if ($file_dimensions[0] > 150) {
			$errorArray["profileTooWide"] = "The profile pic is too wide! Limit: 100 pixels wide.";
		} if ($file_dimensions[1] > 150) {
			$errorArray["profileTooTall"] = "The profile pic is too tall! Limit: 100 pixels tall.";	
		}
	}
	
	if (empty($errorArray)) {
		$loginInsertionQuery =	"INSERT INTO login_info
									(email, password, dateAccountCreated)
								VALUES
									('$member_email', '$member_pass', NOW())";
		$loginResult = $account_db->exec($loginInsertionQuery);
		if ($loginResult) {
			$accountResult = "";
			if (isset($_FILES['profile_pic'])) {
				$fileInsertionQuery =	"INSERT INTO account_info
										(email, firstname, lastname, gender, birthday, generation, fav_quotes, fav_band, profile_path)
									VALUES
										('$member_email', '$member_firstname', '$member_lastname', '$member_gender', DATE '$member_birthday', '$member_generation', '$member_fav_quotes', '$member_fav_band', '$member_profile_path')";
				$accountResult = $account_db->exec($fileInsertionQuery);
				if ($accountResult) {
					move_uploaded_file($file_tmp, "photos/" . $member_profile_path);
				}
			} else {
				$otherInsertionQuery = 	"INSERT INTO account_info
										(email, firstname, lastname, gender, birthday, generation, fav_quotes, fav_band)
									VALUES
										('$member_email', '$member_firstname', '$member_lastname', '$member_gender', DATE '$member_birthday', '$member_generation', '$member_fav_quotes', '$member_fav_band')";
				$accountResult = $account_db->exec($otherInsertionQuery);
			}
			if ($accountResult) {
				$accountSubmitted = "yes";
			} else {
				$accountSubmitted = "no";
			}
		}
	}
}

?>