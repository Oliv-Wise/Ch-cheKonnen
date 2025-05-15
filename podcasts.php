<?php
require 'db.php';
session_start();
$files = glob('assets/audio/*.mp3');
?>
<!DOCTYPE html>
<html lang="fr">
<head><link rel="stylesheet" href="style.css"></head>
<body>
<header>
  <nav>
    <a href="index.php">Accueil</a>
    <a href="register.php">S'inscrire</a>
    <?php if(isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php">Mon espace</a>
      <a href="logout.php">Déconnexion</a>
    <?php else: ?>
      <a href="login.php">Connexion</a>
    <?php endif; ?>
  </nav>
</header>
<div class="container">
  <h2>Catalogue des podcasts</h2>
  <ul>
    <?php foreach($files as $file): 
       $id = urlencode(basename($file));
       $title = pathinfo($file, PATHINFO_FILENAME);
    ?>
      <li>
        <a href="podcast.php?id=<?= $id ?>">
          <?= htmlspecialchars($title) ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
</body>
</html>
