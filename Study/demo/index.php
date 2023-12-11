<?php 
    require_once "conect.php";

    $sql = "SELECT * FROM movies ";
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
</head>
<body>
    <table border="1">
        <tr>
            <th>movie_id</th>
            <th>title</th>
            <th>poster</th>
            <th>release_date</th>
            <th>overview</th>
            <th><button><a href="add.php">ADD</a></button></th>
        </tr>
        <?php foreach($movies as $value): ?>
        <tr>
            <td><?= $value['movie_id']?></td>
            <td><?= $value['title']?></td>
            <td>
                <img src="images/<?= $value['poster']?>" width="100" alt="" >
            </td>
            <td><?= $value['release_date']?></td>
            <td><?= $value['overview']?></td>
            <td>
                <button><a onclick="return confirm('Bạn muốn xóa cái này chứ?');" href="delete.php?movie_id=<= $value['movie_id']>">DELETE</a></button>
                <button><a href="edit.php?movie_id=<= $value['movie_id']>">EDIT</a></button>
            </td>
        </tr>
        <?php endforeach?>
    </table>
</body>
</html>