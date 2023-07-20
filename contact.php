<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs saisies dans le formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prénom"];
    $telephone = $_POST["téléphone"];
    $email = $_POST["email"];
    $commentaire = $_POST["Commentaire"];

    // Connexion à la base de données PostgreSQL
    // Remplacez les informations ci-dessous par les informations de votre base de données PostgreSQL
    $host = 'localhost';
    $dbname = 'GarageParrot';
    $username = 'postgres';
    $password = 'postgres';

    try {
        // Connexion à la base de données PostgreSQL en utilisant PDO
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

        // Utiliser les requêtes préparées pour insérer les données en toute sécurité
        $query = "INSERT INTO contacts (nom, prenom, telephone, email, commentaire) VALUES (:nom, :prenom, :telephone, :email, :commentaire)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':commentaire', $commentaire);

        // Exécuter la requête préparée
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: Could not execute the query.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>



