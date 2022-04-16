<?php 
session_start();

if (isset($_SESSION['nom'])){ //il n'ya pas de saission //you can set ant columelse
   header('location:profile.php');
}


include "inc/functions.php";
$showRegistrationAlert = 0;
$categories = getAllCategory();

if(!empty($_POST)){ // click sur le button sauvgarder
   if (AddVisteur($_POST)){
    $showRegistrationAlert = 1;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.0/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--Start Navbar-->
    <?php
    include "inc/header.php";
    ?>
    <!--End Navbar-->
    <!--Form Start-->
     <div class="col-12 p-5">
         <h1 class="text-center">Registre</h1>
        <form action="registre.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email </label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nom</label>
              <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telephone</label>
                <input type="text" name="telephone" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Sauvegarder</button>
          </form>
     </div>
    <!--Form End-->
    <!--Footer Start-->
    <?php
      include "inc/footer.php";
    ?>
    <!--Footer End-->
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.0/sweetalert2.all.min.js" integrity="sha512-oTE6Gwi026OvpTsIUmeIA4+Q3DfI/m0ejEbpd1+qDxngi14bMVH249Z5UJVvKSHeSDmlBtmhtRB+HXySaSCp9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
if($showRegistrationAlert == 1){
    print "
    <script>
    Swal.fire({
      title: 'Success!',
      text: 'Creation de compte avec success',
      icon: 'success',
      confirmButtonText: 'ok',
      timer : 2000
    })
    </script>
    ";
}

?>

</html>