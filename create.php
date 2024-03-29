<?php
//Initialisation de la sesion
session_start();
//Définition et encodage du lien entrée sur l'interface, dans une variable temporaire
$link = htmlentities($_POST['url'], ENT_QUOTES, 'UTF-8');

//Si on a entré une url customisée
if($_POST['custom'] != null) {
    //Définition de l'url customisée entrée sur l'interface, dans une variable temporaire
    $folder = $_POST['custom'];

    //Si le dossier (url du site) n'existe pas
    if(!is_dir($folder)) {
        //Création du dossier (url du site)
        mkdir($folder);
        //Définition du fichier pour la redirection puis le créer
        $file = $folder."/index.php";
        touch($file);
        //Rajout dans le fichier index, le code de la redirection
        file_put_contents($file, "<?php\nheader('Location: ".$link."')\n?>')");
        //Définition de l'url de la page dans une variable
        $generate = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/" . $folder;
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "Votre lien généré est : <a href='".$generate."' target='_blank'>".$generate;
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
    //Si le dossier (url du site) existe
    else {
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "L'URL a déjà été attribuée à un lien";
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
}
//Si on a pas entré d'url customisée
else {
    //Définition d'une fonction
    start:
    //Définition d'une longeur aléatoire de caractères entre 4 et 8 dans une variable temporaire
    $length = rand(5, 9);
    //Définition d'un texte aléatoire (url du site), dans une variable temporaire
    $folder = bin2hex(random_bytes(($length-($length%2))/2));

    //Si le dossier (url du site) n'existe pas
    if(!is_dir($folder)) {
        //Création du dossier (url du site)
        mkdir($folder);
        //Définition du fichier pour la redirection puis le créer
        $file = $folder."/index.php";
        touch($file);
        //Rajout dans le fichier index, le code de la redirection
        file_put_contents($file, "<?php\nheader('Location: ".$link."')\n?>')");
        //Définition de l'url de la page dans une variable
        $generate = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/" . $folder;
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "Votre lien généré est : <a href='".$generate."' target='_blank'>".$generate;
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
    //Si le dossier (url du site) existe
    else {
        //Saut vers l'instruction de génération de dossier (url du site) et de création de la redirection
        goto start;
    }
}
?>
