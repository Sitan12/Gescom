
  <?php include ('header/header.php') ?> 
  <!-- lister les produits -->
  <h2 class="text-center t p-5"><strong>Produits</strong></h2>
       <section class="container">
         <div class="row">
            <?php
              include ('../model/bd.php');
              $selectIMG=" SELECT * FROM produit";
              $resultat=$conn->query($selectIMG);
              while($row = $resultat->fetch_assoc()){
            ?>
            <!-- <div class="col-12 p-4"> -->
              <div class="card col-md-3">
                <img src="../static/img/<?=$row['imageProduit']?>" class="card-img-top" width="50" height="250" alt="..." >
                <div class="card-body">
                  <h5 class="card-title"  ><?=$row['nomProduit']?></h5>
                  <p class="card-text"><?=$row['descriptionProduit']?></p>
                  <a href="panier.php?id=<?=$row['id']?>" class="btn btn-success" >Contactez-nous</a>
                </div>
              </div>
                <?php
              }
              ?>
         </div> 
       </section>
  <section class="">
      <div class="container text-center">
        <h2 class="text-uppercase titre p-5"><strong>Nos marques d'appareils :</strong></h2>
        <img class="espace" src="../static/logo/midea.png" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/wilson.png" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/gree.png" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/vestel.jpg" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/astech.jpg" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/serico.png" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/beko.png" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/westpool.jpg" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/lg.png" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/samsung.jpg" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/airwell.jpg" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/solstar.jpg" alt="" width="50" height="50">
        <img class="espace" src="../static/logo/hisense.png" alt="" width="50" height="50">
        
      </div>
  </section>

  <!-- marques electromenagers -->
  <section>
    <h2 class="text-uppercase text-center titre p-5"><strong>Nos marques électroménagers</strong></h2>
    <marquee behavior="" direction="left">
      <img src="../static/logo/airwell.jfif" alt="">
      <img src="../static/logo/astech.jfif" alt="">
      <img src="../static/logo/electro.jfif" alt="">
      <img src="../static/logo/electromenager.jfif" alt="">
      <img src="../static/logo/hisense.jfif" alt="">
      <img src="../static/logo/LG.jfif" alt="">
      <img src="../static/logo/midea.jfif" alt="">
      <img src="../static/logo/solstar.jfif" alt="">
    </marquee>
  </section>
  
    <!-- Inclure le footer -->
  <?php
    include ('footer/footer.php');
    ?>
</body>
</html>

      
  