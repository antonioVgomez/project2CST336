<?php
    include 'dbconn.php';
    $conn = getDatabaseConnection();
    
    $sql = "DELETE FROM athlete
    WHERE id = " . $_GET['userId'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: adminOnly.php");
?>