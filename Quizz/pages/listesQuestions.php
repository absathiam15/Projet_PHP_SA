<?php

   $datajson = file_get_contents('./data/NbreQuestion.json');
   $nbrQjson = json_decode($datajson, true);
   $_SESSION['nombre'] = $nbrQjson['nombre'];

   if (isset($_POST['submit'])) {
          
         $nombre = $_POST['nombre'];
         $_SESSION['nombre'] = $nombre;
   
          
         $nombre = intval($nombre);
         $nbrQjson['nombre'] = $nombre;
           
         
         $nbr = json_encode($nbrQjson);
         file_put_contents('./data/NbreQuestion.json', $nbr);
      
   }
  
?>


<div class="div2">  
      <div class="nbr-Q-par-jeu"><p>Nbre de question/jeu</p>

      <form method="POST" id="form-question">
      <input name="nombre" type="number" min="5" value="<?= $_SESSION['nombre'] ?>" error="error1" class="nbr-de-question-affich erreur"/>
      <div class="error" id="error1"></div>

      <input class="OK" type="submit" name="submit" value="OK" >
      
      </form>
</div>

<script>

            const inputs = document.getElementsByClassName("input");
    for (let filed of inputs) {
      fields.addEventListener("keyup", function(e){
            if (e.target.hasAttribute("error")) {
                var idDivError = e.target.getAttribute("error");
                document.getElementById(idDivError).innerText = ""
            }
        })
    }
    document.getElementById("form-question").addEventListener("submit",function(e) {

        const fields = document.getElementsByClassName("erreur");
        var error = false;
        for (let area of fields) {
            if (area.hasAttribute("error")) {
                var idDivError = area.getAttribute("error")
                if(!area.value) {
                    document.getElementById(idDivError).innerText = "Champ obligatoire !"
                    error = true
                }
            }
        }
        if (error) {
            e.preventDefault();
            return false
        }
    })

            </script>

<div class="cadre-Q">
<?php
   $data=file_get_contents("./data/questions.json");
   $data=json_decode($data,true);
   $cpt=0;
 //Pagination 
      define("NombreValeurParPage",5);
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
      
         if(isset($data)){
            foreach ($data as $key => $value) {
               if ($key >=$IndiceDepart && $key <=$IndiceFin) {
                  echo ($key+1).".".$value['question']."</br>";
               
                  //CHOIX MULTIPLE
                  if ($value['choice'] === "multiple") {
                     foreach ($value['reponse']['choice'] as $val) {
                        echo "<input type ='checkbox' name='checkbox'/>".$val."</br>";
                        
                     }
                  }
                  elseif ($value['choice'] === "simple") {
                     foreach ($value['reponse']['choice'] as $val) {
                        echo "<input type='radio' name='radio'/>".$val."</br>";
                     }
                  }
                  elseif ($value['choice'] === "text") {
                     echo "<input type='text' readonly='readonly'/></br>";
                  }
            
               }      
            }
                
         }           
 ?>                               

</div>
<div class="pagination">
   <?php
   if($pageActuelle>1){
   echo "<button class='precedant' bouton><a href='index.php?lien=admin&absa=ListeQuestions&page=".($pageActuelle-1)."'>PRECEDANT</a></button>";
   } 
   if($NbrePages>$pageActuelle){
   echo "<button class='suivant' bouton><a href='index.php?lien=admin&absa=ListeQuestions&page=".($pageActuelle+1)."'>SUIVANT</a></button>";
   }
   ?>         
</div>





    
