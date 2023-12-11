<?php 
    require_once "connection.php";

    $sql = "SELECT `flight_id`, `flight_number`, `image`, `total_passengers`, `description`,  `airline_name` 
    FROM `flights` f
    JOIN airlines a on  f.airline_id = a.airline_id";
    $stmt = $conn -> prepare($sql);
    $stmt->execute();
    $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>flight_id</th>
            <th>flight_number</th>
            <th>image</th>
            <th>total_passengers</th>
            <th>description</th>
            <th>airline_name</th>
            <th><button><a href="add.php">ADD</a></button></th>
        </tr>
        <?php foreach($flights as $value): ?>
            <tr>
                <td><?= $value['flight_id']?></td>
                <td><?= $value['flight_number']?></td>
                <td>
                    <img src="image/<?= $value['image']?>" width="100" alt="">
                </td>
                <td><?= $value['total_passengers']?></td>
                <td><?= $value['description']?></td>
                <td><?= $value['airline_name']?></td>
                <td>
                    <button><a href="edit.php?flight_id=<?= $value['flight_id']?>">EDIT</a></button>
                    <button><a onclick="return confirm('Bạn muốn xóa nó sao?');" href="delete.php?flight_id=<?= $value['flight_id']?>">DELETE</a></button>
                </td>
            </tr>
        <?php endforeach?>
    </table>
</body>
</html>