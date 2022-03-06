<?php 

include "inc/functions.php";
$categories = getAllCategory();

if (isset($_GET['id'])) {
    $produit = getProduitById($_GET['id']);
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!--Start Navbar-->
     <?php
     include "inc/header.php";
     ?>
    <!--End Navbar-->
    <!--Cards Start-->
    <div class="row col-12 mt-4">

        <div class="card col-8 offset-2">
            <img src="images/<?php echo $produit['image'] ;?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $produit['nom'] ?></h5>
                <p class="card-text"><?php echo $produit['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $produit['prix'] ?> DT</li>

                <?php
                     foreach($categories as $index => $c){
                         if($c['id'] == $produit['categorie']){
                             print '<li class="list-group-item">'. $c['nom'] .'</li>';
                         }
                     }

                ?>
                
            </ul>
            <div class="col-12 m-2">
                <form action="actions/commander.php" method="POST" class="d-flex">
                    <input type="hidden" value="<?php echo $produit['id'] ?>" name="produit">
                    <input type="number" name="quantite" class="form-control mt-3" step="1" placeholder="Quantite du produit ....">
                    <button type="submit" class="btn btn-primary mt-3">Commander</button>
                </form>
            </div>

        </div>


    </div>
    <!--Cards End-->
    <!--Footer Start-->
    <div class="bg-dark text-center p-4 mt-5">
        <p class="text-white">All rights reserved @2022 spark X</p> 
    </div>
    <!--Footer End-->
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>