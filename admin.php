<?php
    if(!isset($_SESSION['profile'])){
        header("Location: index.php");
        exit;
    }
?>


<div class="cadre">
    <div class="entete">
    <div class="texte">CRÉER ET PARAMÉRTER VOS QUIZZ</div>
    <a href="deco.php"><button type="submit" class="button">Déconnexion</button></a>
    </div>
    <div class="menu">
        <div class="avatar">
            <div class="image"> <img src="<?= $_SESSION['avatar']?>" alt=""> </div>
            <div class="prenom"> <?= $_SESSION['prenom'] ?> </div>
            <div class="nom"> <?= $_SESSION['nom']?> </div>
        </div>
        <a href="index.php?lien=admin&absa=ListeQuestions" class="onglet">
            <div class="textee">Liste Questions</div>
            <div class="icone"><img src="public/Icônes/ic-liste-active.png"></div>
        </a>
        <a href="index.php?lien=admin&absa=Inscription" class="onglet">
            <div class="textee">Créer Admin</div>
            <div class="icone"><img src="public/Icônes/ic-ajout.png"></div>
        </a>
        <a href="index.php?lien=admin&absa=ListeJoueurs" class="onglet">
            <div class="textee">Liste joueurs</div>
            <div class="icone"><img src="public/Icônes/ic-liste.png"></div>
        </a>
        <a href="index.php?lien=admin&absa=CreerQuestions" class="onglet">
            <div class="textee">Créer Questions</div>
            <div class="icone"><img src="public/Icônes/ic-ajout.png"></div>
        </a>
    </div>
    <div class="interface">
        <?php
            if (isset($_GET['absa'])) {
                $url = $_GET['absa'];
                if ($url=="ListeQuestions") {
                    include ("listesQuestions.php");
                }
                 elseif ($url=="Inscription") {
                    include ("creerAdmin.php");
                }
                elseif ($url=="ListeJoueurs") {
                    include ("listeJoueurs.php");
                }
                elseif ($url=="CreerQuestions") {
                    include ("creerQuestions.php");
                }
            }
        ?>
    </div>

</div>

