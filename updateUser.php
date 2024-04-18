<?php

include("init/_init.php");

try {
    if(isset($_POST['pseudo'])){
            if(!empty($_POST['pseudo']) && $_POST['pseudo'] != $_SESSION['user']['pseudo']){

                    $pdo->exec("UPDATE user  SET pseudo ='" . $_POST["pseudo"] . "'WHERE _id_user = '" . $_SESSION["user"]["id"] . "'");
                    
                    $_SESSION['user']['pseudo'] =$_POST["pseudo"];
                    
                    header('Location: profile.php');
                    exit();
            }
        }
    if(isset($_POST['email'])){
        if(!empty($_POST['email']) && $_POST['email'] != $_SESSION['user']['email']){

                $pdo->exec("UPDATE user  SET email ='" . $_POST["email"] . "'WHERE _id_user = '" . $_SESSION["user"]["id"] . "'");
                
                $_SESSION['user']['email'] =$_POST["email"];
                
                header('Location: profile.php');
                exit();
        }
    }
    if(isset($_POST['password'])){
        if(!empty($_POST['password']) && $_POST['password'] != $_SESSION['user']['password']){

            $pdo->exec("UPDATE user  SET password ='" . $_POST["password"] . "'WHERE _id_user = '" . $_SESSION["user"]["id"] . "'");
            
            $_SESSION['user']['password'] =$_POST["password"];
            
            header('Location: profile.php');
            exit();
        }
    }
} catch(Exception $e) {
    echo $e->getMessage();
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    
<main class="d-flex flex-column align-items-center justify-content-center">
        <form class="row g-3 w-50 my-5 " method="post">
                <div class="form-floating">
                    <input type="text" name="pseudo" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Pseudo </label>
                    
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                   
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Mot de Passe </label>
                    
                </div>
                
             <div class="col-12">
                <button type="submit" class="btn btn-secondary w-25 mx-auto d-flex justify-content-center">Modifier mes informations</button>
            </div>
        </form>
    </main>
