<?php 
    require_once "conect.php";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $title = $_POST['title'];
        $file = $_FILES['poster'];
        $poster = $file['name'];
        move_uploaded_file($file['tmp_name'], "images/" . $poster);
        $overview = $_POST['overview'];
        $release_date = $_POST['release_date'];
        // $genre_id = $_POST['genre_id'];

        $sql = "INSERT INTO `movies`(`title`, `poster`, `overview`, `release_date`, `genre_id`) VALUES ('$title','$poster','$overview','$release_date', '1')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $sql = "SELECT * FROM genres ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- INSERT INTO `movies`(`movie_id`, `title`, `poster`, `overview`, `release_date`, `genre_id`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]') -->
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        title:  <input type="text" name="title" id=""><br><br>
        poster:  <input type="file" name="poster" id=""><br><br>
        overview:  <textarea name="overview" id="" cols="100" rows="10"></textarea><br><br>
        release_date:  <input type="date" name="release_date" id=""><br><br>
        <button>Submit</button>
        <button><a href="index.php">LIST</a></button>
    </form>
</body>
</html>