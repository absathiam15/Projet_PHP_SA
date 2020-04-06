<?php
require_once "Fonction_SA.php";
    $paragraphe = [];
    $message = "";
    if (isset($_POST['boutton'])) {
        $phrase = $_POST['phrase'];
        if (empty($paragraphe)) {
            $message = "Champ obligatoire";
        }
        else {
            if (est_phrase_valide($phrase)) {
                decouper_paragraphe($paragraphe);
            } 
           
    
          
        }
    }
?>


<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Exercice 4</title>
    </head>
    <body>
        <form method="POST">
            <textarea type="submit" name="phrase" id="" cols="70" rows="10"></textarea>
            <p style='color: blue;'> <?= $message ?> </p>
            <button type="submit" name="boutton">Valider</button>
        </form>
    </body>
    </html>