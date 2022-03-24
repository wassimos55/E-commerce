<?php 
session_start();
//test user connectee

if(!isset($_SESSION['nom'])){  //itha ken nom mouch mawjoud wela ay variable isset=mawjoud // ya3ni user non connecter
  header('location:../connexion.php');
  exit();
}

// selectionner le produit avec leur id
include "../inc/functions.php";

// connexion bd
 
$conn = connect();

$visiteur = $_SESSION['id'];




// //var_dump($_POST);

$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];



// //requette

$requette = "SELECT prix, nom FROM produits WHERE id='$id_produit'"; 
//execution requette 

$resultat = $conn->query($requette);

$produit = $resultat->fetch();

$total = $quantite * $produit['prix'];

$date = date("Y-m-d"); 

if(!isset($_SESSION['panier'])){ //panier n'existe pas
  $_SESSION['panier']= array($visiteur, 0 ,$date , array()); //tableau thanya reserve lel commande  // creation de panier
}
$_SESSION['panier'][1] += $total;
$_SESSION['panier'][3][]= array($quantite, $total , $date , $date , $id_produit , $produit['nom']); //[] 5ater e type mta3a araay

/*echo "Panier <br/>";
var_dump($_SESSION['panier']); 
echo "Commande Panier <br/>";
var_dump($_SESSION['panier'][3]); 
exit;*/


// // creation de panier

// $requette_panier = "INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
// //execution requette_pannier 

// $resultat = $conn->query($requette_panier);

// $panier_id = $conn->lastInsertId();


// //Ajouter commande
// //requette

// $requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$id_produit')"; 
// //execution requette 

// $resultat = $conn->query($requette);

header('location:../panier.php');

?>