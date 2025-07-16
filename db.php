<?php
$conn = new PDO("mysql:host=localhost;dbname=biblio","root","");
if($conn){
    //echo "connecter avec succès";
}else{
    echo "erreur connection";
}
?>