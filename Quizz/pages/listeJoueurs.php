<?php

    $tab = [];
    $json = file_get_contents('./data/utilisateur.json');
    $decode = json_decode($json, true); 
    foreach ($decode as $value) {
        if ($value['profile'] === "joueur") {
            $tab[] = $value;
        }   
    }
    $colonne = array_column($tab,"score");
    array_multisort($colonne,SORT_DESC,$tab);

            //Pagination 
    define("NombreValeurParPage",15);
                if(isset($tab)){
                    $TotalValeur=count($tab);36+2
                    
                }else{
                    $TotalValeur=0;
                }
                $NbrePages=ceil($TotalValeur/NombreValeurParPage);
                if(isset($_GET['page'])){
                    $pageActuelle=$_GET['page'];
                    if($pageActuelle>$NbrePages){
                        $pageActuelle=$NbrePages;
                    }
                }else{
                    $pageActuelle=1;
                }
                $IndiceDepart=($pageActuelle-1)*NombreValeurParPage;
                $IndiceFin=$IndiceDepart+NombreValeurParPage-1;
                
    foreach ($tab as $key => $value) {
        if($key>=$IndiceDepart && $key<=$IndiceFin){
            echo $value['prenom']." ".$value['nom']." ".$value['score'] ;
        }   
    }
        for ($i=1; $i <=$NbrePages ; $i++) {
            echo '<td style="flaot:left; width: 40px; height : 10px; text-align: center;">';
            echo "<a href='index.php?lien=admin&absa=ListeJoueurs&page= ".$i."'>$i</a>";
            echo '</td>';
        }
        if($pageActuelle>1){
            echo "<a href='index.php?lien=admin&absa=ListeJoueurs&page= ".($pageActuelle-1)."'><button>Precedent</button></a>"; 
        }

        if($NbrePages>$pageActuelle){
            echo "<a href='index.php?lien=admin&absa=ListeJoueurs&page= ".($pageActuelle+1)."'><button>Suivant</button></a>"; 
        }  
?>


<div class="listes-joueurs">LISTE DES JOUEURS PAR SCORE</div>
<div class="tab-joueur"></div>
    <table>
        <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
           
            
        </tbody>
    </table>
