<?php
require_once("db.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM livre WHERE id = ?");
    if ($stmt->execute([$id])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de la suppression.";
    }
}
?>
