<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<title>Formulaire d'inscription à l'événement</title>
<link rel="stylesheet" type="text/css" href="eventStyle.css">
</head>

<body>
<div class="container">
    <h2>Formulaire d'inscription à l'événement</h2>
    <form  method="post" >
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="mail">Email :</label>
        <input type="email" id="mail" name="mail" required>

        <label for="tel">Téléphone :</label>
        <input type="tel" id="tel" name="tel" required>

        <div class="checkboxes">
            <label><input type="checkbox" name="event1" id="event1">Éclats de Couleurs</label>
            <label><input type="checkbox" name="event2" id="event2">Palette en Plein Air</label>
            <label><input type="checkbox" name="event3" id="event3">Fil en Folie</label>
        </div>

        <div class="buttons">
            <input type="submit" name="submit" value="S'inscrire" onclick="validateForm(event)" >
            <input type="reset" value="Réinitialiser">
        </div>
    </form><br>
    <center><a href="index.html" style="text-decoration: none; color: black; font-weight: bold;">Artisia.com</a></center>
</div>

<script type="text/javascript" src="eventjs.js"></script>


</body>
</html>

<?php

    include 'conx.php';
    // Vérifier si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['mail'];
        $tel = $_POST['tel'];

        // Définir les valeurs par défaut des événements
        $event1 = isset($_POST['event1']) ? 'Choisi' : 'Il ne choisit pas';
        $event2 = isset($_POST['event2']) ? 'Choisi' : 'Il ne choisit pas';
        $event3 = isset($_POST['event3']) ? 'Choisi' : 'Il ne choisit pas';


        // Préparer la requête SQL d'insertion
        $sql = "INSERT INTO event (nom, prenom, email, telephone, event1, event2, event3) VALUES ('$nom', '$prenom', '$email', '$tel', '$event1', '$event2', '$event3')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            
            echo '<script>';
            echo 'swal({
                    title: "Success",
                    text: "Data inserted",
                    icon: "success",
                    });';
            echo '</script>';
        } else {
            
            echo '<script>';
            echo 'swal({
                    title: "Error",
                    text: "Failed to insert data",
                    icon: "error",
                    });';
            echo '</script>';
        }
}
?>

