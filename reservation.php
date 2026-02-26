<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>réservation</title>
</head>
<body>
    <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "voyage";
        $conn = mysqli_connect($hostname, $username, $password, $database);
        $util = "";
        $id_voyage = "";
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['email'];
        $destination = $_POST['destination'];
        $depart = $_POST['date'];
        $retour = $_POST['date-retour'];
        $date = date("Y-m-d");
        $sql_util = "SELECT * FROM utilisateur WHERE email = '$mail'";
        $result_util = mysqli_query($conn, $sql_util);
        if (mysqli_num_rows($result_util) > 0) {
            $row_util = mysqli_fetch_assoc($result_util);
            $util = $row_util['id_utilisateur'];
        } 
        $sql_voyage = "SELECT * FROM voyage
        JOIN destination ON voyage.id_destination = destination.id_destination";
        $result_voyage = mysqli_query($conn, $sql_voyage);
        if (mysqli_num_rows($result_voyage) > 0) {
            $row_voyage = mysqli_fetch_assoc($result_voyage);    
            $id_voyage = $row_voyage['id_voyage'];
            while ($row_voyage = mysqli_fetch_assoc($result_voyage)) {
                if ($destination == $row_voyage['id_destination']) {
                    $id_voyage = $row_voyage['id_voyage'];
                }
            }
        }
        $sql = "SELECT * FROM voyage 
        JOIN reservation ON voyage.id_voyage = reservation.id_voyage 
        JOIN destination ON voyage.id_destination = destination.id_destination 
        JOIN activité ON destination.id_destination = activité.id_destination
        JOIN utilisateur ON reservation.id_utilisateur = utilisateur.id_utilisateur
        JOIN avis ON avis.id_utilisateur = utilisateur.id_utilisateur";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $email_utilisateur = $row['email'];
            if($email_utilisateur == $mail){
                $util = $row['id_utilisateur'];
                $voyage = $row['id_voyage'];
            }
        }
        if($result){
            echo "<h1>Réservation réussie</h1>";
            echo "<p>Nom: $nom</p>";
            echo "<p>Prénom: $prenom</p>";
            echo "<p>Email: $mail</p>";
            echo "<p>Destination: $destination</p>";
            echo "<p>Date de départ: $depart</p>";
            echo "<p>Date de retour: $retour</p>";
            echo $date;
            echo "<p>Réservation effectuée avec succès.</p>";
            echo "<p>Merci de votre réservation !</p>";
            $ajout_reserv="INSERT INTO reservation VALUES('',$util,$id_voyage,'$date','')";
            mysqli_query($conn, $ajout_reserv);
        } 
    ?>    
</body>
</html>
