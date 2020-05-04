<div class="div2">  
      <div class="nbr-Q-par-jeu"><p>Nbre de question/jeu</p>
      <input name="nombre" type="number" value="5" class="nbr-de-question-affich">
      <input class="OK" type="submit" name="ok" value="OK">
</div>

<div class="cadre-Q">
<?php
$data=file_get_contents("./data/questions.json");
$data=json_decode($data,true);
$cpt=0;
 //Pagination 
 define("NombreValeurParPage",5);
 if(isset($data)){
     $TotalValeur=count($data); 
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
 for ($i=$IndiceDepart; $i <=$IndiceFin ; $i++) { 
   if(isset($data[$i])){
   //texte          
   
       if($data[$i]['choice']=="texte") {
         $cpt++;
       echo "<h4>".$cpt.'.'.$data[$i]['question']."</h4><input type='text' readonly='readonly' value='".$data[$i]['reponse']."'>";
      
      }
      //choix simple  
      else if ($data[$i]['choice']=="simple") {
         $cpt++;
            echo "<h4>".$cpt.'.'.$data[$i]['question']. "</h4>";
            $reponse=$data[$i]['reponse'];
            for ($j=0; $j <count($reponse) ; $j++) { 
               if ("oui"==$reponse[$j]['reponses_valides']) {
                  echo "<h5><input type='radio' name='checkbox.$i' checked='checked' class='checkbox'/>".$reponse[$j]['valeur']."<h5>";
               }
               else {
                  echo "<h5><input type='radio' name='radio.$i' radio='checked' class='radio'/>".$reponse[$j]['valeur']."<h5>";
               }
            }
      }

      //cHOIX MULTIPLE
      else if ($data[$i]['choice']=="multiple") {
         $cpt++;
            echo "<h4>".$cpt.'.'.$data[$i]['question']. "</h4>";
            $reponse=$data[$i]['reponse'];
            for ($j=0; $j <count($reponse) ; $j++) { 
               if ("oui"==$reponse[$j]['valide']) {
                  echo "<h5><input type='checkbox' name='checkbox.$i' checked='checked' class='checkbox'/>".$reponse[$j]['valeur']."<h5>";
               }
               else {
                  echo "<h5><input type='checkbox' name='radio.$i' radio='checked' class='radio'/>".$reponse[$j]['valeur']."<h5>";
               }
            }
      }
   }
 }
 ?>                               
</div>
<div class="pagination">
   <button class="precedant bouton"><a href="index.php?lien=admin&absa=ListeQuestions=<?=$pageActuelle-1 ?>">PRECEDANT</a></button>
   <button class="suivant bouton"><a href="index.php?lien=admin&absa=ListeQuestions&page=<?=$pageActuelle+1 ?>">SUIVANT</a></button>             
</div>


    
