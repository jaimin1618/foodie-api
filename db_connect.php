<?php

function db_connect() {
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	confirm_connection($conn);
	return $conn;
}

function confirm_connection(mysqli $conn) {
	if ($conn->connect_errno) {
		$msg = "Database connection failed: ";
		$msg .= $conn->connect_error;
		$msg .= " [" . $conn->connect_errno . "];";
		exit($msg);
	}
}

function db_disconnect(mysqli $conn) {
	if (isset($conn)) {
		$conn->close();
	}
}
