<!DOCTYPE html>
    <html>
        <head>
            <title>Exercie 1</title>
            <meta charset="utf-8"/>
        </head>
        <body>
            <form method="GET">
                <input type="text" name="a" placeholder="Valeur superieur a 10000"><br><br>
                <input type="submit" name="submit" value="Envoyer">


            </form>
        </body>
    </html>

<?php

    session_start();
// c normal dans la parenthèse de session_star y a rien
    if (isset($_GET['submit'])) {
        $tab = array();
        $a = $_GET['a']; 
            if (!empty($a)) {
                if (is_numeric($a)) {

                    if ($a>10000) {
                        echo "les nombres premier compris entre 1 et ".$a. " sont: <br>";
                            for ($i=2; $i < $a; $i++) {
                                $np = 0; 
                                for ($j=2; $j < $i; $j++) { 
                                    if ($i % $j == 0) {
                                        $np = 1;
                                        $j = $i;                                   
                                    }
                                }
                                if ($np==0) {
                                    $tab=$i;
                                    // entre les crochets du $_SESSION t'y met ce que tu veux mais le $tab se met apres le signe = par exemple $_SESSION['absa'] = $tab ; compris ?oui maintenant modifie et d'accord
                                    // n'oublies jamais lorsque tu crées une session elle ne doit pas être vide là elle est vide car elle stocke aucune donnée
                                   // regarde ce que je vais faire ok

                                    $_SESSION['premier']=$tab;
                                    var_dump($_SESSION['premier']);
                                   // echo $tab.' ';
                                } 
                            }
                            $NbrTotal = $tab;
                            $NbrParPage = 100;
                            $NbrDePage = ceil($NbrTotal/100);
                            for ($i=1; $i < $NbrDePage; $i++) { 
                                echo "<a href=Exercice1.php?page".$i.">".$i."</a>";
                            }
                            $Dep = 0;
                            $page = 1; 
                            $Fin = $NbrParPage;
                           
                            echo "<table border='2'>";
                            for ($i=$Dep; $i < $Fin ; $i++) { 
                                    echo "<tr>";
                                        echo "<td>".$tab[$i]."</td>";
                                    echo "</tr>";
                        }
                            echo "</table>";
                    }
                }   
                    else {
                        echo "Entrer une valeur superieur a 10000";
                    }  
            }
                else {
                    echo "Entrer une valeur numerique"; 
                }
}
            else {
                echo "Donner une valeur";
            }
  

?>