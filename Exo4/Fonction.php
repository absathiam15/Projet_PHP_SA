<?php

//Fonction qui vérifie si une phrase est valide ou pas
function est_phrase_valide($phrase){
    if (preg_match('#[!?.]{2,}#', $phrase)) {
        return false;
    }
    if (preg_match("#^[A-Z]#",$phrase) && preg_match("#[.?!]$#",$phrase)) {
        return true;
    } 
    return false;
}


//Fonction qui découpe un paragraphe en phrase
    
function decouper_paragraphe($paragraphe){
    $paragraphe = preg_split('/([^.?!]+[.?!]+)/',$paragraphe, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);      
       return $paragraphe;
   }


   //Fonction qui enléve les epaces inutile d'une phrase
   function enlever_espace($phrase){
    $phrase = preg_replace('/\s+/',' ', $phrase);
    $phrase = str_replace(" '","'" , $phrase); 
    $phrase = str_replace(" '","'" , $phrase); 
    $phrase = str_replace(" .","." , $phrase);
    $phrase = str_replace(" ,","," , $phrase);
    $phrase = str_replace(" :",":" , $phrase);
    $phrase = str_replace(" !","!" , $phrase);
    $phrase = str_replace(" ?","?" , $phrase);
    $phrase = str_replace(" ;",";" , $phrase);

    return $phrase;
} 


   //Fonction qui verifie la taille d'une chaine de caractere
    function my_strlen($chaine){
        $i=0;
       while (isset($chaine[$i])) {
           $i++;
       }
       return $i;
    }