<?php

include("init/_init.php");

$emailMessage = '';

if($_POST){
    $pdoStatement = $pdo->query("SELECT * FROM user WHERE email= '$_POST[email]' AND password='$_POST[password]' ");
    $user = $pdoStatement ->fetch();
    
    if(empty($user)){
            $emailMessage = '<p class ="text-danger"> * Identifiant ou mot de passe incorrect </p>';
        }else{ 
            $_SESSION['user'] = [
                "pseudo" => $user["pseudo"],
                "email" => $user['email'],    
            ];
            header('Location: catalogue.php');           
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
    <link rel="icon" href="images/shoelace.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body style="background-color : #f4f4f6">

    <header>
        <h1 class="text-center">Bienvenue sur votre site de sneakers</h1>
    </header>
    <main class="d-flex flex-column">
        <img class="d-flex mx-auto" style="height: 300px " src="images/air.png" alt="logo">
        <div class="w-50 d-flex mx-auto flex-column align-items-center ">
            <form class="row g-3 w-75 my-5 " method="post">
                <div class="form-floating mb-3">
                    <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    <?= $emailMessage ?>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <?= $emailMessage ?>
                </div>
                <button type="submit" class="btn btn-danger mt-3 w-50 d-flex mx-auto justify-content-center">Se connecter</button>
            </form>
        </div>


        <div class="d-flex mx-auto mt-3">
            <a href="inscription.php" style="text-decoration: none ; color: #000"> Pas encore de compte ? Inscrivez-vous !</a>
        </div>
    </main>

</body>
</html>