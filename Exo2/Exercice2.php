<!DOCTYPE html>
    <html>
        <head>
            <title>Exercie 2</title>
            <meta charset="utf-8"/>
        </head>
        <body>
            <form method="POST">
            <label>Choisir une langue</label> 
                <select name="langues"> 
                    <option value="Francais">Francais</option>
                    <option value="Anglais">Anglais</option>
                </select>
                <input type="submit" name="submit" value="Valider"><br><br>
            </form>
            <style>
                table{
                    border: 2px black solid;
                    width: 30%;
                    height: 150px;
                    background-color: grey;ù   
                }

                td{
                    border:1px black solid;
                }
            </style>
        </body>
    </html>


<?php

$annee1 = array (
    'Francais' => ['Janvier','Fevrier', 'Mars', 'Avril','Mai', 'Juin','Juillet', 'Aout','Septembre', 'Octobre', 'Novembre','Decembre'],
    'Anglais' => ['January','February','March','April','May','Jun','July','August','September','October','November','December']
);
  
    if (isset($_POST['submit'])) {
         
            $langues = $_POST['langues'];
                langues($annee1,$langues);
    }   
               
            function langues ($tab,$langues){
                $m=0;
                $n=0;
                echo '<table>';
                for ($i=0; $i < 4; $i++) { 
                    echo '<tr>';
               

                for ($j=0; $j < 3; $j++) { 
                    echo '<td>'; echo ++$m; echo '</td>';
                    echo '<td>';
                    echo $tab[$langues][$n++];
                    echo '</td>';
                }
                }
                echo '</table>';

            }
               
   
?>