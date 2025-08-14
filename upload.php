<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user_id'])) { header("Location: index.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
        <div>
            <a href="view.php" class="btn btn-info btn-sm">My Images</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="">
                <div class="mb-3">
                    <label class="form-label">Select Images</label>
                    <input type="file" name="images[]" multiple class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Upload</button>
            </form>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['images'])) {
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $fileName = $_FILES['images']['name'][$key];
        $targetDir = "uploads/";
        $targetFile = $targetDir . time() . "_" . basename($fileName);

        if (move_uploaded_file($tmp_name, $targetFile)) {
            $stmt = $conn->prepare("INSERT INTO images (user_id, file_path) VALUES (?, ?)");
            $stmt->bind_param("is", $_SESSION['user_id'], $targetFile);
            $stmt->execute();
        }
    }
    echo "<script>window.location.href='view.php';</script>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
