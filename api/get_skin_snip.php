<?php
	require "classes/conn.php";
	require "classes/skin_snip.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = SkinSnip::read_skin_snip($conn);

    $pdo->close();
	echo json_encode($response);
?>