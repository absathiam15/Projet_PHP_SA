 <?php
//Fonction qui permet de saisir un caractere en minuscule
   $caractere='a';
    function is_minuscule($caractere){
        if (($caractere<='a') || ($caractere>='z')) {
            return $caractere;
        }
    }
    

//Fonction qui permet de saisir un caractere en majuscule
    $caractere='A';
    function is_majuscule($caractere){
        if (($caractere<='A') || ($caractere>='Z')) {
            return $caractere;
        }
    }

//Fonction qui verifie la taille d'une chaine de caractere
    function my_strlen($chaine){
        $i=0;
       while (isset($chaine[$i])) {
           $i++;
       }
       return $i;
    }

//Fonction qui verifie si le nombre enter est un entier positif
  /*      $nombre = 10;
    function is_entier($nombre){
        if ($nombre>=0) {
            echo "Le nombre n'est pas un entier";
        }
        else {
            echo "Le nombre est un entier";
        }
    }
        var_dump( is_entier($nombre));*/
        
//Fonction qui verifie si un caractere est chiffre
    function is_chiffre($caractere){
        return ($caractere >= '0' && $caractere <= '9');
    }

//Fonction qui verifie si la valeur saisit est numerique
    $nombre=10;
    function est_num($nombre){
        for ($i=0; $i < my_strlen($nombre) ; $i++) {
            if (!is_chiffre($nombre[$i])) {
                return true;
            }
            else {
                return false;
            }
        }
    }


    function is_chaine_numeric($nombre){
        for($i=0; $i< my_strlen($nombre); $i++){
            if (!is_chiffre($nombre[$i])){
                return false;
            }
        }
        return true;
    }

//Fonction qui vérifie si une phrase est valide ou pas
    function est_phrase_valide($phrase){
        if (preg_match("#^[A-Z]#",$phrase) && preg_match("#[.?!]$#",$phrase)) {
            return $phrase;
        } 
    }


//Fonction qui découpe un paragraphe en phrase
    
    function decouper_paragraphe($paragraphe){
        $paragraphe = preg_split('/([^.?!]+[.?!]+)/',$paragraphe, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);      
           return $paragraphe;
       }
 
   //  var_dump(decouper_paragraphe("Je suis loin d'etre folle. La vie est belle quand on est entourer de bonnes personnes!"));


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
//   var_dump(enlever_espace("Je   suis      loin  d  'etre  folle . J '  ai depense  ; trop d 'energie !"));


    // Fonction qui teste si tous les caractères d'une chaine sont alphabetiques
    function is_chaine_alpha($chaine){
        for($i=0; $i< my_strlen($chaine); $i++){
            if (!is_car_alpha($chaine[$i])){
                return false;
            }
        }
        return true;
    }
   // var_dump(is_chaine_alpha($chaine));

    // Fonction qui teste si un caractère est alphabétique
$car = 'je suis 25';
    function is_car_alpha($car){
        if( my_strlen($car) == 1 &&  ($car >= "a" && $car <= "z" ) || ($car >= "A" && $car <= "Z")){
            return false;
        }
        else {
            return true;
        }
    }
  // var_dump(is_car_alpha($car));


    // Fonction qui vérifie si le caractere est dans la chaine 
    function is_char_in_string($char,$mot){
        for ($i=0; $i < my_strlen($mot); $i++) { 
            if ($mot[$i]==$char) {
                return true;
            }
        }
        return false;
    } 
    

//fonction qui verifie les mots qui contiennent un (m)
    function mot_m($mot){
        if (is_car_alpha($car)) {
            
        }
    }

?>