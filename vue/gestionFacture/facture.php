<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Tableau de Bord</title>
    

    <!-- Bootstrap core CSS -->
<!-- <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->


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
    <link href="../../static/css/style.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-light" href="#"><img src="../../static/img/logo ACS.png" alt="logo"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 col-md-3 " type="text" placeholder="Search" aria-label="Search">
  <div class="navbar navbar-expand-lg col-md-6" style=" font-weight: bold;">
    <a class="nav-link"  href="#">Home</a>
    <a class="nav-link" href="#">Services</a>
    <a class="nav-link" href="#">Partener</a>
    <a class="nav-link offset-3" href="#">Sign out</a>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-5">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Tableau de Bord
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionProduit/produit.php">
              <span data-feather="shopping-cart"></span>
              Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionClient/client.php">
              <span data-feather="users"></span>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionEmployers/employer.php">
              <span data-feather="bar-chart-2"></span>
              Personnel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionFacture/Facture.php">
              <span data-feather="layers"></span>
              Factures
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionComptabilite/caisse.php">
              <span data-feather="layers"></span>
              Comptabilite
            </a>
          </li>
        </ul>

      </div>
    </nav>
    <main class=" container all-content-wrap" style="margin-left: 220px;"> 
    <?php
include ('../../model/bd.php');
?>
<!-- Formulaire commande -->
<div class="container">
    <h4 class="p-4"> formulaire de Facture:</h4>
  <form class="insert-form p-4" method="POST" action="../../controlleur/traitementFacture.php" enctype="multipart/form-data">
    <div class="input-field">
              <div class="row">
              <div class="col-4 input-group"><?php
                    $query1 = "SELECT nom,id FROM client GROUP BY id";
                    $result = $conn-> query($query1);
                    ?>
                      <select class="form-control" name="client" required >
                            <option value="0">Client</option><?php
                            while($row = $result->fetch_assoc()){?>
                                  <option value="<?=$row['id']?>"><?=$row['nom']?></option>
                            <?php } ?>
                      </select>
                      <a href="../gestionClient/client.php"><button class="btn btn-success input-group-text" style="font-weight: bold;">Nouveau</button></a>
                  </div>
                  <div class="col-2 input-group mb-3 ">
                    <label class="input-group-text" style="font-weight: bold;">TVA</label>
                   <input type="number" class="form-control" name="tva" required placeholder="18%"> 
                  </div>
                  <div class="col-4 label ">FACTURE:
                        <input type="radio" id="definitive" name="facture" value="1"  > DEFINITIVE
                        <input type="radio" id="proforma" name="facture" value="0" checked class="ml-2"> PROFORMA
                  </div>
              </div>    
        <table class="table table-bordered" id="table-field"> 
            <tr>
                <th>Produit</th>
                <th>Quantite</th>
                <th>Prix</th>
                <th><input type="button" name="add"  id="add" title="Ajouter une nouvelle ligne" class="btn btn-warning" value="+"></th>
            </tr>
            <tr>
                <td><?php $query1 = "SELECT nomProduit,id FROM produit GROUP BY id"; 
                $result = $conn-> query($query1); ?>
                  <select class="form-control" name="produit[]" required>
                            <option>Choisir un produit</option>
      <?php while($row = $result->fetch_assoc()){?><option value="<?=$row['id']?>"><?=$row['nomProduit']?></option><?php } ?>
                        </select>
                </td>
                <td> <input class="form-control" name="qte[]" type="number" min="0" required></td>
                <td> <input class="form-control" name="prix[]" type="number" min="0"  required></td>
                <td><input type="button" name="retirer"  id="retirer" title="Retirer cette ligne" class="btn btn-danger"  value="x"></td>
            </tr>
        </table>
        <center>
        <button class="btn btn-success" name="save">Generer la facture</button>
        </center>
    </div>  
  </form>     
</div>  
      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->      
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->
  <script type="text/javascript">
  
          $(document).ready(function(){
            var ligne = '<tr>';
            ligne +='<td><?php $query1 = "SELECT nomProduit,id FROM produit GROUP BY id"; $result = $conn-> query($query1);?><select class="form-control" name="produit[]" required><option>Choisir un produit</option><?php while($row = $result->fetch_assoc()){?><option value="<?=$row['id']?>"><?=$row['nomProduit']?></option><?php } ?></select></td>';
            ligne += '<td> <input class="form-control" name="qte[]" type="number" min="0"  required></td>';
            ligne += '<td><input class="form-control" name="prix[]" type="number" min="0" required></td>';
            ligne += ' <td><input type="button" name="retirer"  id="retirer" title="Retirer cette ligne" class="btn btn-danger" value="x"></td>';
            ligne += '</tr';
            $("#add").click(function(){
            $("#table-field").append(ligne);
            });
            $("#table-field").on('click','#retirer',function(){
              $(this).closest('tr').remove();
              alert("La ligne va etre supprimée")
            });
          });
  </script>
  </body>
</html>

