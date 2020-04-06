<?php
    require_once "Fonction_SA.php";
    $nombre = 0;
    $message = "";
    $erreur = [];
    $tab_mot = [];
    $tab_mot_m = [];
    if (isset($_POST['valider'])) {
        $nombre = $_POST['nbr'];
        if (empty($nombre)) {
            $message = "Champs obligatoire";
        }
        elseif (!is_chaine_numeric($nombre)) {
            $message = "Veuiller saisir un entier positif";
            $nombre = 0;
        }
    }
    if (isset($_POST['resultat'])) {
        $nombre = $_POST['nbr'];
        for ($i=0; $i < $nombre ; $i++) { 
            $mot = $_POST['mot_'.($i)];
            if (empty($mot)) {
                $erreur[$i] = "Champs obligatoire";
            }
            elseif (my_strlen($mot)>20){
                    $erreur[$i] = "Les caracters ne doivent pas depasser 20 ";       
            }
            elseif (!is_chaine_alpha($mot)){ 
                    $erreur[$i] = "La chaine n'est pas alphabétique";
            }
            else {
                $tab_mot[$i] = $mot;
                
            } 
            $j=0
            for ($i=0; $i < my_strlen($mot); $i++) { 
                if is_char_in_string('m',$tab_mot[$i]) {
                    $j++
                }
            }
            echo "Il y'a $j mots comprtant la lettre m";
        }    
    }

?>


<!DOCTYPE html>
    <html>
        <head>
            <title>Exercie 3</title>
            <meta charset="utf-8"/>
        </head>
        <body>
            <form method="POST">
                    <label>Donner le nombre de mots</label>
                    <input type="text" name="nbr" value="<?= $nombre ?>" autocomplete="off">
                    <p style='color: red;'> <?= $message ?> </p>
                    <input type="submit" name="valider" value="Envoyer">
                    <?php for($i=0; $i < $nombre; $i++) { ?>
                    <label>mot <?= $i+1 ?> </label>
                    <?php if (isset($erreur[$i])) { ?>
                        <span style="color:blue;"> <?= $erreur[$i]  ?> </span>
                  <?php  }   ?>
                    <input type="text" autocomplete="off" name="mot_<?= $i?>" value="<?php if (isset($_POST['mot_'.$i])){
                        echo $_POST['mot_'.$i];} ?>">
                    <?php } ?>
                    <?php if ($nombre>0) { ?>
                    <button type="submit" name="resultat">Resultat</button>
                    <?php } ?>
            </form>
        </body>
    </html>