<?php

include("init/_init.php");

$pseudoMessage = "";
$emailMessage = "";
$passwordMessage = "";


if($_POST) {
    $acces = true; 
    if(empty($_POST['pseudo'])){
        $acces = false;
        $pseudoMessage = '<p class ="text-danger"> * Veuillez renseigner le champ </p>';
    }
    if(empty($_POST['email'])){
        $acces = false;
        $emailMessage = '<p class ="text-danger"> * Veuillez renseigner le champ </p>';
    }
    if(empty($_POST['password'])){
        $acces = false;
        $passwordMessage = '<p class ="text-danger">* Veuillez renseigner le champ </p>';
    }
    if($acces){
        $pdo->exec("INSERT INTO user(pseudo, email , password) VALUES('$_POST[pseudo]' ,'$_POST[email]','$_POST[password]')");
        header('Location: index.php');
        exit;
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
        <h1 class="text-center my-5"> INSCRIPTION</h1>
    </header>
    <main class="d-flex flex-column align-items-center justify-content-center">
        <form class="row g-3 w-50 my-5 " method="post">
                <div class="form-floating">
                    <input type="text" name="pseudo" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Pseudo</label>
                    <?= $pseudoMessage ; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    <?= $emailMessage ;?>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <?= $passwordMessage ;?>
                </div>
             <div class="col-12">
                <button type="submit" class="btn btn-secondary w-25 mx-auto d-flex justify-content-center">S'inscrire</button>
            </div>
        </form>
    </main>
</body>
</html>