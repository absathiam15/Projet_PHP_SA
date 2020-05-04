const questionForm = document.getElementById('form-question')
const choice = document.getElementById('select');
const Inputs = document.getElementById('Inputs')

questionForm.addEventListener('click', function (event){
    const supprimeElement = questionForm.querySelectorAll('img')
    supprimeElement.forEach(el => {
        el.addEventListener('click', function(){
            const elementsup = el.parentElement.parentElement
            Inputs.removeChild(elementsup)

        })
    })
})


choice.addEventListener('change', function (event){
    console.log(event.target.value)
    if (event.target.value) {
    }

})
const button = document.getElementById('')
let nbrRow=0;
function ajouterInput(){
    nbrRow++;
    const div1 = document.createElement('div')
    div1.setAttribute('class', 'input-text')

    const label = document.createElement('label')
    const nbrReponse = Inputs.children.length +1;
    label.innerHTML = `Reponse ${nbrReponse}`;
    label.setAttribute("class", "label-reponse")
    const input = document.createElement('input');
    input.setAttribute("type", "text");
    input.setAttribute('name', `rep${nbrRow}`);
    input.setAttribute('class','text-inp erreur')
    const divChoix = document.createElement('div');
   
        input.setAttribute("err",`err-${3+nbrRow}`);
        const error_div= document.createElement('div');
        error_div.setAttribute('id',`err-${3+nbrRow}`);
       
    
    if(choice.value != 'text'){
        const inputChoix = document.createElement('input')
        
        
        if(choice.value == 'multiple'){
            inputChoix.setAttribute("type", "checkbox");
            inputChoix.setAttribute("class", "checkbox")
            inputChoix.setAttribute("name", `checkbox${nbrRow}`)
           
        }else{
            inputChoix.setAttribute("type", "radio");
            inputChoix.setAttribute("class", "radio")
            inputChoix.setAttribute("value",  `rep${nbrRow}`)
            inputChoix.setAttribute("name", "radio")
        }

        const supp = document.createElement('img')
        supp.setAttribute("src", "/QUIZZ/public/icônes/ic-supprimer.png");
        divChoix.append(inputChoix)
        divChoix.append(supp)
    }
    const inputs = document.getElementsByClassName("erreur");
    for (let field of inputs) {
        field.addEventListener("keyup",function(e) {
            if (e.target.hasAttribute("error")) {
                var idDivError = e.target.getAttribute("error")
                document.getElementById(idDivError).innerText = ""
            }
        })
    }
    

    div1.append(label)
    div1.append(input)
    div1.append(divChoix)
    div1.append(error_div);
    Inputs.append(div1)
    
}
