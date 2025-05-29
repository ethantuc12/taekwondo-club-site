<!-- admin_actu.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Actualités</title>
</head>
<body>
  <h1>Ajouter une actualité</h1>
  <form action="submit_actu.php" method="post" enctype="multipart/form-data">
    <label>Titre:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Contenu:</label><br>
    <textarea name="content" rows="5" cols="50" required></textarea><br><br>

    <label>Image (optionnel):</label><br>
    <input type="file" name="image"><br><br>

    <input type="submit" value="Publier">
  </form>
</body>
</html>
