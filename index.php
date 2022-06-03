<?php
//Initialisation de la sesion
session_start();
//Vérification de l'existence d'une variable de session
 if(isset($_SESSION['message'])) {
     //Définition d'une variable temporaire, ou son contenu est égal à la variable de session
    $message = $_SESSION['message'];
    //Suppression du contenu de la variable de session
    $_SESSION['message'] = "";
 }
 else {
     //Initialisation d'une variable temporaire
    $message = "";
    //Initialisation d'une variable de session
    $_SESSION['message'] = "";
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>MyShrt</title>
        <meta content="MyShrt" property="og:title">
        <meta content="Raccourcisseur d'URL fait par Straky" property="og:description">
        <meta content="http://myshrt.tk" property="og:url">
        <meta content="http://myshrt.tk/favicon.png" property="og:image">
        <meta content="#414141" data-react-helmet="true" name="theme-color">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" type="image/png" href="favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </heaed>

    <body>
        <center>
            <h1>MyShrt 🔗</h1>
            <h3>Par <a href="https://github.com/Str4ky" target="_blank" style="color: white;">Straky</a> | <a href="https://github.com/Str4ky/url-shortener" target="_blank" style="color: white;">Code source</a></h3>
                <br><br><br><br>
            <form method="post" action="create.php">
                <h3>Lien original :</h3>
                    <!-- Zone d'entrée de texte pour le lien original -->
                    <input type="text" name="url" id="url" placeholder="Entrez le lien original" class="text" required />
                <br><br>
                <h3>URL personnalisée (optionnel) :</h3>
                    <!-- Zone d'entrée optionnelle de texte pour une url customisée -->
                    <input type="text" name="custom" id="custom" placeholder="Entrez une URL personnalisée" class="text" />
                <br><br>
                    <!-- Bouton de génération -->
                    <button type="submit" class="button">🔗 Générer votre lien</button>
            </form>
            <br><br>
            <?php
            //Affichage d'un message d'alerte
            echo $message;
            ?>
        </center>
    </body>

</html>
