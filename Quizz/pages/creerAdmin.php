<?php
  
    if (isset($_POST['creer-compte'])) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $login = $_POST['login'];
        $pwd = $_POST['pwd'];
        $confirm_pwd = $_POST['confirm_pwd'];

        validation_donnees($login);
    }

?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <div class="inscrire">S'INSCRIRE</div>
        <div class="proposer">Pour proposer des quizz</div>
        <form action="" method="POST" id="form-inscription" enctype="miltipart/form-data">        
            <div class="prenom">Prenom</div>
            <input type="text" name="prenom" error="error-3" autocomplete="off">
            <div class="error" id="error-3"></div>
            <div class="prenom">Nom</div>
            <input type="text" name="nom" error="error-4" autocomplete="off">
            <div class="error" id="error-4"></div>
            <div class="prenom">Login</div>
            <input type="text" name="login" error="error-5" autocomplete="off">
            <div class="error" id="error-5"></div>
            <div class="prenom">Password</div>
            <input type="password" name="pwd" error="error-6" autocomplete="off">
            <div class="error" id="error-6"></div>
            <div class="prenom">Confirmer Password </div>
            <input type="password" name="confirm_pwd" error="error-7" autocomplete="off">
            <div class="error" id="error-7"></div>
            <div class="avat">
                <div class="avatarrr">Avatar</div>
                <label for="file" class="label-file">Choisir un fichier</label>
                <input type="file" accept="image/*" id="file" class="choisir">
            </div>
            <button name="creer-compte" class="Créer-compte">Créer compte</button><br>   
        </form>
        <div class="photo"></div>
            <div class="avatar-admin">Avatar Admin</div>


            <script>
    const inputs = document.getElementsByTagName("input");
    for (input of inputs) {
        input.addEventListener("keyup",function(e) {
            if (e.target.hasAttribute("error")) {
                var idDivError = e.target.getAttribute("error")
                document.getElementById(idDivError).innerText = ""
            }
        })
    }
    document.getElementById("form-inscription").addEventListener("submit",function(e) {

        const inputs = document.getElementsByTagName("input");
        var error = false
        for (input of inputs) {
            if (input.hasAttribute("error")) {
                var idDivError = input.getAttribute("error")
                if(!input.value) {
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
    </body>
    </html>