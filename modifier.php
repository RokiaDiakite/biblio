<?php
require_once("db.php");

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM livre WHERE id = ?");
$stmt->execute([$id]);
$livre = $stmt->fetch();

if (!$livre) {
    echo "Livre introuvable.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un livre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenue">
        <a class="lien" href="index.php"> Retour à la liste de tous les livres</a>
        <h1>Modifier un livre</h1>
        <form action="miseajour.php?id=<?= $livre['id'] ?>" method="post">
            <input type="text" name="titre" placeholder="Titre du livre" value="<?= htmlspecialchars($livre['titre']) ?>" required>
            <input type="date" name="dat_sortie" value="<?= $livre['dat_sortie'] ?>" required>
            <input type="submit" value="Mettre à jour">
        </form>
    </div>
</body>
</html>
