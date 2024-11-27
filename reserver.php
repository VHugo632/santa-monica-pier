<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Métadonnées -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Hugo VILLER - MMI1 TD2 TP3">
        <meta name="description" content="Santa Monica Pier vous propose de réserver vos activités dès maintenant.">
        <meta name="keywords" content="Santa Monica Pier, Los Angeles, Californie, États-Unis, plage, réservation, formulaire">
        <link rel="icon" href="icones/favicon.png" type="image/png">
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <title>Réserver - Santa Monica Pier</title>
    </head>
    <body>
        <!-- Header -->
        <header>
            <!-- Barre de navigation -->
            <nav>
                <ul>
                    <li><a href="#"><img src="icones/logo.svg" alt="Logo du Santa Monica Pier"></a></li>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="histoire.html">Histoire</a></li>
                    <li><a href="activites.html">Activités</a></li>
                    <li><a href="culture.html">Culture</a></li>
                    <li><a id="current" href="#">Réserver</a></li>
                </ul>
            </nav>
            <!-- Image en arrière-plan -->
            <img src="photos/reserver/photo_header.jpg" alt="Photo d'une salle de restaurant au Santa Monica Pier">
            <!-- Icône de flèche -->
            <a href="#main"><img src="icones/icone_fleche.png" alt="Flèche dirigée vers le bas"></a>
        </header>
        <main id="main">
            <section class="reservation">
                <div>
                    <h2>Besoin de reserver ?</h2>
                    <div class="line"></div>
                    <!-- Formulaire -->
                    <form method="post" action="traitement.php">
                        <div>
                            <input type="text" name="nom" placeholder="Nom" minlength="3" required="required">
                            <input type="text" name="prenom" placeholder="Prénom" minlength="3" required="required">
                        </div>
                        <div>
                            <input type="email" name="mail" placeholder="Adresse e-mail" required="required">
                            <input type="tel" name="telephone" placeholder="Numéro de téléphone" pattern="[0]{1}[6-7]{1}[0-9]{8}" required="required">
                        </div>
                        <div>
                            <!-- On récupère la date et l'heure actuelle en PHP en les mettant en valeurs minimales du champ pour éviter que l'utilisateur puisse réserver à une date déjà passée (c'est juste une méthode de prévention, dans un contexte de sécurité, il faudrait vérifier les données en back-end) -->
                            <input type="datetime-local" name="jour" min="<?php echo(date("Y-m-d")."T".date("H:i")); ?>" required="required">   <!-- Le "T" est obligatoire car lors de la récupération de la valeur entrée dans ce champ en PHP, il permet de séparer la date et l'heure -->
                            <select name="activite" required="required">
                                <option value="">— Choisir une activité —</option>
                                <option value="pacific_park">Pacific Park</option>
                                <option value="playland_arcade">Playland Arcade</option>
                                <option value="merry_go_round">Merry go-round</option>
                                <option value="heal_the_bay">Heal the Bay</option>
                            </select>
                        </div>
                        <div>
                            <input id="conditions" type="checkbox" name="conditions" required="required">
                            <label for="conditions">J'accepte d'envoyer mes informations au service de réservation.</label>
                        </div>
                        <input type="submit" value="Réserver">
                    </form>
                </div>
                <img src="photos/reserver/photo_formulaire.jpg" alt="Photo d'une soirée au Santa Monica Pier">
            </section>
        </main>
        <footer>
            <!-- Footer -->
            <ul>
                <li><p>© 2023 Santa Monica Pier</p></li>
                <li><a href="#">Revenir en haut</a></li>
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