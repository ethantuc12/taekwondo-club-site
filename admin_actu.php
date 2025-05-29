<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Événements</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#your-textarea'))
        .catch(error => {
        console.error(error);
    });

    </script>
</head>
<body>
    <h2>Ajouter un Événement</h2>
    <form action="save_event.php" method="POST" enctype="multipart/form-data">
        <label>Image:</label>
        <input type="file" name="image" required><br>
        
        <label>Petit texte:</label>
        <input type="text" name="petit_txt" required><br>
        
        <label>Vidéo (URL):</label>
        <input type="text" name="video"><br>
        
        <label>Titre:</label>
        <input type="text" name="titre" required><br>
        
        <label>Petit titre:</label>
        <input type="text" name="petit_titre"><br>
        
        <label>Texte:</label>
        <textarea id="your-textarea" name="texte"></textarea><br>
        
        <button type="submit">Ajouter</button>
    </form>
    
    <h2>Liste des Événements</h2>
    <table border="1">
        <tr>
            <th>Image</th>
            <th>Petit Texte</th>
            <th>Vidéo</th>
            <th>Titre</th>
            <th>Petit Titre</th>
            <th>Texte</th>
            <th>Actions</th>
        </tr>
        <?php
        // Connexion à la base de données
        $conn = new mysqli('localhost', 'root', '', 'your_database');
        if ($conn->connect_error) die("Échec de la connexion: " . $conn->connect_error);
        
        $result = $conn->query("SELECT * FROM Evenements");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>"
                . "<td><img src='uploads/" . $row['image'] . "' width='50'></td>"
                . "<td>" . htmlspecialchars($row['petit_txt']) . "</td>"
                . "<td><a href='" . $row['video'] . "' target='_blank'>Vidéo</a></td>"
                . "<td>" . htmlspecialchars($row['titre']) . "</td>"
                . "<td>" . htmlspecialchars($row['petit_titre']) . "</td>"
                . "<td>" . $row['texte'] . "</td>"
                . "<td><a href='delete_event.php?id=" . $row['id_eve'] . "'>Supprimer</a></td>"
                . "</tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
