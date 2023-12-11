<?php
require_once "connection.php";

$flight_id = $_GET['flight_id'];
$sql = "DELETE FROM flights WHERE `flights`.`flight_id` = $flight_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("location: index.php");