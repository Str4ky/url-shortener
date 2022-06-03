<?php
//Initialisation de la sesion
session_start();
//Définition du lien entrée sur l'interface, dans una variable temporaire
$link = $_POST['url'];

//Si on a entré une url customisée
if($_POST['custom'] != null) {
    //Définition de l'url customisée entrée sur l'interface, dans una variable temporaire
    $folder = $_POST['custom'];

    //Si le dossier (url du site) n'existe pas
    if(!is_dir($folder)) {
        //Création du dossier (url du site)
        mkdir($folder);
        //Définition du fichier pour la redirection puis le créer
        $file = $folder."/index.php";
        touch($file);
        //Rajout dans le ficier index, le code de la redirection
        file_put_contents($file, "<?php\nheader('Location: ".$link."')\n?>')");
        //Définition de l'url de la page dans une variable
        $generate = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/" . $folder;
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "Votre lien généré est : <a href='".$generate."' target='_blank'>".$generate;
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
    else {
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "L'URL a déjà été attribuée à un lien";
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
}
//Si on a pas entré d'url customisée
else {
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
        //Rajout dans le ficier index, le code de la redirection
        file_put_contents($file, "<?php\nheader('Location: ".$link."')\n?>')");
        //Définition de l'url de la page dans une variable
        $generate = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/" . $folder;
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "Votre lien généré est : <a href='".$generate."' target='_blank'>".$generate;
        header("Location: index.php");
    }
    else {
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "Une erreur est survenue, veuillez réessayer<br><br>(L'URL a déjà été attribuée à un lien mais<br>ne peut pas être regénérée automatiquement)";
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
}
?>
