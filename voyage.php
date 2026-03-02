<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0">
    <title>Nos Voyages</title>
    <link rel="stylesheet" href="voyage.css">
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
    

    <form action="voyage.php" method="post">
        <label>
            filtrer par prix : <input type="text">
            <button type="submit">filtrer</button>
        </label>
        <label>
            filtrer par le nom de la destination : <input type="text">
            <button type="submit">filtrer</button>
        </label>
        <label>
            filtrer par la date de départ : <input type="date">
            <button type="submit">filtrer</button>
        </label>
    </form>   
    <div class="table-wrapper"><table class="tableau">
        <thead>
            <tr class='entete'>
                <th>Destination</th>
                <th>Date de départ</th>
                <th>Prix</th>
            </tr>
        </thead>  
        <tbody>
            <?php
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $database = "voyage";
                $conn = mysqli_connect($hostname, $username, $password, $database);
                
                @$dateDep = $_POST['dateDep'];
                @$nomDest = $_POST['nomDest'];
                @$prix = $_POST['filtrerP'];
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT nom, date_depart, prix FROM voyage
                JOIN destination ON voyage.id_destination = destination.id_destination";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {       
                    $sqlDest ="SELECT nom, date_depart, prix FROM voyage
                    JOIN destination ON voyage.id_destination = destination.id_destination
                    WHERE nom = '$nomDest'";
                    $resultDest = mysqli_query($conn, $sqlDest);
                    if($nomDest != ""){
                        if (mysqli_num_rows($resultDest) > 0) {
                            while ($rowDest = mysqli_fetch_assoc($resultDest)) {
                                echo "<tr>";
                                echo "<td>" . $rowDest['nom'] . "</td>";
                                echo "<td>" . $rowDest['date_depart'] . "</td>";
                                echo "<td>" . $rowDest['prix'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>Aucune destination trouvée</p>";
                        }
                    }
                    if($prix != ""){
                        $sqlPrix = "SELECT nom, date_depart, prix FROM voyage
                        JOIN destination ON voyage.id_destination = destination.id_destination
                        WHERE prix <= '$prix'";
                        $resultPrix = mysqli_query($conn, $sqlPrix);
                        if (mysqli_num_rows($resultPrix) > 0) {
                            while ($rowPrix = mysqli_fetch_assoc($resultPrix)) {
                                echo "<tr>";
                                echo "<td>" . $rowPrix['nom'] . "</td>";
                                echo "<td>" . $rowPrix['date_depart'] . "</td>";
                                echo "<td>" . $rowPrix['prix'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>Aucun voyage trouvé</p>";
                        }
                    }
                    
                    if($dateDep != ""){
                        $sqlDep = "SELECT date_depart 
                        FROM voyage
                        WHERE date_depart = '$dateDep'";
                        $resultDep = mysqli_query($conn, $sqlDep);
                        if (mysqli_num_rows($resultDep) > 0) {
                            while ($rowDep = mysqli_fetch_assoc($resultDep)) {
                                echo "<tr>";
                                echo "<td>" . $rowDep['nom'] . "</td>";
                                echo "<td>" . $rowDep['date_depart'] . "</td>";
                                echo "<td>" . $rowDep['prix'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>Aucune date de départ trouvée</p>";
                        }
                    }    
                }else {
                    echo "<p>Aucun voyage trouvé</p>";
                }
            ?>
        </tbody>
    </table>
    </div>
    <!-- Conteneur parent pour les sections de destination -->
    <div class="container-destination">
        <!-- Paris --> 
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="Paris.jpg" alt="Paris"></a>
                <h1>Paris</h1>
            </div>
            <div class="toggle-content">
                <p>Paris, la ville lumière, est célèbre pour ses monuments emblématiques tels que la Tour Eiffel, le Louvre et la cathédrale Notre-Dame. Elle est également connue pour sa culture, sa gastronomie et son ambiance romantique.</p>
            </div>
        </section>
        
        <!-- Tokyo -->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="Tokyo.jpg" alt="Tokyo"></a>
                <h1>Tokyo</h1> 
            </div>
            <div class="toggle-content">
                <p>Tokyo, la capitale du Japon, est une métropole dynamique qui allie tradition et modernité. Elle est célèbre pour ses gratte-ciels, ses temples anciens, sa cuisine délicieuse et sa culture pop unique.</p>
            </div>            
        </section>

        <!-- Londres -->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="Londre.jpg" alt="Londres"></a>
                <h1>Londres</h1>
            </div>
            <div class="toggle-content">
                <p>Londres, la capitale du Royaume-Uni, est une ville cosmopolite riche en histoire et en culture. Elle est célèbre pour ses monuments emblématiques tels que le Big Ben, Buckingham Palace et le British Museum.</p>
            </div>
        </section>

        <!-- Sydney -->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="Sydney.jpg" alt="Sydney"></a>
                <h1>Sydney</h1>
            </div>
            <div class="toggle-content">
            <p>Sydney, la plus grande ville d'Australie, est célèbre pour son opéra emblématique, son port magnifique et ses plages de sable fin. C'est une destination prisée pour les amateurs de plein air et de culture.</p>
            </div> 
        </section>

        <!-- Rome -->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="Rome.jpg" alt="Rome"></a>
                <h1>Rome</h1>
            </div>
            <div class="toggle-content">
                <p>Rome, la capitale de l'Italie, est une ville chargée d'histoire et de culture. Elle est célèbre pour ses ruines antiques, ses églises baroques et sa délicieuse cuisine italienne.</p>
            </div>
        </section>

        <!-- Barcelone -->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="https://i.ibb.co/BVmvc3nt/download.jpg" alt="Barcelone"></a>
                <h1>Barcelone</h1>
            </div>
            <div class="toggle-content">
                <p>Barcelone, la capitale de la Catalogne, est célèbre pour son architecture unique, notamment les œuvres de Gaudí comme la Sagrada Família. La ville offre également de belles plages et une vie nocturne animée.</p>
            </div>
        </section>

        <!-- New York -->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="https://i.ibb.co/7g0J6qY/download.jpg" alt="New York"></a>
                <h1>New York</h1>
            </div>
            <div class="toggle-content">
                <p>New York, la ville qui ne dort jamais, est célèbre pour ses gratte-ciels emblématiques, ses musées de renommée mondiale et sa diversité culturelle. C'est une destination incontournable pour les amateurs de shopping et de culture.</p>
            </div>
        </section>

        <!--Berlin-->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="https://i.ibb.co/7JY0q2x/download.jpg" alt="Berlin"></a>
                <h1>Berlin</h1>
            </div>
            <div class="toggle-content">
                <p>Berlin, la capitale de l'Allemagne, est une ville dynamique connue pour son histoire riche, sa scène artistique florissante et sa vie nocturne animée. Elle est célèbre pour ses monuments historiques tels que la porte de Brandebourg et le mur de Berlin.</p>
            </div>
        </section>

        <!-- Moscou-->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a><img src="https://i.ibb.co/7JY0q2x/download.jpg" alt="Moscou"></a>
                <h1>Moscou</h1>
            </div>
            <div class="toggle-content">
                <p>Moscou, la capitale de la Russie, est une ville fascinante connue pour son histoire riche, ses monuments emblématiques tels que la cathédrale Saint-Basile et le Kremlin, ainsi que sa culture vibrante.</p>
            </div>
        </section>
        
        <!--Pékin-->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a ><img src="https://i.ibb.co/hRCZpMjc/download.jpg" alt="Pékin"></a>
                <h1>Pékin</h1>
            </div>
            <div class="toggle-content">
                <p>Pékin, la capitale de la Chine, est une ville riche en histoire et en culture. Elle est célèbre pour ses sites historiques tels que la Cité Interdite, la Grande Muraille et le Temple du Ciel.</p>
            </div>          
        </section>

        <!--Rio de Janeiro-->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a ><img src="https://i.ibb.co/7JY0q2x/download.jpg" alt="Rio de Janeiro"></a>
                <h1>Rio de Janeiro</h1>
            </div>
            <div class="toggle-content">
                <p>Rio de Janeiro, la célèbre ville brésilienne, est connue pour ses plages magnifiques, son carnaval coloré et son ambiance festive. Le Christ Rédempteur et le Pain de Sucre sont des sites emblématiques à ne pas manquer.</p>
            </div>    
        </section>
    
        <!--Le Caire-->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a ><img src="https://i.ibb.co/7JY0q2x/download.jpg" alt="Le Caire"></a>
                <h1>Le Caire</h1>
            </div>
            <div class="toggle-content">
                <p>Le Caire, la capitale de l'Égypte, est une ville fascinante connue pour ses pyramides emblématiques, son histoire ancienne et sa culture vibrante. Le musée égyptien abrite des trésors inestimables de l'Antiquité.</p>
            </div>            
        </section>

        <!--Bangkok-->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a ><img src="https://i.ibb.co/7JY0q2x/download.jpg" alt="Bangkok"></a>
                <h1>Bangkok</h1>
            </div>
            <div class="toggle-content">
                <p>Bangkok, la capitale de la Thaïlande, est une ville animée connue pour ses temples magnifiques, sa cuisine de rue délicieuse et sa vie nocturne animée. Le Grand Palais et le Wat Pho sont des sites incontournables.</p>    
            </div>
        </section>

        <!--Istanbul-->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a ><img src="https://i.ibb.co/7JY0q2x/download.jpg" alt="Istanbul"></a>
                <h1>Istanbul</h1>
            </div>
            <div class="toggle-content">
                <p>Istanbul, la plus grande ville de Turquie, est un carrefour culturel entre l'Orient et l'Occident. Elle est célèbre pour ses mosquées historiques, ses bazars animés et sa cuisine délicieuse.</p>
            </div>
        </section>

        <!--Los Angeles-->
        <section class="block-destination">
            <div class="toggle-header" onclick="toggleBlock(this)">
                <a ><img src="https://i.ibb.co/7JY0q2x/download.jpg" alt="Los Angeles"></a>
                <h1>Los Angeles</h1>
            </div>
            <div class="toggle-content">
                <p>Los Angeles, la ville des anges, est célèbre pour son industrie cinématographique, ses plages ensoleillées et sa culture diversifiée. Hollywood, Santa Monica et Venice Beach sont des destinations populaires.</p>
            </div>
    </section>
    </div>
   <script src="voyage.js"></script> 
</body>
</html>