<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password=? WHERE username=?");
    $stmt->bind_param("ss", $newPassword, $username);
    
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "<script>alert('Password updated successfully.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Username not found.'); window.location='index.php';</script>";
    }
}
?>
