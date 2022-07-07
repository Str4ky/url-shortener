<?php
//Démarrage de la session
session_start();
//Si une variable de session n'existe pas
if (!isset($_SESSION['message_edit']))
{
    //Remettre une variable de session et temporaire à rien
    $_SESSION['message_edit'] = '';
    $message_edit = '';
}
else
{
    //Mettre une temporaire à une variable de session et remettre la variable de session à rien
    $message_edit = $_SESSION['message_edit'];
    $_SESSION['message_edit'] = '';
}
//Si une variable de session n'existe pas
if (!isset($_SESSION['message_delete']))
{
    //Remettre une variable de session et temporaire à rien
    $_SESSION['message_delete'] = '';
    $message_delete = '';
}
else
{
    //Mettre une temporaire à une variable de session et remettre la variable de session à rien
    $message_delete = $_SESSION['message_delete'];
    $_SESSION['message_delete'] = '';
}
//Déclaration d"une variable du nom de l'hôte
$host = $_SERVER['REMOTE_ADDR'];
//Décodage d'une valeur en base64 pôur la vérification de l'hôte
$verif = votre_ip;
//Si le nom d'hôte est égal à celui du développeur
if ($host != $verif) {
    //Retour à la page d'accueil
    header('Location: index.php');
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
        <meta content="http://myshrt.tk/logo.png" property="og:image">
        <meta content="#9b9b9b" data-react-helmet="true" name="theme-color">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" type="image/png" href="favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </heaed>

    <body>
        <center>
            <h1>🔧 Administration</h1>
            <br><br>
            <h2>Voir une redirection</h2>
            <br>
            <h4>Dossier de la redirection</h4>
            <form action="view.php" method="post" target="_blank">
                <select name="url" id="url" class="text" required>
            <?php
                //Déclaration d'une variable de dossier
                $folder = getcwd();
                //Déclaration d'une variable de scan du dossier
                $scan = scandir($folder);
                //Parcours du dossier
                foreach($scan as $file) {
                    //Si il y a des dossiers
                    if (is_dir("$folder/$file")) {
                        //Affichage des dossiers dans un dropdown
                        echo "<option value='".$file."'>".$file."</option>";
                    }
                }
            ?>
            </select>
            <br><br>
            <button type="submit" class="button blue">Voir la redirection</button>
            </form>
            <br><br>
            <h2>Modifier l'url d'une redirection</h2>
            <br>
            <h4>Dossier de la redirection</h4>
            <form action="edit.php" method="post">
                <select name="url" id="url" class="text" required>
            <?php
                //Déclaration d'une variable de dossier
                $folder = getcwd();
                //Déclaration d'une variable de scan du dossier
                $scan = scandir($folder);
                //Parcours du dossier
                foreach($scan as $file) {
                    //Si il y a des dossiers
                    if (is_dir("$folder/$file")) {
                        //Affichage des dossiers dans un dropdown
                        echo "<option value='".$file."'>".$file."</option>";
                    }
                }
            ?>
            </select>
            <h4>URL de la redirection</h4>
            <input type="text" name="new" id="new" class="text" placeholder="Entrez une redirection" required/>
            <br>
            <?php
                //Écrire un message d'alerte
                echo $message_edit;
            ?>
            <br>
            <button type="submit" class="button blue">Modifier la redirection</button>
            </form>
            <br><br>
            <h2>Supprimer une redirection</h2>
            <br>
            <h4>Dossier de la redirection</h4>
            <form action="delete.php" method="post">
                <select name="url" id="url" class="text" required>
            <?php
                //Déclaration d'une variable de dossier
                $folder = getcwd();
                //Déclaration d'une variable de scan du dossier
                $scan = scandir($folder);
                //Parcours du dossier
                foreach($scan as $file) {
                    //Si il y a des dossiers
                    if (is_dir("$folder/$file")) {
                        //Affichage des dossiers dans un dropdown
                        echo "<option value='".$file."'>".$file."</option>";
                    }
                }
            ?>
            </select>
            <br>
            <?php
                //Écrire un message d'alerte
                echo $message_delete;
            ?>
            <br>
            <button type="submit" class="button red">Supprimer la redirection</button>
            </form>
            <br><br><br>
            <a href='index.php' class='button blue' style='text-decoration: none;'>Retour à la page d'accueil</a>
            <br><br><br><br><br><br>
        </center>
    </body>

</html>
