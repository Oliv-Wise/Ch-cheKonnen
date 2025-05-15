<?php
session_start();
require 'db.php';
$message = '';
if (isset($_POST['email'], $_POST['password'], $_POST['role'])) {
    $email = $_POST['email'];
    $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $stmt = $pdo->prepare('INSERT INTO users(email, password, role) VALUES(?,?,?)');
    if ($stmt->execute([$email, $passHash, $role])) {
        $message = '<p>Inscription réussie ! <a href="login.php">Cliquez ici pour vous connecter</a> et accéder aux contenus.</p>';
    } else {
        $message = '<p>Une erreur est survenue. Veuillez réessayer.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription - Chèche Konnen</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <div class="header-container">
    <img src="images/logo.jpeg" alt="Logo Chèche Konnen" class="logo">
    <h1>Chèche Konnen</h1>
  </div>
  <nav>
    <a href="index.php">Accueil</a>
    <a href="login.php">Connexion</a>
    <a href="register.php" class="active">S'inscrire</a>
    <a href="donate.php">Faire un don</a>
    <a href="podcasts.php">Catalogue</a>
  </nav>
</header>

<div class="container">
  <h2>Inscription</h2>
  <?= $message ?>
  <form method="post" class="form-box">
    <label>Email:
      <input type="email" name="email" placeholder="votre email" required>
    </label>
    <label>Mot de passe:
      <input type="password" name="password" placeholder="votre mot de passe" required>
    </label>
    <button type="submit">S'inscrire</button>
  </form>
</div>
<footer>&copy; 2025 Chèche Konnen</footer>
</body>
</html></html>
