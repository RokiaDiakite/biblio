<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajouter un livre</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <div class="contenue">
                <a class="lien" href="index.php">Cliquer pour voir la liste de tous livres</a>
                <h1>AJOUT D'UN LIVRE DANS LA BASE</h1>
                <?php if (isset($_GET['erreur'])): ?>
                    <div class="echou">
                        <?= htmlspecialchars($_GET['erreur']) ?>
                    </div>
                <?php endif; ?>

            <form action="enregistrer.php" method="post">
                <label for="">TITRE</label>
                <input type="text" name="titre" placeholder="Titre du livre" required>
                <label for="">DATE SORTIE</label>
                <input type="date" name="dat_sortie" required>
                <input type="submit" name="enregistrer" value="enregistrer">
            </form>
        </div>
    </body>
</html>