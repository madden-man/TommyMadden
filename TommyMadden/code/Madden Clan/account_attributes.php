<?php

function checkAccountInfo($email, $pass, $account_db) {
	$selectionQuery = 	"SELECT * FROM login_info
						WHERE email = '$email'";
	
	$loginInfo = $account_db->query($selectionQuery)->fetch();
	if ($loginInfo["email"] == $email && $loginInfo["password"] == $pass) {
		return true;
	} else {
		return false;
	}
}

function getEmail($full_name, $account_db) {
	$names = explode(" ", $full_name);
	$first_name = $names[0];
	$last_name = $names[1];
	$selectionQuery =	"SELECT email FROM account_info
						WHERE firstname = '$first_name' AND lastname = '$last_name'";
	$accountInfo = $account_db->query($selectionQuery)->fetch();
	return $accountInfo[0];
}


function getFirstName($email, $account_db) {
	$selectionQuery =	"SELECT firstname FROM account_info
						WHERE email = '$email'";
	$accountInfo = $account_db->query($selectionQuery)->fetch();
	return $accountInfo[0];
}

function getLastName($email, $account_db) {
	$selectionQuery =	"SELECT lastname FROM account_info
						WHERE email = '$email'";
	$accountInfo = $account_db->query($selectionQuery)->fetch();
	return $accountInfo[0];
}

function getFullName($email, $account_db) {
	return getFirstName($email, $account_db) . " " . getLastName($email, $account_db);
}

function getGender($email, $account_db) {
	$selectionQuery =	"SELECT gender FROM account_info
						WHERE email = '$email'";
	$accountInfo = $account_db->query($selectionQuery)->fetch();
	return $accountInfo[0];
}

function getBirthday($email, $account_db) {
	$selectionQuery =	"SELECT birthday FROM account_info
						WHERE email = '$email'";
	$accountInfo = $account_db->query($selectionQuery)->fetch();
	return $accountInfo[0];
}

function getFavQuotes($email, $account_db) {
	$selectionQuery =	"SELECT fav_quotes FROM account_info
						WHERE email = '$email'";
	$accountInfo = $account_db->query($selectionQuery)->fetch();
	return $accountInfo[0];
}

function getFavBand($email, $account_db) {
	$selectionQuery =	"SELECT fav_band FROM account_info
						WHERE email = '$email'";
	$accountInfo = $account_db->query($selectionQuery)->fetch();
	return $accountInfo[0];
}

function getProfilePath($email, $account_db) {
	$selectProfilePath =	"SELECT profile_path FROM account_info
							WHERE email = '$email'";
	$accountInfo = $account_db->query($selectProfilePath)->fetch();
	return $accountInfo[0];
}

function isBirthday($email, $account_db) {
	$birthday = getBirthday($email, $account_db);
	$birthday_no_year = substr($birthday, 5);
	if (substr(date("yyyy-mm-dd"), 5) == $birthday_no_year) {
		return true;
	} else {
		return false;
	}
}

function isAdult($email, $account_db) {
	$birthday = getBirthday($email, $account_db);
	$eighteen_years_ago = date("yyyy");
	$eighteen_years_ago -= 18;
	$eighteen_years_ago .= '-' . date("mm-dd");
	if ($eighteen_years_ago > $birthday) {
		return true;
	} else {
		return false;
	}
}

?>