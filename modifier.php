<?php
require_once("db.php");
if (!isset($_GET['id'])) {
    die("ID non fourni !");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM livre WHERE id = ?");
$stmt->execute([$id]);
$livre = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livre) {
    die("Livre introuvable !");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier le livre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contennue">
        <a class="lien" href="index.php">Retour à la liste de tous les livres</a>
        <h1>Modifier le livre</h1>
        <form action="miseajour.php?id=<?= $id ?>" method="post">
            <label>Titre :</label>
            <input type="text" name="titre" value="<?= htmlspecialchars($livre['titre']) ?>" required><br>
            <label>Date de sortie :</label>
            <input type="date" name="dat_sortie" value="<?= $livre['dat_sortie'] ?>" required><br>
            <input type="submit" value="Mettre à jour">
        </form>
    </div>
</body>
</html>
