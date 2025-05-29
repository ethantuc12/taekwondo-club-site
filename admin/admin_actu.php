<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter une actualité</title>
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://cdn.tiny.cloud/1/pquumyqmqaewi8bdct5ogbgub2kv00j1jq662wikzn2095sq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#content',
      plugins: 'image link lists code',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
      language: 'fr'
    });
  </script>
</head>
<body>
  <div class="admin-container">
    <h1>Ajouter une Actualité</h1>
    <form action="submit_actu.php" method="post" enctype="multipart/form-data">
      <label for="title">Titre :</label>
      <input type="text" name="title" id="title" required>

      <label for="content">Contenu :</label>
      <textarea id="content" name="content" rows="10"></textarea>

      <label for="image">Image d'aperçu :</label>
      <input type="file" name="image" id="image">

      <input type="submit" value="Publier">
    </form>
  </div>
</body>
</html>
