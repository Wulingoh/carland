<?php
include "config.php";

if(isset($_POST['carId'])) {
    if(isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
    } else {
        http_response_code(401);
        exit;
    }
    $carId = intval($_POST['carId']);

    $query = "SELECT * FROM favourite WHERE user_id = $userId AND car_id = $carId";
    
    $result = mysqli_query($link, $query);
    $rowCount = mysqli_num_rows($result);

    if($rowCount == 1) {
        $query = "DELETE FROM favourite WHERE user_id = $userId AND car_id = $carId";
        mysqli_query($link, $query);
        echo '0';
    } else {
        $query = "INSERT INTO favourite (user_id, car_id) VALUES ($userId, $carId)";
        mysqli_query($link, $query) or die(mysqli_error($link));
        echo '1';
    }
}
