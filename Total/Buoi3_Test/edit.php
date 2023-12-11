<?php 
    require_once "connection.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $flight_number = $_POST['flight_number'];
        $total_passengers = $_POST['total_passengers'];
        $description = $_POST['description'];
        $airline_id = $_POST['airline_id'];
        $flight_id = $_GET['flight_id'];
        $file = $_FILES['image'];
        $image = $file['name'];
        move_uploaded_file($file['tmp_name'], "image/" . $image);
        $sql = "UPDATE `flights` SET `flight_id`='$flight_id',`flight_number`='$flight_number',`image`='$image',`total_passengers`='$total_passengers',`description`='$description',`airline_id`='$airline_id' WHERE flight_id = $flight_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
         // Đặt cookie
        $message = "Thêm dữ liệu thành công";
        setcookie("message", $message, time() + 1);

        header("location: index.php");
        die;

    }

    $sql = "SELECT `airline_id`, `airline_name` FROM `airlines` ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $airlines = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        flight_number: <input type="text" name="flight_number" id=""><br>
        image: <input type="file" name="image" id=""><br>
        total_passengers: <input type="number" min="0" name="total_passengers" id=""><br>
        description: <textarea name="description" id="" cols="30" rows="10"></textarea><br>
        airline_name: 
        <select name="airline_id" id="">
            <?php foreach ($airlines as $value) : ?>
                <option value="<?php echo $value['airline_id'] ?>">
                    <?= $value['airline_name'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <button type="submit">Submit</button>
        <button type="button"><a href="index.php">LIST</a></button>
    </form>
</body>
</html>