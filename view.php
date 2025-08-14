<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user_id'])) { header("Location: index.php"); exit(); }

$result = $conn->prepare("SELECT * FROM images WHERE user_id=? ORDER BY uploaded_at DESC");
$result->bind_param("i", $_SESSION['user_id']);
$result->execute();
$res = $result->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between mb-4">
        <h3>My Uploaded Images</h3>
        <div>
            <a href="upload.php" class="btn btn-success btn-sm">Upload More</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>

    <div class="row g-3">
        <?php while ($row = $res->fetch_assoc()): ?>
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm">
                    <img src="<?php echo $row['file_path']; ?>" 
                         class="card-img-top img-thumbnail" 
                         style="width:100%; height:200px; object-fit:contain; background:#f8f9fa; cursor:pointer;"
                         data-bs-toggle="modal" 
                         data-bs-target="#imageModal" 
                         data-bs-img="<?php echo $row['file_path']; ?>">

                    <div class="card-body text-center">
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content bg-dark">
      <div class="modal-body text-center p-0">
        <img src="" id="modalImage" class="img-fluid" style="max-height:90vh; object-fit:contain;">
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Change modal image dynamically
const imageModal = document.getElementById('imageModal');
imageModal.addEventListener('show.bs.modal', function (event) {
    const triggerImg = event.relatedTarget;
    const imgSrc = triggerImg.getAttribute('data-bs-img');
    document.getElementById('modalImage').src = imgSrc;
});
</script>
</body>
</html>
