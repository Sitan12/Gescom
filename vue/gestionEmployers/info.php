<?php
      include('../../model/bd.php');
      $id=$_GET['tel'];
      $query1 = "SELECT * FROM employer WHERE telephone='$id' ";
      $result = $conn-> query($query1);
    ?>
    <div class="row">
        <div class=""> 
            <h4 class="text-center">Informations sur 
                    <?php $rst=$conn->query("SELECT nom,prenom FROM employer WHERE telephone = '$id' ");
                    while($row=$rst->fetch_assoc()){
                      echo $row['prenom'].' '.$row['nom']; 
                    }?>
            </h4> 
        <table class="table table-bordered" >
         <thead align="center">
            <th>Nom</th>
            <th >Prenom</th>
            <th >telephone</th>
            <th>adresse</th>
            <th>Email</th>
            <th >Poste</th>
            <th >Salaire</th>
            <th>Date D'integration</th>
            <th>Conges</th>
            <th >Assurance</th>
            <th >Action</th>
         </thead>
         <tbody> <?php
         while($row = $result->fetch_assoc()){?>
         <tr align="center">
             <td ><?=$row['nom']?></td>
             <td ><?=$row['prenom']?></td>
             <td ><?=$row['telephone']?></td> 
             <td><?=$row['adresse']?></td>
             <td ><?=$row['email']?></td>
             <td ><?=$row['posteServi']?></td> 
             <td ><?=$row['salaire']?></td>
            <td ><?=$row['DateIntegration']?></td>
          <td ><?=$row['conges']?></td>
          <td ><?=$row['assurance']?></td>
          <td>
                 <a href="supprimer.php?tel=<?=$row['telephone']?>" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></a>
                 <a href="modifier.php?tel=<?=$row['telephone']?>" class="btn btn-primary" ><i class="fas fa-edit"></i></a>  
             </td>
             </tr> 
         <?php 
        }
         ?>
         </tbody>
        </table>
        </div>
    </div>