<?php
   session_start();  
   
   include "../../inc/functions.php";
   $stocks = getStocks();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ADMIN : Stocks</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="../../js/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../../deconnexion.php">Deconnexion</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <?php  include "../template/navigation.php"; ?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stocks des produits</h1>

 
      </div>
    
      <!--Start List-->
      <div>
        <table class="table">


            <?php if (isset($_GET['modif']) && $_GET['modif'] == "ok"){
               print '
                <div class="alert alert-success">
                    Stock Modifi??e avec success
                </div>
               ';
            }  
            ?>

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de produit</th>
                <th scope="col">Quantite</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                   $i=0;
                   foreach($stocks as $s){
                       $i++;
                       print '
                       <tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$s['nom'].'</td>
                            <td>'.$s['quantite'].'</td>
                            <td>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#editModal'.$s['id'].'">Modifier</a>
                              
                            </td>
                        </tr>
                       ';
                   }
                ?>



            </tbody>
          </table>  
         

      </div>
      <!--End List-->

      
   
    </main>
  </div>
</div>



<?php
  foreach($stocks as $index => $stock){ ?>

    <!-- Modal Modifier  -->
    <div class="modal fade" id="editModal<?php echo $stock['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifier Stock du  <span class="text-primary"> <?php echo $stock['nom'];  ?></span></h5>
            <button type="button" class="btn" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="modifier.php" method="post">
                <input type="hidden" value="<?php echo $stock['id'] ;?>" name="idstock" />
                <div class="form-group">
                  <input type="number" step="1" name="quantite" class="form-control" value="<?php echo $stock['quantite']; ?>" placeholder="Stock du produit...">
                </div>          
          </div>
          <div class="modal-footer">
          
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
          </form>
        </div>
      </div>
    </div>


<?php
  }
?>


<script src="../../js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../../js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<script>
   $('#addform').submit(function(){
     if($('#nom').val() == ""){
       $('#blocknom').append('<p style="color:red;">il faut remplir le champ nom ...</p>');
       return false;
     }
   })
</script>

  </body>
</html>
