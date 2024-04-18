<?php
    include("init/_init.php");

    $titreMessage ='';
    $prixMessage ='';
    $quantiteMessage = '';
    $imageMessage='';


    if($_POST){

        $acces = true; 
        if(empty($_POST['titre'])){
            $acces = false;
            $titreMessage = '<p class ="text-danger"> Veuillez saisir le titre </p>';
        }
        if(empty($_POST['image'])){
          $acces = false;
          $imageMessage = '<p class ="text-danger"> Veuillez renseigner le champ </p>';
      }
        if(strlen($_POST['titre'] < 3 OR strlen($_POST['titre'])  > 25 )){
            $acces = false;
            $titreMessage = '<p class ="text-danger"> Veuillez renseigner le champ </p>';
        }
        if(empty($_POST['prix'])){
            $acces = false;
            $prixMessage = '<p class ="text-danger"> Veuillez saisir le prix </p>';
        }
        if(!is_numeric($_POST['prix'])){
            $acces = false;
            $prixMessage = '<p class ="text-danger"> Veuillez saisir un nombre </p>';
        }
        if($_POST['prix'] <= 0){
            $acces = false;
            $prixMessage = '<p class ="text-danger"> Veuillez saisir un nombre supérieur à 0. </p>';
        }
        if(empty($_POST['quantite'])){
            $acces = false;
            $quantiteMessage = '<p class ="text-danger"> Veuillez saisir la quantité </p>';
        }
        if($_POST['quantite'] <= 0){
            $acces = false;
            $quantiteMessage = '<p class ="text-danger"> Veuillez saisir un nombre supérieur à 0. </p>';
        }


        if($acces){
            $pdo->exec("INSERT INTO article(titre, prix , quantite, url_image) VALUES('$_POST[titre]' ,$_POST[prix],$_POST[quantite], '$_POST[image]')");
        }

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sneakers</title>
    <link rel="icon" href="images/shoelace.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color : #f4f4f6">
    <header>
        <nav class="navbar navbar-expand-lg bg-secondary  ">
             <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="images/air.png" alt="logo" style="height : 50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="catalogue.php">Catalogue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="panier.php?id=800000">Panier</a>
        </li>
        
      </ul>
      <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fa-solid fa-user"></i>
      </button>
      <ul class="dropdown-menu">
      <p class="text-center fw-bold"> <?= $_SESSION['user']['pseudo'] ?> </p>
      <li><a class="dropdown-item" href="panier.php?id=0">Voir mon panier</a></li>
      <li><a class="dropdown-item" href="profile.php">Modifier mes informations</a></li>
      <li><a class="dropdown-item" href="deconnection.php">Se déconnecter</a></li>
      </ul>
      </div>
      <div class="dropdown">
       
  <button type="button" class="btn btn-light dropdown-toggle me-5" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
    Ajout article
  </button>
  <form class="dropdown-menu pe-5 " style="width: 180px" method="post">
    <div class="mb-3 ms-4 w-100">
      <input type="text" class="form-control" name="titre" placeholder="titre">
      <?= $titreMessage; ?>
    </div>
    <div class="mb-3 ms-4 w-100">
      <input type="number" class="form-control" step="0.01" name="prix" placeholder="prix">
      <?= $prixMessage; ?>
    </div>
    <div class="mb-3 ms-4 w-100">
      <input type="number" class="form-control" name="quantite" placeholder="quantite">
      <?= $quantiteMessage; ?>
    </div>
    <div class="mb-3 ms-4 w-100">
      <input type="text" class="form-control" name="image" placeholder="url image">
      <?= $imageMessage; ?>
    </div>
    <div class="mb-3 ms-4 w-100">
    </div>
    <button type="submit" class="btn btn-dark ms-4 w-100"> Envoyer</button>
  </form>
</div>
      
    </div>
  </div>
</nav>
  </header>
  <main>