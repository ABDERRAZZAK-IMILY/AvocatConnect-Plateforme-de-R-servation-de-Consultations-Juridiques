<?php

include 'db_connect.php';

$lawyer_id = $_GET['avocat_id'];

$query = "SELECT available_date AS start, 'Disponible' AS title FROM available_dates WHERE avocat_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $lawyer_id);
$stmt->execute();
$result = $stmt->get_result();

$dates = [];
while ($row = $result->fetch_assoc()) {
    $dates[] = $row;
}

echo json_encode($dates);
?>