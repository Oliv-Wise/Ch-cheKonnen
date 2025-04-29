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
<!DOCTYPE html><html><head><link rel="stylesheet" href="style.css"></head><body>
<div class="container">
  <h2>Faire un don</h2>
  <form method="post">
    <label>Montant (€): <input type="number" name="amount" step="0.01" required></label>
    <button type="submit">Donner</button>
  </form>
</div></body></html>
