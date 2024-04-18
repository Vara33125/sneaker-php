<?php

include("init/_header.php");

$pdoStatement = $pdo->query("SELECT * FROM article WHERE _id_article = $_GET[id]");
$produit = $pdoStatement ->fetch();

// $exist = true;

// if(!isset($_SESSION['panier'])){
//     $_SESSION['panier'] = array();
// }

// foreach ($_SESSION['panier'] as $article) {
    
//     if($article['titre'] == $produit['titre'] ){
//         $article['quantite'] += 1;
//     }else{
        
//         $exist =false;
//     }
// }
// if(!$exist){
//     $_SESSION['panier'][] = $produit;}
    
if($produit){
    $_SESSION['panier'][] = $produit;
}
function montantTotal() : array
{
    $array = [
        'montant' => 0,
        'fdp' => 0
    ];

    $montant = 0;

    foreach ($_SESSION['panier'] as $articles) {
        $montant += $articles['prix'] * $articles['quantite'];
    }

    $array['montant'] = $montant;


    if ($montant < 250) {
        // $montant += 10;
        $array['fdp'] = 10;
    }

    return $array;
}

?>
<h1 class=" text-center my-5 pt-5"> PANIER </h1>

<?php
if(empty($_SESSION['panier'])) {
    echo '<p class="text-center h4 mt-5 pt-5"> Votre panier est vide ! </p>';

}else { ?>

   <div> <table class="table text-center table-bordered w-50 mx-auto">

<thead>
    <tr>
        <th>Nom</th>
        <th>Prix (€)</th>
        <th>Quantité</th>
        <th>Total</th>
    </tr>
</thead>


<tbody>

     <?php foreach($_SESSION['panier'] as $article) : ?>
        
        <tr>
            <td><?=$article['titre'] ?></td>
            <td><?= $article['prix'] ?>€</td>
            <td><?=$article['quantite'] ?></td>
            <td><?=$article['prix'] * $article['quantite']  ?></td>
        </tr>
        
     <?php endforeach ; ?>

</tbody>

<tfoot>
    <tr>
        <td colspan="3">Montant</td>
        <td><?=montantTotal()['montant']?>€</td>
    </tr>
    <tr>
        <div class=" d-flex row">
        <td colspan="3">Frais de port <p class="fst-italic" style="font-size: 12px">(si commande inférieur à 250€)</p></td></div>
        <td><?=montantTotal()['fdp'] ?> €</td>
    </tr>
    <tr>
        <td colspan="3 mb-5">Montant total</td>
        <td> <?= montantTotal()['montant'] + montantTotal()['fdp'] ?>€</td>
    </tr>
</tfoot>
    </table>
<a href="supression.php" class="btn btn-secondary " style="margin-left : 64%"> Supprimer mon panier</a>
<?php
} ;
?>

<?php

include('init/_footer.php');