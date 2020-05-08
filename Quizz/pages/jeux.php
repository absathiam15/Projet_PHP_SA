<?php
    // Parcours du fichier json concernant les questions à afficher

    $data=file_get_contents("./data/questions.json");
    $data=json_decode($data,true);
    $cpt=0;
//Pagination 
    define("NombreValeurParPage",1);
    if(isset($data)){
       $TotalValeur=count($data); 
    }
       else{
          $TotalValeur=0;
       }
       $NbrePages=ceil($TotalValeur/NombreValeurParPage);
          if(isset($_GET['page'])){
             $pageActuelle=$_GET['page'];
             if($pageActuelle>$NbrePages){
                   $pageActuelle=$NbrePages;
             }
          }
          else{
             $pageActuelle=1;
          }
    $IndiceDepart= ($pageActuelle-1) *NombreValeurParPage;
    $IndiceFin=$IndiceDepart + NombreValeurParPage -1;
?>

<div class="cadre">
    <div class="enteter">
        <div class="joueurr">
            <div class="images"> <img src="<?= $_SESSION['avatar'] ?>" alt=""> </div>
            <div class="prenomm"> <?= $_SESSION['prenom'] ?> </div>
            <div class="nomm"> <?= $_SESSION['nom'] ?> </div> 
        </div>
        <div class="titler"> BIENVENUE SUR LA PLATEFORME DE JEU QUIZZ<br>JOUEZ ET TESTEZ VOTRE NIVEAU DE CULTURE GÉNÉRALE </div>
        <a href="deco.php"><button type="submit" class="buttonn">Déconnexion</button></a>
    </div>
    <div class="fonds">
        <div class="question">
            <div class="Qjoueur">
                <div class="compteur-question"></div>
                        <div class="aff-quest">
                        <?php
                            foreach ($data as $key => $value) {
                                if ($key >=$IndiceDepart && $key <=$IndiceFin) {
                                    echo ($key+1).".".$value['question']."</br>";

                        ?>
                        </div>
                </div>

                <div class="aff-radio-checkbox">
                <?php
                            //CHOIX MULTIPLE
                            if ($value['choice'] === "multiple") {
                            foreach ($value['reponse']['choice'] as $val) {
                                echo "<input type ='checkbox' name='checkbox' class='ckeck'>".$val."</br>";    
                            }
                            }
                            elseif ($value['choice'] === "simple") {
                            foreach ($value['reponse']['choice'] as $val) {
                                echo "<input type='radio' name='radio' class='rad'>".$val."</br>";
                            }
                            }
                            elseif ($value['choice'] === "text") {
                            echo "<input type='text' readonly='readonly'/></br>";
                            }         
                  
                        }      
                    }
                ?>

                </div>

                <div class="pagination2">
   <?php
   if($pageActuelle>1){
   echo "<button class='precedant1' bouton><a href='index.php?lien=jeux&page=".($pageActuelle-1)."'>PRECEDANT</a></button>";
   } 
   if($NbrePages>$pageActuelle){
   echo "<button class='suivant1' bouton><a href='index.php?lien=jeux&page=".($pageActuelle+1)."'>SUIVANT</a></button>";
   }
   ?>         
</div>
        </div>


        <div class="score">
            <a class="top" href="index.php?lien=jeux&bloc=topscore"> <div class="topp"> Top scores </div> </a>
            <a class="top" href="index.php?lien=jeux&bloc=monscore"> <div class="tope"> Mon meilleur score </div> </a>
            <div class="liste">


            
                <?php
                    if (isset($_GET['bloc'])) {
                        if ($_GET['bloc'] == "topscore") {
                            include ("topscore.php");
                        }elseif ($_GET['bloc'] == "monscore") {
                            include ("monscore.php");
                        }
                    }
                ?>
            </div> 
        </div>

  
    </div>
    
</div>
