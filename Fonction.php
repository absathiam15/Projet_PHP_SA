<?php

function matrice($taille){
    echo '<table>';
    for ($i=1; $i <= $taille; $i++) { 
       
        echo '<tr>';
        for ($j=1; $j <= $taille; $j++) { 
            echo '<td style="width:30px; height:30px; border:1px solid black;">';
            echo '</td>';
        }
        echo '</tr>';
    }
echo '</table>';
}


function diagonale($taille){
    echo '<table>';
    for ($i=1; $i <= $taille ; $i++) { 
        echo '<tr>';
        for ($j=1,$k=$taille; $j <= $taille, $k >=1; $j++, $k--) {
            echo '<td>';
            if ($j<=$i or $i==$k) {
                echo 2;
            }
            else {
                echo 1;
            } 
            echo '</td>';
        }
        echo '<tr>';
    }
echo '</table>';
}


function tableau_diagonale($taille, $C1, $C2, $position){

    echo '<table width="189px">';
    if ($position = "haut") {
        # code...
   
    for ($i=0; $i < $taille; $i++) {     
        echo '<tr>';
        for ($j=0; $j < $taille; $j++) {
            if ($j<=$i) {
                echo "<td bgcolor=".$C2."></td>";
            }
            elseif ($j==($taille - $i - 1)) {
                echo "<td bgcolor=".$C2."></td>";
            }
            else{
                echo "<td bgcolor=".$C1."></td>";
            }           
        }
        echo '</tr>';
    }
echo '</table>';  
}
else {
    echo '<table >';
    if ($postion = "bas") {
        # code...
   
    for ($i=0; $i < $taille; $i++) {     
        echo '<tr>';
        for ($j=0; $j < $taille; $j++) {
            if ($j<=$i) {
                echo "<td bgcolor=".$C2."></td>";
            }
            elseif ($j==($taille - $i - 1)) {
                echo "<td bgcolor=".$C2."></td>";
            }
            else{
                echo "<td bgcolor=".$C1."></td>";
            }           
        }
        echo '</tr>';
    }
echo '</table>';  
}
}
}


function tableau_diagonale_2($taille, $C1, $C2, $C3){

    echo '<table width="189px">';
   
    for ($i=1; $i <= $taille; $i++) {     
        echo '<tr>';
        for ($j=1; $j < $taille; $j++) {
            
            if (($j==$i) || ($i+$j==$taille - 1) || (($i<=$j) && ($i+$j<=$taille+1))) {
                echo "<td bgcolor=".$C3."></td>";
            }
            else 
                if (($j<=$i) && ($i+$j>$taille + 1)) {
                    echo "<td bgcolor=".$C2."></td>";
                }    
                else {
                        echo "<td bgcolor=".$C1."></td>";
                    }
                         
       
        echo '</tr>';
    }
echo '</table>';  

}
}


function coloriage ($longueur,$C1,$C2,$C3)
{
    echo "<table>";
    {
        for ($i=1;$i<=$longueur;$i++)
        {
            echo "<tr>";
            for ($j=1;$j<=$longueur;$j++)
            {
                if (($i==$j ) || ($i+$j==$longueur+1) || (($i<=$j) && ($i+$j<=$longueur+1)))
                {
                    echo "<td style='background-color:$C1; width:25px; height:25px'> </td>";
                }
                 
    else
        if (($i>$j)&&($i+$j>$longueur+1))
    {
            echo "<td style='background-color:$C2; width:25px; height:25px'> </td>";
                }
                 else
                  {
                echo "<td style='background-color:$C3;' width='25px;' height='25px;'></td>";
                    }
            
            
        }
        echo "</tr>";
    }
    echo "</table>";

}

}
?>

