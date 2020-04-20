<?php

  // Fonction qui permet de verifier la validité du compte de l'utilisateur et le rediriger vers la page correspondante
    
    function connexion($login,$password) {
    
      $users = getData();
      foreach ($users as $value) {
        if ($value["login"] === $login && $value["password"] === $password) {
          if ($value["profile"] === "admin") {
            return "admin";
          }else {
            return "jeux";
          }
        }
      }
      return "error";
    }


  // Fonction qui vérifie si l'utilisateur est connecté

  function is_connect() {
    if (!isset($_SESSION['statut'])) {
      header("location:index.php");
    }
  }


 //Foction qui permet de se deconnecter

 function deconnexion() {
  unset($_SESSION['user']);
  unset($_SESSION['statut']);
  session_destroy();
}

  //Fonction qui permet de parcourir un fichier json sous forme de tableau
    function getData($file="utilisateur") {
      $data = file_get_contents("./data/".$file.".json");
      $data = json_decode($data,true);
      return $data;
    }

    //Fonction qui permet de recuperer les donnees dans le fichier JSON
    function validation_donnees($login){
      $json_data = file_get_contents('./data/utilisateur.json');
      $decode_flux = json_decode($json_data, true);
      $message = "";
      $success = "";
        foreach ($decode_flux as $value) {
          if ($login = $value['login']) {
            $message = "Le login existe deja";
          break;
          }
          else {
            if ($_POST[pwd] != $_POST['confirm_pwd']) {
              $message = "Le mot de passe doit etre identique";
            break;
            }
            else {
              $data = array(
                "prenom" => $_POST['prenom'],
                "nom" => $_POST['nom'],
                "login" => $_POST['login'],
                "password" => $_POST['pwd']
              );
            }
          }
        }
        if (!empty($message)) {
          echo '<span id="msg" style = "color: blue">'.$message.'</span>';
        }
        if (!empty($data)) {
          $decode_flux = json_encode($decode_flux);
          file_put_contents('../utisateur.json',$decode_flux);
          echo $success = '<span id="msg" style="color:green;">Enregistrement effectués</span>';

          $_POST['prenom'] = '';
          $_POST['nom'] = '';
          $_POST['login'] = '';
          $_POST['pwd'] = '';
          $_POST['confirm_pwd'] = '';

        }    
    }
    