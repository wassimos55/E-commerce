<?php

function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DBname ="ecommerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}

function getAllCategory(){
        // 1 - connexion vers la BD
        $conn = connect();
        // 2- Creation de la requette
        $requette = "SELECT * FROM categories";

        // 3- exection de la requette pour
        $resultat = $conn->query($requette);

        // 4- resultat de requette
        $categories = $resultat->fetchAll();
        
        //var_dump($categories);

        return $categories;
}


function getAllProducts() {
            // 1 - connexion vers la BD
            $conn = connect();
            // 2- Creation de la requette
            $requette = "SELECT * FROM produits";
    
            // 3- exection de la requette pour
            $resultat = $conn->query($requette);
    
            // 4- resultat de requette
            $produits = $resultat->fetchAll();
            
            //var_dump($categories);
    
            return $produits;

}

function seaechProduits($keywords){
                // 1 - connexion vers la BD
                $conn = connect();

                //2 - Creation de la requette 
                $requette = "SELECT * FROM produits WHERE nom LIKE '%$keywords%'";

                //3 - execution de la requette 
                $resultat = $conn->query($requette);

                //4 - resultat 

                $produits = $resultat->fetchAll();

                return $produits;
}

function getProduitById($id) {
    // 1 - connexion vers la BD 
    $conn = connect();

    // 2 - creation de la requettes
    $requettes = "SELECT * FROM produits WHERE id=$id";

    //3 - execution de la requette 
    $resultat = $conn->query($requettes);
    //4 - resultat 

    $produit = $resultat->fetch();
    
    return $produit;
}

function AddVisteur($data){
     // 1 - connexion vers la BD 
     $conn = connect();    
     $mphash = md5($data['mp']);
     $requette = "INSERT INTO visiteurs(nom,prenom,email,mp,telephone) VALUES('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mphash."','".$data['telephone']."')";

    $resultat = $conn->query($requette); 

    if ($resultat){
        return true;
    }else{
        return false;
    }
}

function ConnectVisiteur($data){
   $conn = connect();
   $email = $data['email'];
   $mp = md5($data['mp']);
   $requette = "SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp'";

   $resultat = $conn->query($requette);

   $user = $resultat->fetch();

   //var_dump($user);
   return $user;

   
}

function ConnectAdmin($data){
    $conn = connect();
    $email = $data['email'];
    $mp = md5($data['mp']);
    $requette = "SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";
 
    $resultat = $conn->query($requette);
 
    $user = $resultat->fetch();
 
    //var_dump($user);
    return $user;
 
    
 }




 function getAllUsers(){
    $conn = connect();

    $requette = "SELECT * FROM visiteurs WHERE etat=0";
 
    $resultat = $conn->query($requette);

    $users = $resultat->fetchAll();

    return $users;

 }
 function getStocks(){
    $conn = connect();

    $requette = "SELECT s.id,p.nom,s.quantite FROM produits p, stocks s WHERE  p.id = s.produit";
 
    $resultat = $conn->query($requette);

    $stocks = $resultat->fetchAll();

    return $stocks;
 }

 function getAllPaniers(){
    $conn = connect();

    $requette = "SELECT v.nom, v.prenom , v.telephone, p.total, p.etat, p.date_creation, p.id FROM paniers p, visiteurs v WHERE p.visiteur = v.id ";
 
    $resultat = $conn->query($requette);

    $paniers = $resultat->fetchAll();

    return $paniers;
 }
  
 function getAllCommandes() {
    $conn = connect();

    $requette = "SELECT p.nom , p.image , c.quantite , c.total , c.panier FROM commandes c , produits p WHERE c.produit = p.id ";
 
    $resultat = $conn->query($requette);

    $commandes = $resultat->fetchAll();

    return $commandes;
 }

 Function changerEtatPanier($data){
    $conn = connect();
    $requette = "UPDATE paniers SET etat='".$data['etat']."' WHERE id='".$data['panier_id']."'";
    $resultat = $conn->query($requette);
 }

?>