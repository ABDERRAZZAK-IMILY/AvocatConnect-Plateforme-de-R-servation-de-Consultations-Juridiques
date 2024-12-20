<?php

include 'db_connect.php';



    
    $stmt = $conn->prepare("
        SELECT COUNT(*) 
        FROM reservations 
        WHERE avocat_id = ? 
        AND date = ? 
        AND time = ?
    ");
    $stmt->execute([$data['avocat_id'], $data['date'], $data['time']]);
    
    if ($stmt->fetchColumn() > 0) {
       echo 'not exetset';
        exit;
    }
    
    $stmt = $conn->prepare("
        INSERT INTO reservations (avocat_id, client_id, date)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->execute([
        $data['avocat_id'],
        $_SESSION['user_id'],
        $data['date']
    ]);
    
    echo json_encode(['success' => true]);

?>