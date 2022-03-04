<?php
session_start();
//1- recuperation des donnes de la formulaire
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];


//2- la chaine de connexion
include "../../inc/functions.php";
$conn = connect();

//3- creation de la requettes


$requette = "UPDATE stocks SET quantite='$quantite' WHERE id='$id'";

//4- execution de la requettes

$resultat = $conn->query($requette);

if ($resultat) {
    header('location:liste.php?modif=ok');
}


?>