<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<title>Pré - Inscription </title>

<link rel="stylesheet" type="text/css" href="inscriStyle.css">


</head>


<body>
 
<form class="container" method="POST" name="f" id="inscF">
   <div class="cap"> <caption >Step into the Artisia World <br> Begin Your Creative Journey Here!</caption> </div>

<div class="right">

<label for="nom">Nom :</label>
<input type="text" id="nom" name="nom" required>

<label for="prenom">Prénom :</label>
<input type="text" id="prenom" name="prenom" required>


<label for="tel">Téléphone :</label>
<input type="tel" id="tel" name="tel" required>

<label for="mail">E-mail :</label>
<input type="email" id="mail" name="mail" required>
</div>
<div class="left">
<label for="branches">Branches :</label>
<select id="branches" name="branches" onchange="showPriceField()" required>
<option value="">Choisir une branche</option>
<option value="peinture">Peinture</option>
<option value="dessin">Dessin</option>
<option value="sculpture">Sculpture</option>
<option value="gravure">Gravure</option>
<option value="art-textile">Art Textile</option>
<option value="diy">DIY</option>
</select>

<label>Fréquence :</label>
<div class="radio-group">
<p><input type="radio" name="frequency" value="everyday" onchange="showPriceField()" required> Tous les jours</p>
<p><input type="radio" name="frequency" value="weekends" onchange="showPriceField()" required> Weekends</p>
<p><input type="radio" name="frequency" value="per-session" onchange="showPriceField()" required> Par session</p>
</div>

<label for="price" id="priceLabel" style="display: none;">Prix :</label>
<input type="text" id="price" name="price" style="display: none;" readonly>

<label for="message">Commentaire :</label>
<textarea id="message" name="message" rows="3"></textarea>

<div class="btn-group">
<button type="reset" onclick="return confirmReset()">Annuler</button>
<button type="submit" name="submit"  onclick="return validateForm()">Inscrire</button>
</div>

</div>

</form>

<div class="bottom">
    <a href="index.html" style="color: white;" >Artisia.com</a>
</div>

<script type="text/javascript" src="inscritjs.js"></script>

</body>
</html>

<?php
include 'conx.php';


if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $email = $_POST['mail'];
    $branches = $_POST['branches'];
    $frequency = $_POST['frequency'];
    $message = $_POST['message'];
    $price = $_POST['price'];

    // Check if the data already exists in the database
    $checkQuery = "SELECT * FROM pre_inscrit WHERE email='$email' and nom='$nom'  and prenom='$prenom'  and telephone='$tel' ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Data already exists, show error message
        echo '<script>';
        echo 'swal({
                title: "Error",
                text: "You have already filled the form before.",
                icon: "error",
                });';
        echo '</script>';
    } else {
        // Data doesn't exist, proceed with insertion
        $sql = "INSERT INTO pre_inscrit (nom, prenom, telephone, email, branche, frequance, prix, commentaire) VALUES ('$nom', '$prenom', '$tel', '$email', '$branches', '$frequency', '$price', '$message')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            // Insertion successful, show success message
            echo '<script>';
            echo 'swal({
                    title: "Success",
                    text: "Welcome to Artisia ! ",
                    icon: "success",
                    });';
            echo '</script>';
        } else {
            // Insertion failed, show error message
            echo '<script>';
            echo 'swal({
                    title: "Error",
                    text: "Failed to register",
                    icon: "error",
                    });';
            echo '</script>';
        }
    }
}
?>
