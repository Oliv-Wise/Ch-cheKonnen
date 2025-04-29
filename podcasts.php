<!DOCTYPE html><html><head><link rel="stylesheet" href="style.css"></head><body>
<?php include 'db.php'; ?>
<div class="container">
  <h2>Nos Podcasts</h2>
  <?php
    $files = glob('assets/audio/*.mp3');
    foreach($files as $file){
      $title = basename($file);
      echo "<div><h3>".htmlspecialchars($title)."</h3>";
      echo "<audio controls src='".htmlspecialchars($file)."'></audio></div>";
    }
  ?>