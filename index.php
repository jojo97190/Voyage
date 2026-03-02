<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="Accueil.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php"><img src="logo.png" alt="Logo" class="nav-logo"></a></li>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="voyage.php">Nos Voyages</a></li>
            <li><a href="Reservation.html">Réservation</a></li>
            <li><a href="contact.html">Contactez-nous</a></li>
        </ul>
    </nav>

    <main>
        <h1 class="titre2">Bienvenue à Karukera travel</h1>
        <p class="paragraphe">Découvrez les plus belles destinations à travers le monde.
        Réservez votre voyage dès maintenant !
        Nous vous proposons des voyages inoubliables à travers le monde.</p>

        <div class="carousel">
            <div class="carousel-images">
                <img src="Paris.jpg" alt="Paris" class="img-caroussel">
                <img src="Tokyo.jpg" alt="Tokyo" class="img-caroussel">
                <img src="Londre.jpg" alt="Londre" class="img-caroussel">
                <img src="Sydney.jpg" alt="Sydney" class="img-caroussel">
                <img src="Rome.jpg" alt="Rome" class="img-caroussel">
                <img src="barcelone.jpg" alt="Barcelone" class="img-caroussel">
            </div>
        </div>

        <h2 class="titre">Commentaires des clients</h2>
        <div class="table-wrapper">
        <?php
        $nom_serveur = "localhost";
        $nom_utilisateur = "root";
        $password = "";
        $nom_base = "voyage";
        $connexion = mysqli_connect($nom_serveur, $nom_utilisateur, $password, $nom_base);

        $avis = "SELECT avis.date_avis, avis.note, destination.nom, avis.commentaire
                 FROM avis
                 JOIN destination ON destination.id_destination = avis.id_destination";
        $utilisateur = "SELECT utilisateur.nom FROM utilisateur";
        $resultat = mysqli_query($connexion, $avis);
        $resultat2 = mysqli_query($connexion, $utilisateur);

        echo "<table>
        <tr>
        <th>Date</th>
        <th>Nom</th>
        <th>Note</th>
        <th>Destination</th>
        <th>Avis</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($resultat) and $row2 = mysqli_fetch_assoc($resultat2)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['date_avis']) . "</td>";
            echo "<td>" . htmlspecialchars($row2['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['note']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['commentaire']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        </div>
    </main>
</body>
</html>