<?php
# On enregistre toutes les données des champs du formulaire dans un fichier de sauvegarde
$names = ["nom", "prenom", "mail", "telephone", "jour", "activite"];
$data_file = fopen("data/data.txt", "a+");   # La permission "a+" permet de pouvoir lire un fichier et d'écrire dedans UNIQUEMENT à partir de la fin (le contenu est toujours ajouté à la suite)
for ($index = 0; $index < 6; $index = $index + 1) {
    if ($index == 5) {
        fwrite($data_file, $_POST[$names[$index]]."\r\n");  # L'expression "\r\n" permet de faire un retour à la ligne (il est équivalent à "\n")
    }
    else {
        fwrite($data_file, $_POST[$names[$index]]."|");     # On met des tirets verticaux "|" entre chaque donnée récupérée pour les rendre plus lisibles dans le fichier de sauvegarde
    }
}
fclose($data_file);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Métadonnées -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Hugo VILLER - MMI1 TD2 TP3">
        <meta name="description" content="Santa Monica Pier vous remercie d'avoir réservé.">
        <meta name="keywords" content="Santa Monica Pier, Los Angeles, Californie, États-Unis, remerciements, réservation, récapitulatif">
        <link rel="icon" href="icones/favicon.png" type="image/png">
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <title>Merci - Santa Monica Pier</title>
    </head>
    <body>
        <!-- Header -->
        <header id="header_traitement">
            <!-- Barre de navigation -->
            <nav>
                <ul>
                    <li><a href="index.html"><img src="icones/logo.svg" alt="Logo du Santa Monica Pier"></a></li>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="histoire.html">Histoire</a></li>
                    <li><a href="activites.html">Activités</a></li>
                    <li><a href="culture.html">Culture</a></li>
                    <li><a href="reserver.php">Réserver</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section id="donnees">
                <article>
                    <h1>Merci pour votre reservation</h1>
                    <div class="line"></div>
                    <p>Votre réservation a bien été prise en compte.<br>Retrouvez ci-dessous le récapitulatif de vos informations :</p>
                    <!-- Récapitulatif -->
                    <ul>
                        <?php
                        # On récupère les données et on les insère en tant qu'éléments d'une liste sans les modifier
                        echo("<li>".$_POST["prenom"]." ".$_POST["nom"]."</li>");
                        echo("<li>".$_POST["mail"]."</li>");
                        
                        # On ajoute des espaces tous les deux chiffres pour que le numéro de téléphone soit mieux lisible
                        echo("<li>".wordwrap($_POST["telephone"], 2, " ", true)."</li>");
                        
                        # On met en forme les données contenant le jour et l'heure de réservation pour les afficher d'une certaine manière
                        $jour = explode("T", $_POST["jour"]);   # On scinde la valeur grâce à la lettre "T" pour récupérer la date et l'heure séparément dans un tableau ($jour[0] = date / $jour[1] = heure)
                        echo("<li>".date("d/m/Y", strtotime($jour[0]))." à ".$jour[1]."</li>");     # Ici, en plus d'afficher les données dans une liste, on modifie le format de la date (on passe de "année-mois-jour" à "jour/mois/année")
                        
                        # On vérifie l'activité choisie par l'utilisateur, et on modifie sa mise en forme en retirant les "_" et en mettant des majuscules
                        if ($_POST["activite"] == "pacific_park") {
                            echo("<li>Pacific Park</li>");
                        }
                        elseif ($_POST["activite"] == "playland_arcade") {
                            echo("<li>Playland Arcade</li>");
                        }
                        elseif ($_POST["activite"] == "merry_go_round") {
                            echo("<li>Merry go-round</li>");
                        }
                        else {
                            echo("<li>Heal the Bay</li>");
                        }
                        # On aurait pu simplement insérer du PHP dans des balises <li> préalablement placées dans le HTML, mais cela aurait appellé le PHP plusieurs fois au lieu d'une seule
                        ?>
                    </ul>
                </article>
                <img src="photos/traitement/photo_principale.jpg" alt="Photo d'une table décorée dans un restaurant au Santa Monica Pier">
            </section>
        </main>
        <footer>
            <!-- Footer -->
            <ul>
                <li><p>© 2023 Santa Monica Pier</p></li>
                <li><a id="ancre_traitement" href="#">Revenir en haut</a></li>
                <li>
                    <div>
                        <a href="https://www.facebook.com/TheSantaMonicaPier" target="_blank"><img src="icones/icone_facebook.png" alt="Icône de Facebook"></a>
                        <a href="https://twitter.com/santamonicapier" target="_blank"><img src="icones/icone_twitter.png" alt="Icône de Twitter"></a>
                        <a href="https://www.instagram.com/santamonicapier/" target="_blank"><img src="icones/icone_instagram.png" alt="Icône d'Instagram"></a>
                        <a href="https://www.youtube.com/@ThePierChannel/featured" target="_blank"><img src="icones/icone_youtube.png" alt="Icône de YouTube"></a>
                    </div>
                </li>
            </ul>
            <p>+1 310-458-8900</p>
            <p>200 Santa Monica Pier, Santa Monica, CA 90401, États-Unis</p>
        </footer>
    </body>
</html>