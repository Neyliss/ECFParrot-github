<?php
// log.php
// Démarrer la session
session_start();

// Remplacez les informations ci-dessous par les informations de votre base de données PostgreSQL
$host = 'localhost';
$dbname = 'GarageParrot';
$username = 'postgres';
$password = 'postgres';

try {
    // Connexion à la base de données PostgreSQL en utilisant PDO
    $pdo = new PDO("pgsql:host=$host;port=8889;dbname=$dbname", $username, $password);

    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier les informations d'identification de l'utilisateur
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // Vous pouvez utiliser des requêtes préparées pour éviter les injections SQL
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Informations d'identification correctes, utilisateur connecté avec succès
                // Vous pouvez maintenant rediriger l'utilisateur vers la page appropriée, afficher un message de succès, etc.
                // Par exemple, vous pouvez rediriger l'utilisateur vers la page d'accueil :
                header('Location: /Page accueil /Acceuil.html');
                exit();
            } else {
                // Informations d'identification incorrectes, afficher un message d'erreur, par exemple :
                echo "Adresse e-mail ou mot de passe incorrect.";
            }
        }
    }
} catch (PDOException $e) {
    // En cas d'erreur de connexion à la base de données, afficher l'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Détruire la session à la déconnexion
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /Log/Log.html');
    exit();
}
?>


