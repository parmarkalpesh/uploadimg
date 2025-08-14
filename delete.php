<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT file_path FROM images WHERE id=? AND user_id=?");
$stmt->bind_param("ii", $id, $_SESSION['user_id']);
$stmt->execute();
$res = $stmt->get_result();

if ($row = $res->fetch_assoc()) {
    unlink($row['file_path']);
    $del = $conn->prepare("DELETE FROM images WHERE id=?");
    $del->bind_param("i", $id);
    $del->execute();
}

header("Location: view.php");
?>
