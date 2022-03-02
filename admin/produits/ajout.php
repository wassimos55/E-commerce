<?php
session_start();
//1- recuperation des donnes de la formulaire

$nom = $_POST['nom'];


$description = $_POST['description'];


$prix = $_POST['prix'];

$createur = $_POST['createur'];

$categorie = $_POST['categorie'];

//Upload Image
$target_dir = "../../images/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["image"]["name"]);


if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }


 $date = date('Y-m-d');



//2- la chaine de connexion
include "../../inc/functions.php";
$conn = connect();






try {

    //3- creation de la requettes


    $requette = "INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation) VALUES('$nom','$description','$prix','$image','$createur','$categorie','$date')";

    //4- execution de la requettes

    $resultat = $conn->query($requette);

    if ($resultat) {
        header('location:liste.php?ajout=ok');
    }

} catch(PDOException $e) {
   // echo "Connection failed: " . $e->getMessage();
  //echo $e->getcode(); //code =23000
  if($e->getcode() == 23000){
      //echo "cette nom de categorie existe deja";
      header('location:liste.php?erreur=duplicate');
  }
}


?>