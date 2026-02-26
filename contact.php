<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "voyage";
    $conn = mysqli_connect($hostname, $username, $password, $database);

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['email'];
    $message = $_POST['message'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO contact VALUES ('','$nom', '$prenom', '$mail','$message','$date')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<h1>Message envoyer avec succès</h1>";
        echo "<p>Nom: $nom</p>";
        echo "<p>Prénom: $prenom</p>";
        echo "<p>Email: $mail</p>";
        echo "<p>Message: $message</p>";
        echo "<p>Date: $date</p>";
        echo "<p>Merci de votre message !</p>";
    } else {
        echo "<h1>Erreur lors de l'envoie du message</h1>";
    }
?>