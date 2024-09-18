<?php
include 'conx.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insertion des données dans la base de données
    $sql = "INSERT INTO contact (nom, email, message) VALUES ('$name', '$email', '$message')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo '<script>';
        echo 'alert("Message envoyé avec succès.");';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("Échec de l\'envoi du message.");';
        echo '</script>';
    }
}
?>
