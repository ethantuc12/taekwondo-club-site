<?php
$pdo = new PDO('mysql:host=localhost;dbname=taekwondo;charset=utf8', 'root', '');
$actualites = $pdo->query("SELECT * FROM actualites ORDER BY date_publication DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Actualités - AUC Taekwondo</title>
  <link rel="stylesheet" href="css/styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header class="text-center">
  <a href="index.html"><img src="assets/img/logo.png" alt="Logo" style="max-width: 300px;" class="mt-3 mb-3"></a>
</header>

<section class="page-section">
  <div class="container">
    <h2 class="section-heading text-center mb-5">
      <span class="section-heading-upper">Nos</span>
      <span class="section-heading-lower">Actualités</span>
    </h2>

    <div class="row d-flex justify-content-center flex-wrap">
      <?php foreach ($actualites as $index => $actu): ?>
        <div class="actu-block">
          <div class="actu-image-wrapper">
            <img src="uploads/<?= htmlspecialchars($actu['image']) ?>" alt="<?= htmlspecialchars($actu['titre']) ?>">
            <div class="overlay">
              <a href="actualite_spec.php?id=<?= $actu['id'] ?>" class="bn<?= 5 + ($index % 3) ?>">Voir</a>
            </div>
          </div>
          <h5 class="mt-3"><?= htmlspecialchars($actu['titre']) ?></h5>
          <p class="small"><?= substr(strip_tags($actu['contenu']), 0, 80) ?>...</p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<footer class="footer text-faded text-center py-5">
  <div class="container">
    <p class="m-0 small">© AUC Taekwondo 2025</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
