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

           <form method="POST">
           
                    <div class="input-quest">
                        <div class="questions">Questions</div>
                        <div class="input-text"><input type="text" name="questions" class="input-questions"></div>
                    </div>
                
                    <div class="input-nombre">
                        <div class="nombre">Nbre de Points</div>
                        <div class="input-nbr"><input type="number" name="questions" class="input1"></div>
                    </div>
                    <div class="input-quest1">
                     
                        <div class="type-reponse">Type de réponse</div>
                    <select name="" id="select" name="choice" onchange="myChoice()">
                            <option value="v1">Donner le type de réponse</option>
                            <option value="text">Text</option>
                            <option value="simple">Choix simple</option>
                            <option value="multiple">Choix multiple</option>
                    </select>
                    <div id="Inputs">
                        <button type="button" class="btn" onclick="onAddInput()">+</button>

                       
                    </div>  
                    <button type="submit" class="enregistrer">Enregistrer</button>
                    
           </form>

           <script>
                var nbrRow = 0;
              function onAddInput(){
                nbrRow++;
                var divInputs = document.getElementById('Inputs')
                var newInput =document.createElement('div');
                newInput.setAttribute('id','row_'+nbrRow);
                newInput.innerHTML = `
                    <input type="text" class="input-suprimmer">
                    <button type="button" class="btn1" onclick="onDeleteInput(${nbrRow})"><img src="./public/Icônes/ic-supprimer.png" ></button>
                `;
                divInputs.appendChild(newInput);
              }
              var select= document.getElementById("select");
              if (select.options[select.selectedIndex].value==="simple") {
                newInput.innerHTML = `<label> Text Reponse </label> <br>
                    <input type="text" name="text" class="newInputform" value="response${nbrRow}"/> 
                    <input type="radio" name="radio" class="checkbox" value="response${nbrRow}"/> 
                    <button type="button" onclick="onDeleteInput(${nbrRow})"><img src="./public/Icônes/ic-supprimer.png" ></button>

                `;
                divInputs.appendChild(newInput);

              }else if (select.options[select.selectedIndex].value==="multiple") {
                newInput.innerHTML = `<label> Text Reponse </label> <br>
                    <input type="text" name="text" class="newInputform" value="response${nbrRow}"/> 
                    <input type="checkbox" name="checkbox" class="checkbox" value="response${nbrRow}"/> 
                    <button type="button" onclick="onDeleteInput(${nbrRow})"><img src="./public/Icônes/ic-supprimer.png" ></button>

                `;
              }else{
                newInput.innerHTML = `<label> Text Reponse </label> <br>
                    <input type="text" name="text" class="newInputform" value="response${nbrRow}"/> 
                    <button type="button" onclick="onDeleteInput(${nbrRow})"><img src="./public/Icônes/ic-supprimer.png" ></button>

                `;
              }

              let valeur=document.getElementById(elementId: "valeur");
              valeur.setAttribute(qualifiedName: "value", value: "${nbrRow}")
              nbrRow++;

              function onDeleteInput(n){
                  var target = document.getElementById('row_'+n);
                  target.remove();
              }
           </script>

        </div>

        
    </body>
    </html>
