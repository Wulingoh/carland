<?php
include_once "config.php";


function fetchVehicleImages($vehicleId) {
    global $link;

    $stmt = $link->prepare('SELECT img_id, vehicle_id, gallery_img, gallery_img_title FROM vehicle_gallery WHERE vehicle_id = ?');

    $stmt->bind_param('i',$vehicleId);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    
}

function fetchModelList($makeId) {
    global $link;

    $stmt = $link->prepare('SELECT model_id, make_id, model FROM vehicle_model WHERE make_id = ?');

    $stmt->bind_param('i',$makeId);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    
}
?>