<?php 
session_start();
//test user connectee

if(!isset($_SESSION['nom'])){  //itha ken nom mouch mawjoud wela ay variable isset=mawjoud // ya3ni user non connecter
  header('location:../connexion.php');
  exit();
}

//var_dump($_POST);

$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];

// selectionner le produit avec leur id
include "../inc/functions.php";

// connexion bd

$conn = connect();

//requette

$requette = "SELECT prix FROM produits WHERE id='$id_produit'"; 
//execution requette 

$resultat = $conn->query($requette);

$produit = $resultat->fetch();

$total = $quantite * $produit['prix'];

$date = date("Y-m-d"); 

//Ajouter commande
//requette

$requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total',0,'$date','$date','$id_produit')"; 
//execution requette 

$resultat = $conn->query($requette);

?>