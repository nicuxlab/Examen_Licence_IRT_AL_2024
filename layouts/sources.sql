CREATE TABLE IF NOT EXISTS courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    point_depart VARCHAR(255) NOT NULL,
    point_arrivee VARCHAR(255) NOT NULL,
    date_heure DATETIME NOT NULL,
    chauffeur_id INT NOT NULL,
    statut VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS chauffeurs (
    chauffeur_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenoms VARCHAR(255) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    sexe VARCHAR(10) NOT NULL,
    disponible BOOLEAN NOT NULL DEFAULT true
);
