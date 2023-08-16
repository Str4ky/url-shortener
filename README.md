# URL Shortener
Raccourcisseur d'URL fait en PHP pour le fun

<img src="https://i.imgur.com/sW2bopp.png">

# Customisation de la longueur des liens
Quand un utilisateur rentre pas d'URL personnalisée, ça lui génère un lien défini par une longueur de caractères, vous pouvez modifier le nombre de caractères en modifiant cette ligne dans le fichier "create.php"
```
$length = rand(5, 9);
```
5 étant la valeur minimum et 9 maximum

# Customisation des boutons
Ouvrez le fichier "style.css" et rajoutez/modifiez une couleur, voici un exemple de couleur
```
.black {
background-color: #000000;
}

.black:hover {
background-color: #0f0f0f;
}
```
Et remplacez la couleur du bouton dans les pages "index.php" et "admin.php" en changeant la couleur après le "button" dans le paramètre "class" de la balise \<a> et \<button>

# Mise en ligne du site
Vous pouvez mettre en ligne le site sur votre hébergeur favori ou votre serveur si PHP est installé (pas besoin de base de données)

Pour avoir accès à la page d'administratrion, changez cette ligne sur les pages "index.php", "admin.php", "edit.php" et "delete.php"
```
$verif = votre_ip;
```
Et remplacez y par votre adresse IP, pour un peu plus de sécurité vous pouvez encoder votre IP en base64 et remplacez la ligne par la fonction php base64_decode() suivi de votre adresse IP encryptée en base64
