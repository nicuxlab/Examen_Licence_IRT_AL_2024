<?php

 
require_once '../layouts/config.php';
require_once '../course.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pointDepart = $_POST['point_depart'];
    $pointArrivee = $_POST['point_arrivee'];
    $dateHeure = $_POST['date_heure'];

    $course = new Course($pdo);

    $course->ajouterCourse($pointDepart, $pointArrivee, $dateHeure);

    header('Location: ../index.php');
    exit;
}
?>

<?php include '../layouts/header.php';  ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="mb-4 text-center">Ajouter une nouvelle course</h3>
                <form method="post">
                    <div class="mb-3">
                        <label for="point_depart" class="form-label">Point de départ :</label>
                        <input type="text" class="form-control" id="point_depart" name="point_depart" required>
                    </div>
                    <div class="mb-3">
                        <label for="point_arrivee" class="form-label">Point d'arrivée :</label>
                        <input type="text" class="form-control" id="point_arrivee" name="point_arrivee" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_heure" class="form-label">Date et heure prévues :</label>
                        <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter la course</button>
                </form>
            </div>
        </div>
    </div>


<?php include '../layouts/footer.php'; ?>