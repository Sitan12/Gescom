<?php
include('../model/bd.php');
    $date= date("Y-m-d");
    $type = $_POST['type'];
    $nature=$_POST['nature'];
    $montantD=$_POST['montantD'];
    $montantV=$_POST['montantV'];
    $etat=$_POST['etat'];
    $numero=$_POST['numeroP'];
//    enregistrement des entrees/sorties
if(isset($_POST['enregistrer']))
{
    
        $query = "INSERT INTO banque (dateB,nature,montantD,montantV,etat,numeroPiece) 
        values ('$date','$nature','$montantD','$montantV','$etat','$numero')";
        // $conn->query( "UPDATE caisse SET total = '$total' ");
         if ($conn->query($query) === TRUE)
         header('location: ../vue/gestionComptabilite/banque.php');
        else echo $conn->error;
}
