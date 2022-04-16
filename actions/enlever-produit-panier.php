<?php 

session_start();

$id = $_GET['id'];

//echo $id;
//var_dump Bech naffichi tableau

//var_dump($_SESSION['panier'][3][$id])

//var_dump($_SESSION['panier'][3]);
//unset tfase5li ligne ml commande

$total_enlever = $_SESSION['panier'][3][$id][1];
$_SESSION['panier'][1] = $_SESSION['panier'][1] - $total_enlever;


unset($_SESSION['panier'][3][$id]); 


//var_dump($_SESSION['panier'][3]);
  
header("location:../panier.php");
?>