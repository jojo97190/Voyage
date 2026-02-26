<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="Accueil.css">
</head>
<body>
    <!-- https://coolors.co/palette/ff9f1c-ffbf69-ffffff-cbf3f0-2ec4b6 couleur du site  -->
    <nav>
    <ul> <!--Logo menant à la page d'accueil-->
        <li><a href="index.php"><img src="logo.png" alt="Logo" class="nav-logo" ></a></li>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="voyage.php">Nos Voyages</a></li>
        <li><a href="Reservation.html">Réservation</a></li>
        <li><a href="contact.html">Contactez-nous</a></li>
    </ul>    
    </nav>
   
    <h1 class="titre2">  Bienvenue à Karukera travel </h1>
    <p class="paragraphe">Découvrez les plus belles destinations à travers le monde
    Réservez votre voyage dès maintenant !
    Nous vous proposons des voyages inoubliables à travers le monde.</p>
   
    
    
    <div class="carousel">
        <div class="carousel-images">
            <a><img src="Paris.jpg" alt="Paris" class="img-caroussel"></a>
            <a><img src="Tokyo.jpg" alt="Tokyo" class="img-caroussel"></a>
            <a><img src="Londre.jpg" alt="Londre" class="img-caroussel"></a>
            <a><img src="Sydney.jpg" alt="Sydney" class="img-caroussel"></a>
            <a><img src="Rome.jpg" alt="Rome" class="img-caroussel"></a>
            <a><img src="barcelone.jpg" alt="Barcelone" class="img-caroussel"></a>
        </div>
    </div>
    
    
    
    
    <h1 class="titre">Commentaire des clients</h1>
    <?php
    $nom_serveur = "localhost";
    $nom_utilisateur = "root";
    $password = "";
    $nom_base = "voyage";
    $connexion = mysqli_connect($nom_serveur,$nom_utilisateur, $password,$nom_base );

    $avis = " SELECT avis.date_avis,avis.note,destination.nom, avis.commentaire
                FROM avis
                JOIN destination ON destination.id_destination = avis.id_destination";
    $utilisateur = "SELECT utilisateur.nom FROM utilisateur";
    $resultat = mysqli_query($connexion,$avis);
    $resultat2 = mysqli_query($connexion,$utilisateur);
    $row = mysqli_fetch_assoc($resultat);
    $row2 = mysqli_fetch_assoc($resultat2);

    echo "<table>
    <tr>
    <th>Date</th>
    <th>Nom</th>
    <th>Note</th>
    <th>Destination</th>
    <th>Avis</th>
    </tr>";
    while($row = mysqli_fetch_assoc($resultat) and $row2 = mysqli_fetch_assoc($resultat2)) {
        echo "<tr>";
       echo "<td>" . $row['date_avis'] . "</td>";
        echo "<td>" . $row2['nom']. "</td>";
        echo "<td>" . $row['note'] . "</td>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['commentaire'] . "</td>";
        
    }
    echo "</table>";
    ?>
</body>

<!--Paris:<a><img src="https://i.ibb.co/FkmhP4W6/download.jpg" alt="Paris" border="0"></a>
Tokyo:<a><img src="https://i.ibb.co/sd6GK9bj/download.jpg" alt="Tokyo" border="0"></a>
Londre : <a><img src="https://i.ibb.co/rR5NFfjL/download.jpg" alt="Londre" border="0"></a>
Sydney : <a><img src="https://i.ibb.co/nsRL89ZY/download.jpg" alt="Sydney" border="0"></a>
Rome :<a><img src="https://i.ibb.co/Jw0H5Rtm/download.jpg" alt="Rome" border="0"></a>
Barcelone :<a><img src="https://i.ibb.co/BVmvc3nt/download.jpg" alt="Barcelone" border="0"></a>-->

