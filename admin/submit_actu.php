<?php
// Get the posted data
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i");

// Handle image upload
$imagePath = "";
if (!empty($_FILES['image']['name'])) {
    $targetDir = "uploads/";
    $imagePath = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
}

// Load existing posts
$filename = 'actu.json';
$posts = file_exists($filename) ? json_decode(file_get_contents($filename), true) : [];

// Add new post
$posts[] = [
    'title' => $title,
    'content' => $content,
    'image' => $imagePath,
    'date' => $date
];

// Save updated list
file_put_contents($filename, json_encode($posts, JSON_PRETTY_PRINT));

echo "Actualité ajoutée avec succès ! <a href='admin_actu.php'>Retour</a>";
?>
