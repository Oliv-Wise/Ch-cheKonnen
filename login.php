<?php
require 'db.php';
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Identifiants invalides.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - Chèche Konnen</title>
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
    <a href="register.php">S'inscrire</a>
    <a href="login.php" class="active">Connexion</a>
    <a href="podcasts.php">Catalogue</a>
  </nav>
</header>
<div class="container">
  <h2>Connexion</h2>
  <?php if ($error): ?>
    <p style="color:red; text-align:center;"> <?= htmlspecialchars($error) ?> </p>
  <?php endif; ?>
  <form method="post" class="form-box">
    <label>Email:
      <input type="email" name="email" placeholder="votre email" required>
    </label>
    <label>Mot de passe:
      <input type="password" name="password" placeholder="votre mot de passe" required>
    </label>
    <button type="submit">Se connecter</button>
  </form>
</div>
<footer>&copy; 2025 Chèche Konnen</footer>
</body>
</html>
