<?php
	require "classes/conn.php";
	require "classes/blood_film_comment.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = BloodFilmComment::read_blood_film_comments($conn);

    $pdo->close();
	echo json_encode($response);
?>