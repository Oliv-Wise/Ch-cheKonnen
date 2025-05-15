<?php
require 'db.php';
session_start();

$file = 'assets/audio/' . basename($_GET['id']);
if(!file_exists($file)) {
  http_response_code(404);
  exit('Podcast non trouvé');
}

if(isset($_SESSION['user_id'])) {
// save the recording
  $stmt = $pdo->prepare("INSERT INTO listens (user_id, podcast_file) VALUES (?,?)");
  $stmt->execute([$_SESSION['user_id'], basename($file)]);
  $canListen = true;
} else {
  $canListen = false;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
  <h2><?= htmlspecialchars(pathinfo($file, PATHINFO_FILENAME)) ?></h2>
  <?php if($canListen): ?>
    <audio controls src="<?= htmlspecialchars($file) ?>"></audio>
  <?php else: ?>
    <p>Pour écouter ce podcast, <a href="login.php">connectez‑vous</a> ou <a href="register.php">inscrivez‑vous</a>.</p>
  <?php endif; ?>
  <p><a href="podcasts.php">← Retour au catalogue</a></p>
</div>
</body>
</html>
