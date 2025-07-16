<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $titre = trim($_POST["titre"]);
    $date = $_POST["dat_sortie"];

    // Vérifier les champs vides
    if (empty($titre) || empty($date)) {
        header("Location: modifier.php?id=$id&erreur=Tous les champs sont obligatoires");
        exit();
    }

    // 🔍 Récupérer les anciennes valeurs depuis la base
    $stmt = $conn->prepare("SELECT titre, dat_sortie FROM livre WHERE id = ?");
    $stmt->execute([$id]);
    $ancien = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$ancien) {
        header("Location: index.php?erreur=Livre introuvable !");
        exit();
    }

    // ✅ Vérifier si quelque chose a changé
    if ($titre === $ancien['titre'] && $date === $ancien['dat_sortie']) {
        header("Location: modifier.php?id=$id&erreur=Aucun changement détecté. Modifiez au moins un champ.");
        exit();
    }

    // ✅ Mettre à jour
    $stmt = $conn->prepare("UPDATE livre SET titre = ?, dat_sortie = ? WHERE id = ?");
    if ($stmt->execute([$titre, $date, $id])) {
        header("Location: index.php?message=Livre modifié avec succès !");
        exit();
    } else {
        header("Location: modifier.php?id=$id&erreur=Erreur lors de la mise à jour");
        exit();
    }
}
?>
