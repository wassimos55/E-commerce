

<?php 
session_start();
//test user connectee

  
  // selectionner le produit avec leur id
  include "../inc/functions.php";
  
  // connexion bd
   
  $conn = connect();
 
$id = $_GET['id'];
//var_dump($_SESSION['panier'][3][$id]);
$quantite = $_GET['quantite'];
//echo $total;
$_SESSION['panier'][3][$id][0] = $quantite;

$id_produit = $_SESSION['panier'][3][$id][4] ;
// //requette

$requette = "SELECT prix FROM produits WHERE id='$id_produit'"; 
//execution requette 

$resultat = $conn->query($requette);

$price = $resultat->fetch();


$total = $quantite * $price['prix'];

$_SESSION['panier'][3][$id][1] = $total;






header("location:../panier.php");
 ?>
