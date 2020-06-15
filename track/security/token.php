<?php

function GenerateToken() {
	$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "0.0.0.0";
	$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "NO USER AGENT";
	$secret_key = bin2hex("expresstrack.net");

	$token = hash_hmac('sha256', $ip . $user_agent, $secret_key);

	return $token;
}

function VerifyToken() {
	$expected_token = GenerateToken();
	$submitted_token = isset($_GET['token']) ? $_GET['token'] : "";

	return hash_equals($expected_token, $submitted_token);
}

?>