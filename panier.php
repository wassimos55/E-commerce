<?php 
session_start();
//var_dump($_SESSION['panier']);
$total = 0;



include "inc/functions.php";
$categories = getAllCategory(); 

if(!empty($_POST)){ //button search clicked
    //echo "button search clicked";
    //echo $_POST['search'];
    $produits = seaechProduits($_POST['search']);
}else{ 
    $produits = getAllProducts();
}


$commandes = array();//bech ma tjinich el error
if(isset($_SESSION['panier'])){
    if(count($_SESSION['panier'])>0){
        $commandes = $_SESSION['panier'][3];
    }
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
    <div class="row col-12 mt-4 p-5">
        <h1>Panier Utilisateur</h1>
        <!--Tabel Start-->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Produit</th>
                <th scope="col">Quantite</th>
                <th scope="col">Total</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   foreach($commandes as $index=>$commande){
                       print ' 
                        <tr>
                            <th scope="row">'.($index+1).'</th>
                            <td>'.$commande[5].'</td>
                            <td> <form action="actions/update.php" method="GET">  
                            <input type="hidden" name="id" value="'.$index.'"/> 
                            <input type="number" class="form-control" value="'.$commande[0].'"  name="quantite"/>
                              <button type="submit" class="btn btn-primary"> Update</button>
                            </form> </td>
                            <td>'.$commande[1].' DT</td>
                           <td><a href="actions/enlever-produit-panier.php?id='.$index.'" class="btn btn-danger">Supprimer</a></td> 
                        </tr>
                       '
                       
                       ;
                       if(isset($_SESSION['panier'])){
                        $total +=  $commande[1];
                        }
                   }
                ?>
            </tbody>
            </table>
        <!--Tabel End-->
        <?php
            

        ?>    
            <div class="text-end mt-3">
                <h3>Total : <?php echo $total; ?> DT</h3>
                <hr>
                <a href="actions/valider-panier.php" class="btn btn-success" style="width:100px">Valider</a>
            </div>


    </div>
    <!--Cards End-->
    <!--Footer Start-->
    <?php
      include "inc/footer.php";
    ?>
    <!--Footer End-->
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>