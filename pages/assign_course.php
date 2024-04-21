<?php
require_once '../layouts/config.php';
require_once '../course.php';

    // Récupération de l'ID de la course depuis l'URL
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }
    $courseId = $_GET['id'];

    $course = new Course($pdo); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $driverId = $_POST['driver_id'];

        $course->affecterChauffeur($courseId, $driverId);

        header('Location: ../index.php');
        exit;
    }

    $drivers = $course->listChauffeur(); 

    // echo '<pre>';
    //     print_r($drivers);
    //         ou  
    //     //  var_dump($drivers);
    //  echo '</pre>';

?>

<?php include '../layouts/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="mb-4 text-center">Affecter un chauffeur à une course en attente</h3>
            <form method="post">
                <div class="mb-3">
                    <label for="course_id" class="form-label">ID de la course :</label>
                    <input type="text" class="form-control" id="course_id" name="course_id" value="<?php echo $courseId; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="driver_id" class="form-label">Choisir un chauffeur :</label>
                    <select class="form-select" id="driver_id" name="driver_id" required>
                        <?php foreach ($drivers as $driver) : ?>
        
                            <option value="<?php echo $driver['chauffeur_id']; ?>"><?php echo $driver['nom'] . ' ' . $driver['prenoms']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Affecter le chauffeur</button>
            </form>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php'; ?>