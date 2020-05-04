<?php
    $nbr_points = "";
    $num_input = 0;
    $reponse=[];
    $validResponse=[];
    $num_input = count($_POST)-5 ;
    var_dump($num_input);

    if (isset($_POST['submit'])) {
        $nbr_points  = $_POST['nbr_points'];
        $choix = $_POST['choice'];
        $questions = $_POST['questions'];
        
        for ($i=1;$i<=$num_input;$i++){
             if ($choix=="texte"){
            $reponse[]= $_POST['rep'.$i];
            $validResponse[]=$_POST['rep'.$i];
           
        }else {
            $reponse[]= $_POST['rep'.$i];
        }
       
        }

        for ($i=1; $i<= $num_input;$i++){
            if (isset($_POST['checkbox'.$i])){
                $validResponse[]= $_POST['rep'.$i];
            }elseif (isset($_POST['radio'])){
                if ($_POST['radio']== "rep".$i){
                    $validResponse[]= $_POST['rep'.$i];
                }
            }
        }
    }
       

    $data = file_get_contents('./data/questions.json');
    $data =  json_decode($data, true);

   
    
    if ($nbr_points >= 1) {
        $tab_questions = array(
            "question" => $questions,
            "nbr_points" => $nbr_points,
            "choice" => $choix,
            "reponse" => $reponse,
            "reponses_valides" => $validResponse
        );
        $data[] = $tab_questions;
        $data = json_encode($data);
        file_put_contents('./data/questions.json', $data);
       
    }
    
?>


<!DOCTYPE html> 
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="./public/css/creerquestion.css">
    </head>
    <body>
        <div class="parametre-quest">PARAMETRER VOTRE QUESTION</div>
        <div class="cadre-question">

           <form method="POST" id="form-question">
           
                    <div class="input-quest">
                        <div class="questions">Questions</div>
                        <div class="input-text ">
                        <input type="text" name="questions" class="input-questions erreur" err="err-1"></div>
                        <div class="error-form" id="err-1"></div>
                    </div>
                
                    <div class="input-nombre">
                        <div class="nombre">Nbre de Points</div>
                        <div class="input-nbr "><input type="number" name="nbr_points"err="err-2" class="input1 erreur"></div>
                        <div class="error-form" id="err-2"></div>
                    </div>
                    <div class="input-quest1">
                     
                        <div class="type-reponse">Type de réponse</div>
                        <select id="select" name="choice" class="erreur" err="err-3">
                            <option value="" id="error"></option>
                            <option value="text" id="error">Text</option>
                            <option value="simple" id="error">Choix simple</option>
                            <option value="multiple" id="error">Choix multiple</option>
                        </select>
                        <button type="button" class="btn" onclick="ajouterInput()">+</button>
                        <div class="error-form" id="err-3"></div>
                       
                    </div>  
                    <div id="Inputs">
                    
                    </div>
                    <button type="submit" class="enregistrer" name="submit">Enregistrer</button>
                    
           </form>
           
           
            <script>
                            document.getElementById("form-question").addEventListener("submit",function(e) {

                const fields = document.getElementsByClassName("erreur");
                var err = false
                for (let area of fields) {
                    if (area.hasAttribute("err")) {
                        var idDivError = area.getAttribute("err")
                        if(!area.value) {
                            document.getElementById(idDivError).innerText = "Champ obligatoire !"
                            err = true
                        }
                    }
                }
                if (err) {
                    e.preventDefault();
                    return false
                }
                })

            </script>
           <script  src="public/js/creerQuest.js"></script>
           
        </div>

        
    </body>
    </html>
