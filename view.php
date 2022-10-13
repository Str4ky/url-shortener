<?php
    if(isset($_POST['url'])) {
        $link = $_POST['url'];
        header("Location: $link");
    }
    else {
        header("Location: index.php");
    }
?>