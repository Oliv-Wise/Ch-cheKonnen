<?php include 'db.php';
session_start();
// assume user logged in, user ID in $_SESSION['user_id']
if(isset($_POST['amount'])){
  $uid = $_SESSION['user_id'];
  $amt = (float)$_POST['amount'];
  $stmt = $pdo->prepare('INSERT INTO donations(user_id, amount, date) VALUES(?,?,NOW())');
  $stmt->execute([$uid, $amt]);
  echo '<p>Merci pour votre don de ' . htmlspecialchars($amt) . ' €!</p>';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Faire un don - Chèche Konnen</title>
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
    <?php if(isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php">Mon espace</a>
      <a href="logout.php">Déconnexion</a>
    <?php else: ?>
      <a href="login.php">Connexion</a>
      <a href="register.php">S'inscrire</a>
    <?php endif; ?>
    <a href="donate.php" class="active">Faire un don</a>
  </nav>
</header>
