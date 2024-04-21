<?php 

include 'layouts/header.php'; 
require_once 'layouts/config.php';


// Requête pourr la récupération de la liste des courses avec les informations sur le chauffeur
    $sql = "SELECT c.course_id, c.point_depart, c.point_arrivee, c.date_heure, c.statut, ch.nom as chauffeur_nom, ch.prenoms as chauffeur_prenoms
                FROM courses c
                LEFT JOIN chauffeurs ch ON c.chauffeur_id = ch.chauffeur_id";
    $stmt = $pdo->query($sql);
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<main class="container-fluid">
    <div class="bg-light p-5 rounded mt-3">

        <h1 class="text-center display-6 fst-italic">Examen national de <b>Licence 2024 option: AL</b> <br><br> Bienvenue sur l'application de gestion des courses</h1>

        <div class="mt-5">
            <div class="d-flex justify-content-between">
                <h3>Liste des courses</h3>
                <a class="btn btn-xs btn-primary" href="pages/add_course.php">
                    Ajouter une nouvelle course
                </a>
            </div>

            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Point de départ</th>
                        <th scope="col">Point d'arrivée</th>
                        <th scope="col">Date et heure</th>
                        <th scope="col">Chauffeur affecté</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course) : ?>
                        <tr>
                            <th scope="row"><?php echo $course['course_id']; ?></th>
                            <td><?php echo $course['point_depart']; ?></td>
                            <td><?php echo $course['point_arrivee']; ?></td>
                            <td><?php echo $course['date_heure']; ?></td>
                            <td>
                                <?php echo !empty($course['chauffeur_nom']) ? $course['chauffeur_nom'] . ' ' . $course['chauffeur_prenoms'] : 'Aucun'; ?>
                            </td>
                            <td>
                                <?php
                                $statut = $course['statut'];
                                $classeBouton = ($statut == 'terminee') ? 'btn-success' : 'btn-danger';
                                ?>
                                <a class="btn btn-sm <?php echo $classeBouton; ?> text-white" href="assign_course.php?id=<?php echo $course['course_id']; ?>" role="button">
                                    <?php echo $statut; ?>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info text-white" href="pages/assign_course.php?id=<?php echo $course['course_id']; ?>" role="button">
                                    Affecter un chauffeur
                                </a>
                                <a class="btn btn-sm btn-warning text-white" href="pages/update_course.php?id=<?php echo $course['course_id']; ?>" role="button">
                                    Modifier le statut
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</main>

<?php include 'layouts/footer.php'; ?>