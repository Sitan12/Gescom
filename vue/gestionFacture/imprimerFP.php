<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Imprimer Facture Proforma ACS</title>
</head>
<body onload="window.print()">
<?php include('../../model/bd.php'); ?>
    <div class="container">
    <div class="row p-4">
            <div class="col-4">
                <img src="../../static/img/logo ACS.png" style="width: 50; height: 50;">
            </div>
            <div class="col-6">
            <h2 >ALLIANCE CUSTOMER SERVICE</h2>
            </div>
        </div>
        <hr>
        <h5 class="text-center p-2">FACTURE PROFORMA</h5>

        <!-- affichage de la facture -->
    <?php 
        $query1 = "SELECT * FROM factureproforma ";
        $result = $conn-> query($query1);
    ?>
    <div class="row ">
          <div class="col-3 offset-1">
              <table class="table ">
                      <tr style="font-weight: bold;">
                          <th>Date</th>
                          <th>Numero</th>
                      </tr>
                      <tr>
                      <td><?php $rst=$conn->query("SELECT dateFP FROM factureproforma ");
                              if($row=$rst->fetch_assoc()){
                                $date=$row['dateFP']; 
                              } echo $date ?></td>
                          <td>FP</td>
                      </tr>
              </table>
          </div>
          <div class="col-3 offset-4">
              <table class="table ">
                      <tr style="font-weight: bold;">
                          <th>Destinataire</th>
                      </tr>
                      <tr>
                          <td><?php $rst=$conn->query("SELECT nom FROM client INNER JOIN facturedefinitive ON client.id = facturedefinitive.client");
                              if($row=$rst->fetch_assoc()){
                                $nom=$row['nom']; 
                              } echo $nom ?></td>
                      </tr>
              </table>
          </div>
      </div>
  <div class="row">
      <div class="col-12 p-4">  
        <table class="table table-bordered" >
          <thead align="center" class="bg-primary">
              <th>QTE</th>
              <th>DESIGNATION</th>
              <th >PRIX UNITAIRE</th>
              <th >MONTANT</th>
          </thead>
          <tbody>
           <?php
             $montantHT = 0;
             $montantTTC = 0;
            while($row = $result->fetch_assoc()){ 
                $montantHT = $montantHT + $row['Total'];
            ?>
            <tr align="center">
                <td ><?=$row['quantite']?></td>
                <td ><?=$row['produit']?></td>
                <td ><?=$row['prixUnitaire']?></td>
                <td ><?=$row['Total']?></td> 
            </tr> 
            <?php }  ?>
            <tr align="right" style="font-weight: bold;">
              <td colspan="3">MONTANT HT</td>
              <td><?=$montantHT?></td>
            </tr>
            <tr align="right" style="font-weight: bold;">
              <td colspan="3">TVA<?php $rst=$conn->query("SELECT tva FROM factureproforma");
                if($row=$rst->fetch_assoc()){
                  $tva=$row['tva']; 
                } echo $tva.'%'?></td>
              <td>
              <?php echo $total=($montantHT*$tva)/100;?>
              </td>
            </tr>
            <tr align="right"  style="font-weight: bold;">
              <td colspan="3">MONTANT TTC</td>
              <td class="bg-primary"><?=$montantTTC=$total+$montantHT?></td>
            </tr>
          </tbody>
        </table>
        <!-- <a href=""><button class="btn btn-success" name="valider">Valider</button></a> -->
     </div>
  </div>
</div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <footer>
        <p class="text-center"> Alliance Froid / Customer Services<br>Cite Lobat Fall N°44 Dakar Sénégal<br>Tel : 221 338339393 RC N° SN DKR 2015B 7111 NINEA 0054557472A2
                </p>

    </footer>
</body>
</html>