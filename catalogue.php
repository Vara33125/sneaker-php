<?php
include("init/_header.php");

$pdoStatement = $pdo->query('SELECT * FROM article');
$articles = $pdoStatement->fetchAll();



?>

    <h1 class=" text-center mt-5 pt-5">  CATALOGUE</h1>
   
    <div class="container-fluid row mb-5  ">
    <?php foreach ($articles as $sneaker) : ?>
              
                <div class="card container-fluid d-flex flex-wrap shadow col-lg-3  mt-4" style="width: 19rem">
                  <a style="text-decoration: none ; color: #000 " href="detail.php?id=<?= $sneaker['_id_article']; ?>">
                    <div class="card-body d-flex flex-column me-3">
                        <img style="height: 250px ; width: 250px" src="<?= $sneaker['url_image'] ?>" alt="<?php echo $sneaker['titre' ]; ?>" class="pe-2" >
                        <h2 class="card-title h4 my-5"> <?php echo $sneaker['titre']; ?></h2>
                      <a href="panier.php?id=<?= $sneaker['_id_article']; ?>"  class="fa-solid fa-basket-shopping position-absolute top-0 end-0 mt-4 me-5" style="color: #ffbe0b; border: none; background-color : transparent"></a>
                        <p class="card-subtitle mb-2 text-body-secondary  position-absolute bottom-0 end-0 pe-3  "> <?php echo$sneaker['prix']; ?>€</p>     
                    </div>
                  </a>
                </div>
              
    <?php endforeach ; ?>
    </div>


    </main> 
<footer style="height : 70px " class="bg-secondary ">
 <p class = " text-center text-light mt-4 pt-3"> sneakers &copy 2024 </p>
</footer>
    <script src="https://kit.fontawesome.com/0f6a447e4c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

