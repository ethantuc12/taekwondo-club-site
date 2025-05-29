<?php
// DB config
$host = 'localhost';
$dbname = 'taekwondo';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    $error = "Erreur de connexion à la base de données.";
}

// Process only if no DB error
if (!isset($error)) {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $date = date('Y-m-d H:i:s');
    $imagePath = '';

    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $imageName = basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = $targetPath;
        } else {
            $error = "Échec du téléversement de l’image.";
        }
    }

    if (!isset($error)) {
        $stmt = $pdo->prepare("INSERT INTO news (title, content, image, date_created) VALUES (?, ?, ?, ?)");
        $success = $stmt->execute([$title, $content, $imagePath, $date]);
        if (!$success) $error = "Erreur lors de l'insertion dans la base de données.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Résultat</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="result-box">
    <?php if (isset($error)): ?>
      <div class="cross">✖</div>
      <div class="message"><?= htmlspecialchars($error) ?><br>Veuillez réessayer.</div>
    <?php else: ?>
      <div class="check">✔</div>
      <div class="message">Actualité ajoutée avec succès !</div>
    <?php endif; ?>
    <a href="admin_actu.php">← Retour</a>
  </div>
</body>
</html>
