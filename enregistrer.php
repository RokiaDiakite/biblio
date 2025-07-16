<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST["titre"];
    $date = $_POST["dat_sortie"];

    $stmt = $conn->prepare("INSERT INTO livre (titre, dat_sortie) VALUES (?, ?)");
    if ($stmt->execute([$titre, $date])) {
        header("Location: index.php?message=Livre ajouté avec succès !");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement.";
    }
}


?>
