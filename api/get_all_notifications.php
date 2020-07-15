<?php
	require "classes/notification.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Notification::read_notifications($conn);

    $pdo->close();
	echo json_encode($response);
?>