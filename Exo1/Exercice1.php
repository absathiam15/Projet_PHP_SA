<?php
    session_start();
    $T=array();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Absa</title>
    </head>
    <body>
        <form method="post" action="">
            <input type="text" name="a"/>
            <input type="submit" name="submit" value="Entrer">
        </form>
            <?php 

                include('Fonction.php');
                $y = "reserve";
                if (isset($_POST['submit'])) {
                    $a = $_POST['a'];
                    if (!empty($a)) {
                        if (preg_match('/^[0-9]+$/',$a)) {
                            if ($a>1000) {
                                $a = $_POST['a'];
                                echo $a;
                                $T = Npremier($a);
                               
                                $_SESSION[$y] = $T;
                                
                            }
                            
                        }
                    }
                }

            ?>

            <?php

                //Pagination
                if (isset($_SESSION[$y])) {
                    $Total = sizeof($_SESSION[$y]);
                    $colonne = 10;
                    $ligne = 10;
                    $taillePage = ($colonne*$ligne);
                    $nbrPage = ceil($Total/$taillePage);
                    if (isset($_GET['page'])) {
                        $page_num = $_GET['page'];

                    }
                    else {
                        $page_num = 1;
                    }
                    //Affichage des nombres premiers
                    echo '<h2>Les nombres premiers sont : </h2>';
                    echo'<table style=" float: left; width: 1000px;">';
                    for ($j=($page_num -1)*100; $j < $page_num*100; $j++) { 
                        if ($j==$Total) {
                        break;
                        }
                        echo '<tr style="float:left; border: 1px solid black; width: 9%; height:35px;">';
                        echo '<td style="float:left; text-align:center; width: 100%; font-size:20px; margin-top:8%;">';
                        echo $_SESSION[$y][$j];
                        echo '</td></tr>';
                    }
                    //Affichage des pages
                    echo '</table><table>';
                    echo '<tr style="float: left; min-width: 20%;">';
                    for ($i=1; $i <= $nbrPage ; $i++) {
                        echo '<td style="flaot:left; width: 40px; height : 10px; text-align: center;">';
                        echo "<a href='absa.php?page= ".$i."'>$i</a>";
                        echo '</td>';
                    }
                    echo '</tr></table>';
                }

            ?>
    </body>
</html>