<?php
session_start();

include "../inc/functions.php";

// connexion bd
 
$conn = connect();

//id visiteur 
$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('Y-m-d');

// creation de panier

$requette_panier = "INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
//execution requette_pannier 

$resultat = $conn->query($requette_panier);

$panier_id = $conn->lastInsertId();

$commandes = $_SESSION['panier'][3];

foreach($commandes as $commande){
      $quantite=$commande[0];
      $total=$commande[1];
      $id_produit=$commande[4];
     //Ajouter commande
     //requette
      
     $requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$id_produit')"; 

     //execution requette 

     $resultat = $conn->query($requette);
}

//supprimer le panier
$_SESSION['panier'] = null;
//redirection vers la page index
header('location:../index.php');


?>