<!-- dashboard.php -->
<?php
require 'db.php';
session_start();
// Si non connecté, redirection vers login
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mon espace - Chèche Konnen</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <nav>
    <a href="index.php">Accueil</a>
    <a href="podcasts.php">Catalogue</a>
    <a href="logout.php">Déconnexion</a>
  </nav>
</header>
<div class="container">
  <h2>Mon espace personnel</h2>
  <p>Bienvenue dans votre espace personnel : vous pouvez consulter votre historique de lecture et vos recommandations ici.</p>
  <p>Cet espace vous permettra bientôt de découvrir des suggestions personnalisées.</p>
</div>
<footer>&copy; 2025 Chèche Konnen</footer>
</body>
</html>
