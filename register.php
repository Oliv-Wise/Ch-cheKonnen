<?php include 'db.php';
if(
  isset($_POST['email'], $_POST['password'], $_POST['role'])
){
  $email = $_POST['email'];
  $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role']; 
  $stmt = $pdo->prepare('INSERT INTO users(email, password, role) VALUES(?,?,?)');
  $stmt->execute([$email, $passHash, $role]);
  echo '<p>Inscription réussie!</p>';
}
?>
<!DOCTYPE html><html><head><link rel="stylesheet" href="style.css"></head><body>
<div class="container">
  <h2>Inscription</h2>
  <form method="post">
    <label>Email: <input type="email" name="email" required></label>
    <label>Mot de passe: <input type="password" name="password" required></label>
    <label>Je souhaite m'inscrire en tant que:
      <select name="role">
        <option value="member">Membre</option>
        <option value="donor">Donateur</option>
      </select>
    </label>
    <button type="submit">S'inscrire</button>
  </form>
</div></body></html>
