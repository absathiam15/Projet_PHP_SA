<?php
    require_once 'Fonction_SA.php';
    $ph='';
    $message = "";
    $phrase=[];
    if (isset($_POST['boutton'])) {
        $ph=$_POST['phrase'];
        if (empty($ph)) {
            $message = "Champ obligatoire";
        }else {
            $ph = preg_replace('/\.\s+/','.',$ph);
            $phrase = decouper_paragraphe($ph);
            for($i=0; $i< my_strlen($phrase) ;$i++) {
                if (est_phrase_valide($phrase[$i])) {
                    if (my_strlen($phrase[$i])<=200) {
                        $phrase[$i] = enlever_espace($phrase[$i]);
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Exercice 4</title>
    </head>
    <body>
        <div id="cadre">
            <form method="POST">
                <Label>Saisir</Label>
                <textarea name="phrase"><?=$ph?></textarea>
                <input type="submit" name="boutton">
                <?php if (isset($_POST['boutton'])) { ?>
                <span><?= $message ?></span>
                <textarea readonly="yes"><?php for ($i=0; $i < my_strlen($message) ; $i++) { ?>
                <?php } for ($i=0; $i <my_strlen($phrase) ; $i++) { if ( est_phrase_valide($phrase[$i])) { if (my_strlen($phrase[$i])<=200) {
                echo $phrase[$i].' '; } } } ?>
                </textarea><?php } ?>
            </form>
        </div>
    </body>
</html>
