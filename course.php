<?php

require_once 'layouts/config.php';


class Course
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function listChauffeur()
    {
        $sql = "SELECT * FROM chauffeurs";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function ajouterCourse($pointDepart, $pointArrivee, $dateHeure)
    {
        $sql = "INSERT INTO courses (point_depart, point_arrivee, date_heure) VALUES (:point_depart, :point_arrivee, :date_heure)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['point_depart' => $pointDepart, 'point_arrivee' => $pointArrivee, 'date_heure' => $dateHeure]);
    }

    public function affecterChauffeur($courseId, $chauffeurId)
    {
        $sql = "UPDATE courses SET chauffeur_id = :chauffeur_id WHERE course_id = :course_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['chauffeur_id' => $chauffeurId, 'course_id' => $courseId]);
    }

    
    public function mettreAJourStatut($courseId, $newStatus)
    {
        $sql = "UPDATE courses SET statut = :new_status WHERE course_id = :course_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['new_status' => $newStatus, 'course_id' => $courseId]);
    }
}
