<?php
require_once '../layouts/config.php';
require_once '../course.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$courseId = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newStatus = $_POST['new_status'];

    $course = new Course($pdo);

    $course->mettreAJourStatut($courseId, $newStatus);

    header('Location: ../index.php');
    exit;
}
?>

<?php include '../layouts/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Mettre à jour le statut d'une course avec l'id = <?php echo $courseId; ?> </h1>
            <form method="post">
                <div class="mb-3">
                    <label for="new_status" class="form-label">Nouveau statut :</label>
                    <select class="form-select" id="new_status" name="new_status" required>
                        <option value="en_cours">En cours</option>
                        <option value="terminee">Terminée</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour le statut</button>
            </form>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php'; ?>