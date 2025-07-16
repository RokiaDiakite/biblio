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
            <form action="enregistrer.php" method="post">
                <label for="">TITRE</label>
                <input type="text" name="titre" placeholder="titre du livre">
                <label for="">DATE SORTIE</label>
                <input type="date" name="dat_sortie" placeholder="Entrez la date de sortie">
                <input type="submit" name="enregistrer" value="enregistrer">
            </form>
        </div>
    </body>
</html>