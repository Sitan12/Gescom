<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['username'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: ../../index.php');
  exit();
}
?>

<!-- ******************************************************************************************************* -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Tableau de Bord</title>
    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
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
    <link href="../../dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-Color: #32459D;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 text-center px-3 bg-light" href="#"><img src="../../static/img/logo ACS.png" width="80" alt="logo"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar navbar-expand-lg col-md-6" style=" font-weight: bold;">
    <a class="nav-link" href="../../../index.php" style="color: white;">ACS-Accueil</a>
    <a class="nav-link" href="../../../produit.php" style="color: white;">ACS-Produits</a>
    <a class="nav-link" href="../../deconnexion.php" style="color: white;"><i class="fas fa-power-off"></i> Deconnexion</a>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-4">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../dashboard.php">
              <span data-feather="home"></span>
              Tableau de Bord
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionProduit/produit.php">
              <span data-feather="shopping-cart"></span>
              <i class="fab fa-product-hunt"></i> Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionClient/client.php">
              <span data-feather="users"></span>
              <i class="fas fa-user-alt"></i> Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionEmployers/employer.php">
              <span data-feather="bar-chart-2"></span>
              <i class="fas fa-user-friends"></i> Personnel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionFacture/facture.php">
              <span data-feather="layers"></span>
              <i class="fas fa-file-invoice"></i> Factures
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="layers"></span>
              <i class="fas fa-calculator"></i> Comptabilite
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../gestionComptabilite/caisse.php">CAISSE</a></li>
            <li><a class="dropdown-item" href="../gestionComptabilite/banque.php">BANQUE</a></li>
          </ul>
          </li>
        </ul>

      </div>
    </nav>

    <main class=" container p-5 all-content-wrapper" style="margin-left: 220px;">
     
            <div class="container-fluid">
              <!-- ajouter un depense -->
                <form class="card p-4 bg-light" method="POST" action="../../controlleur/TraitementBanque.php" enctype="multipart/form-data">
                    <h3 class="card p-1 text-center" style="background-color:#32459D; color:white" ><i class="fas fa-coins"></i> Gestion de la BANQUE</h3>
                        <div class="row justify-content-center" >
                         <h4 class="p-2">Veuillez Renseigner ces champs pour effectuer un enregistrement de la banque.</h4>
                          <div class="col-md-6 card">
                               Nature: <input type="text" class="form-control" name="nature" placeholder="Donnez le motif" required>
                                <label >Montant Debité</label>
                                <input type="number" class="form-control mb-3" min="0" name="montantD" placeholder="Indiquez le montant debitée" required>  
                                <label >Montant Versée</label>
                                <input type="number" class="form-control mb-3" min="0" name="montantV" placeholder="Indiquez le montant versée" required>
                                <label >Banque et Etat</label>
                                <input type="text" class="form-control mb-3" name="etat">  
                                <label >Numéro Pièces</label>
                                <input type="number" class="form-control mb-3" min="0" name="numeroP" placeholder="Indiquez le numéro de pièce">
                                <input type="submit" name="enregistrer" class="btn btn-success mb-3" value="Enregistrer">
                        </div>
                </form>
                <!-- Mouvement de la caisse dans la journee -->
          <?php 
          include ('../../model/bd.php');
                $date=date('Y-m-j');
               // Récupère la recherche
           if(isset($_POST['recherche'])){
            $recherche = $_POST['recherche'];
            // la requete mysql
          $sql = "SELECT * FROM banque
                  WHERE dateB LIKE '%$recherche%'
                  LIMIT 10";
            $result = $conn-> query($sql);
          }else{
               // ---------------------- liste des produits--------------------------
                $sql = "SELECT * FROM banque  ORDER BY id
                LIMIT 10";
                $result = $conn-> query($sql);
          }
              ?>
            <div class="row p-4 mt-3 card bg-light" >
                <div class="row"> 
                          <h4 class="col-md-6" style="font-style: italic;">Liste des enregistrement</h4>
                          <!-- ************Recherche**************** -->
                          <form method="POST" action="" class="input-group col-md-4 mb-3"> 
                            <input type="date" class="form-control " placeholder="Rechercher un enregistrement" name="recherche">
                            <!-- <i class="fas fa-search"></i> -->
                            <input type="submit" class="btn" value="Rechercher"> 
                          </form>
                       </div>
                      <table class="table table-bordered" >
                      <thead class="text-uppercase text-center" >
                          <th>date</th>
                          <th >nature</th>
                          <th >montant debitee</th>
                          <th>montant versee</th>
                          <th >banque et etat</th>
                          <th >numero pieces</th>
                      </thead>
                      <tbody> <?php
                      while($row = $result->fetch_assoc()){?>
                      <tr align="center">
                          <td ><?=$row['dateB']?></td>
                          <td ><?=$row['nature']?></td> 
                          <td ><?=$row['montantD']?></td> 
                          <td ><?=$row['montantV']?></td>
                          <td ><?=$row['etat']?></td>  
                          <td ><?=$row['numeroPiece']?></td>
                          <td>
                              <a href="show.php?id=<?=$row['id']?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          </td>
                          </tr> 
                        <?php
                      }
                      ?>
                  </tbody>
                  </table>
            </div>      
    </main>
  </div>
</div>
<footer class="footer py-3 fixed-bottom" style="background-Color: #32459D;">
                <div class="container">
                    <span class="text-white offset-md-5">Copyright @ 2021 ACS-froid Tous droits réservés</span>
                  </div>
            </footer>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    
    </body>
</html>

 
 
 
 
 
 
 
 
 