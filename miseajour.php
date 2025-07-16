<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $titre = $_POST["titre"];
    $date = $_POST["dat_sortie"];

    $stmt = $conn->prepare("UPDATE livre SET titre = ?, dat_sortie = ? WHERE id = ?");
    if ($stmt->execute([$titre, $date, $id])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}
?>
