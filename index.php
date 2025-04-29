<?php
require 'db.php';
try {
    $stmt = $pdo->query('SELECT COUNT(*) FROM users');
    $count = $stmt->fetchColumn();
} catch (PDOException $e) {
    $count = 0;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chèche Konnen</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Chèche Konnen</h1>
  <nav>
    <a href="index.php">Accueil</a>
    <a href="register.php">S'inscrire</a>
    <a href="donate.php">Faire un don</a>
    <a href="podcasts.php">Podcasts</a>
  </nav>
</header>
<div class="container">
  <h2>Bienvenue à Chèche Konnen</h2>
  <p>Il y a actuellement <strong><?= htmlspecialchars($count) ?></strong> membres inscrits.</p>
  <p>ChècheKonnen est une plateforme en ligne fondée par un groupe de jeunes Haïtiens animés par la quête de connaissance et soucieux de l’avenir de leur pays.</p>
  <p>Dans cette dynamique, nous avons créé cet espace pour partager des articles, des podcasts et des vidéos autour de thématiques variées : spiritualité, philosophie, culture, et tout ce qui touche de près ou de loin au patrimoine haïtien.</p>
  <p>À ChècheKonnen, nous croyons fermement que la connaissance est la seule véritable voie vers la liberté et nous sommes convaincus que la culture haïtienne, forte de son histoire et de ses traditions, porte en elle les ressources nécessaires pour guider cette émancipation.</p>
  <p>Notre engagement s'inscrit dans l'héritage vivant de la révolution haïtienne et de sa première devise, « Liberté ou la mort », que nous réinterprétons aujourd'hui comme un appel à faire vivre l’âme d’Haïti et à y puiser les germes de la liberté.</p>
  <p>Notre plateforme se veut un véritable espace d’échange et de réflexion, ouvert à tous ceux qui souhaitent contribuer. N’hésitez pas à vous inscrire pour interagir avec nos contenus, et soutenir notre mission en réalisant des dons afin d’élargir notre impact.</p>
</div>
<footer>&copy; 2025 Chèche Konnen</footer>
</body>
</html>
