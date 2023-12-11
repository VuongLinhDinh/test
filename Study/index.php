<?php  
    require_once "connection.php";
    // Câu lệnh sql select
    $sql = "SELECT m.*, `genre_name`
    FROM movies m
    JOIN genres g 
    ON m.genre_id = g.genre_id"; // dieu kien
    // $sql = "SELECT movie_id, title, poster, overview, release_date, genre_name FROM movies m JOIN genres g ON m.genre_id=g.genre_id";
        // movies.* = movie_id, title, poster, overview, release_date
    // Chuan bi
    $stmt = $conn->prepare($sql);
    // thu thi
    $stmt->execute();
    // lay du lieu
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // PDO::FETCH_ASSOC -> đổ dữ liệu ra 1 mảng liên kêt có key và value
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sach Phim</title>
    <style>
        table th {
            border: 1px solid black;
        }
        button a { 
            text-decoration: none;
            color: black;
        }
        .add {
            width: 100%;
            outline: none;
            border: none;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>#ID</th>
            <th>Title</th>
            <th>Poster</th>
            <th>Overview</th>
            <th>Release date</th>
            <th>Genre Name</th>
            <th>
                <button class="add"><a href="add.php">ADD</a></button>
            </th>
        </tr>
        <?php foreach($movies as $m): ?>
            <!-- movies.* = movie_id, title, poster, overview, release_date -->
            <tr>
                <td><?= $m['movie_id']?></td>
                <td><?= $m['title']?></td>
                <td>
                    <img src="image/<?= $m['poster']?>" width="100" alt="">
                </td>
                <td><?= $m['overview']?></td>
                <td><?= $m['release_date']?></td>
                <td><?= $m['genre_name']?></td>
                <td>
                    <button><a href="edit.php?movie_id=<?= $m['movie_id']?>">EDIT</a></button>
                    <button><a onclick="return confirm('Are you delete?')" href="delete.php?movie_id=<?= $m['movie_id']?>">DELETE</a></button>

                </td>
            </tr>
        <?php endforeach?>
    </table>
</body>
</html>