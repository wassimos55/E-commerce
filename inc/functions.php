<?php

function getAllCategory(){
        // 1 - connexion vers la BD
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
            // 2- Creation de la requette
            $requette = "SELECT * FROM produits";
    
            // 3- exection de la requette pour
            $resultat = $conn->query($requette);
    
            // 4- resultat de requette
            $produits = $resultat->fetchAll();
            
            //var_dump($categories);
    
            return $produits;

}

?>