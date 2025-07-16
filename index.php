<?php
    $conn = new PDO("mysql:host=localhost;dbname=biblio","root","");
    $requet = "SELECT * FROM livre";
    $etat = $conn -> query($requet);
    $livres = $etat -> fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Ma bibliothèque</title>
        <link rel="icon" href="favicon.ico">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="contenue">
            <?php if (isset($_GET['message'])): ?>
            <div class="recu">
                <?= htmlspecialchars($_GET['message']) ?>
            </div>
            <?php endif; ?>

            <a  class="lien" href="ajouter.php">Cliquer pour ajouter un livre</a>
            <h1>LISTE DE TOUS LES LIVRES</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>TITRE</th>
                    <th>DATE DE SORTIE</th>
                    <th colspan=2>action</th>
                </tr>
                <?php foreach($livres as $livre){ ?>
                    <tr>
                    <td><?php echo $livre['id']; ?></td>
                    <td><?php echo $livre['titre']; ?></td>
                    <td><?php echo $livre['dat_sortie']; ?></td>
                    <td> <a class="btn btn-primary" href="modifier.php?id=<?php echo $livre['id']; ?>">Modifier</a></td>
                    <td> <a class="btn btn-danger" href="supprimer.php?id=<?php echo $livre['id']; ?>">Supprimer</a></td>

                    </tr>
                <?php }?>
            </table>
        </div>

    </body>
</html>