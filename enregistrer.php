<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = trim($_POST["titre"]);
    $date = $_POST["dat_sortie"];

    if (empty($titre) || empty($date)) {
    header("Location: ajouter.php?erreur=Tous les champs sont obligatoires");
    exit();
}


    $stmt = $conn->prepare("INSERT INTO livre (titre, dat_sortie) VALUES (?, ?)");
    if ($stmt->execute([$titre, $date])) {
        header("Location: index.php?message=Livre ajouté avec succès !");
        exit();
    } else {
        echo "<div class='echou'>Erreur lors de l'enregistrement.</div>";
    }
}
?>
