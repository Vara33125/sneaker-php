<?php

include("init/_header.php");


?>

<h1 class=" text-center mt-5"> Bienvenue sur votre profil : <?=$_SESSION['user']['pseudo'] ?></h1>
<div class="container-fluid d-flex align-items-center mt-5 flex-column">
<table class="table w-75">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Pseudo</th>
      <th scope="col">Email</th>
      <th scope="col">Mot de passe</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td><?= $_SESSION['user']['pseudo']?></td>
      <td><?= $_SESSION['user']['email']?></td>
      <td><?= $_SESSION['user']['password']?></td>
    </tr>
   
  </tbody>
</table>
<a class="btn  btn-secondary" href="updateUser.php"> Modifier mes informations </a>
</div>



 <?php

 include('init/_footer.php');