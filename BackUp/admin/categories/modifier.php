<?php
session_start();
//1- recuperation des donnes de la formulaire
$id = $_POST['idc'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$date_modification = date("Y-m-d"); //"2022-02-12"

//2- la chaine de connexion
include "../../inc/functions.php";
$conn = connect();

//3- creation de la requettes


$requette = "UPDATE categories SET nom='$nom', description='$description',date_modification='$date_modification' WHERE id='$id'";

//4- execution de la requettes

$resultat = $conn->query($requette);

if ($resultat) {
    header('location:liste.php?modif=ok');
}


?>