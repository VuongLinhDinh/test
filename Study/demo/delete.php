<?php
require_once "conect.php";

//Lấy movie_id của bản ghi cần xóa
$movie_id = $_GET['movie_id'];
//SQL delete
$sql = "
SELECT `movie_id` FROM `movies`,
DELETE FROM `movies`";
$stmt = $conn->prepare($sql);
$stmt->execute();