
  <?php include ('header/header.php') ?> 
  <!-- lister les produits -->
  <h2 class="text-center titre p-5" id="produits"><strong>Produits</strong></h2>
       <section class="container">
         <div class="row">
            <?php
              include ('admin/model/bd.php');
              $selectIMG=" SELECT * FROM produit";
              $resultat=$conn->query($selectIMG);
              while($row = $resultat->fetch_assoc()){
            ?>
            <!-- <div class="col-12 p-4"> -->
              <div class="card col-md-3">
                <img src="admin/static/img/<?=$row['imageProduit']?>" class="card-img-top" width="50" height="250" alt="..." >
                <div class="card-body">
                  <h5 class="card-title"  ><?=$row['nomProduit']?></h5>
                  <p class="card-text"><?=$row['descriptionProduit']?></p>
                  <a href="#contact" class="btn btn-success">Contactez-nous</a>
                </div>
              </div>
                <?php
              }
              ?>
         </div> 
       </section>
       <hr class="container mt-5 mb-3">
  <section class="">
      <div class="container text-center">
        <h2 class="titre p-5"><strong>Nos marques d'appareils :</strong></h2>
        <img class="espace" src="admin/static/logo/midea.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/wilson.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/gree.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/vestel.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/astech.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/serico.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/beko.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/westpool.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/lg.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/samsung.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/airwell.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/solstar.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/hisense.png" alt="" width="50" height="50">
        
      </div>
  </section>

  <hr class="container mt-5 mb-3">  
  <!-- marques electromenagers -->
  <section>
    <h2 class="text-center titre p-5"><strong>Nos marques électroménagers</strong></h2>
    <div class="bg-light">
      <marquee behavior="" direction="left">
        <img src="admin/static/logo/airwell.jfif" alt="">
        <img src="admin/static/logo/astech.jfif" alt="">
        <img src="admin/static/logo/electro.jfif" alt="">
        <img src="admin/static/logo/electromenager.jfif" alt="">
        <img src="admin/static/logo/hisense.jfif" alt="">
        <img src="admin/static/logo/LG.jfif" alt="">
        <img src="admin/static/logo/midea.jfif" alt="">
        <img src="admin/static/logo/solstar.jfif" alt="">
      </marquee>
    </div>
  </section>
  
    <!-- Inclure le footer -->
  <?php
    include ('footer/footer.php');
    ?>
</body>
</html>

      
  