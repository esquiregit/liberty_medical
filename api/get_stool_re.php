<?php
	require "classes/conn.php";
	require "classes/stool_re.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = StoolRE::read_stool_re($conn);

    $pdo->close();
	echo json_encode($response);
?>