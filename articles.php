<?php
// articles.php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nos articles</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="header-container">
      <img src="images/logo.jpeg" alt="Logo" class="logo">
      <h1>ChècheKonnen</h1>
    </div>
    <?php include 'nav.php'; ?>
  </header>

  <div class="container">
    <h2>Nos articles</h2>

    <!-- Exemple d'article -->
    <article class="article-card">
      <h3>Titre de l’article</h3>
      <p><em>Publié par Hans Durosier</em></p>
      <p>Voici un petit aperçu de l’article ...</p>
      <a href="article_detail.php?id=1" class="read-more">Lire la suite</a>
    </article>

    <!-- Tu pourras ensuite boucler dynamiquement ici avec PHP -->

  </div>

  <footer>
    <p>&copy; 2025 ChècheKonnen</p>
  </footer>
</body>
</html>
