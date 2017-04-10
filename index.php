<?php
session_start();

include 'db.php';

$total_euro = 0;
$total_cent = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="images/cart.png" />
  <title>ShopList</title>
  <!-- Font icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">

  <link rel="stylesheet" href="css/style.css">
  <!-- Jquery minified -->
  <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
  <!-- Script.js -->
  <script type="text/javascript" src="js/script.js"></script>
</head>
<body class="blue-grey darken-4 blue-grey-text text-lighten-5">
    <?php
    $_SESSION['pwd'] = 'tinap';
    ?>

    <header class="section blue-grey darken-4 blue-grey-text text-lighten-5">
      <div class="row">
        <div class="col s12">
          <h1 class="header center-on-small-only">ShopList</h1>
          <h4 class="light blue-grey-text text-lighten-3 center-on-small-only">Une p'tite appli pour gérer nos courses</h4>
        </div>
      </div>
      <div class="section">
        <a id="openMenu" class="btn-floating left btn-large red">
          <i class="material-icons">add</i>
        </a>
      </div>
    </header>

    <section class="blue-grey darken-2">
      <div id="createForm">
      <!-- formulaire d'ajout d'article -->
      <div class="row">
        <h5>Ajouter un article</h5>
        <!-- nom de l'article -->
        <form class="col s12" action="post.php" method="post">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">shopping_basket</i>
              <input id="article" type="text" class="validate" name="name">
              <label for="article"><b>Nom de l'article</b></label>
            </div>
            <!-- quantité -->
            <label for="amount" class="col s12"><b>Quantité</b></label>
            <div class="range-field col s12">
              <input type="range" id="amount" name="amount" value="1" min="0" max="10" step="1" />
            </div>
            <!-- poid en kilos -->
            <label class="col s12"><b>Poids</b></label>
            <label for="kilos" class="col s6">Kilogramme (Kg)</label>
            <label for="gramme" class="col s6">Gramme (g)</label>
            <div class="range-field col s6">
              <input type="range" id="kilos" name="kilos" value="0" min="0" max="10" step="1" />
            </div>
            <!-- poid en gramme -->
            <div class="range-field col s6">
              <input type="range" id="gramme" name="gramme" value="0" min="0" max="1000" step="10" />
            </div>
            <!-- prix en € -->
            <label class="col s12"><b>€ Prix</b></label>
            <label for="euro" class="col s6">euro</label>
            <label for="centim" class="col s6">centime</label>
            <div class="range-field col s6">
              <input type="range" id="euro" name="euro" value="0" min="0" max="100" step="1" />
            </div>
            <div class="range-field col s6">
              <input type="range" id="centim" name="centim" value="0" min="0" max="99" step="1" />
            </div>
            <!-- validation -->
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter
                <i class="material-icons right">send</i>
            </button>
            </div>
          </div>
        </form>
      </div>
    </div> <!-- id="createForm" end -->
    </section>

    <section class="section blue-grey lighten-5 blue-grey-text text-darken-4">
      <div class="row">
        <div class="col s12">
          <h5>Liste de course</h5>

      <?php
      // preparation des articles
      $list = $db->query('SELECT id, name, kilos, gramme, amount, euro, centim FROM list ORDER BY id');
      // affichage des articles
      echo '
      <table class="bordered centered">
        <thead>
          <tr>
            <th>Article</th>
            <th>Quantité</th>
            <th>Poid</th>
            <th>Prix</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
      ';
      // boucle pour afficher tout les articles
      while ($item = $list->fetch()){
        // define cents
        $rectif_cent = '';
        $cent = 0 + $item['centim'];
        $cent_len = strlen((string)$cent);
        if($cent_len == 1) {
          $rectif_cent = 0;
        }
        // calcul prix total
        $total_euro = $total_euro + ($item['amount'] * ($item['euro']));
        $total_cent = $total_cent + ($item['amount'] * ($item['centim']));
        $rectif_euro = $total_cent / 100;
        for ($x = 0; $x < $item['amount']; $x++) {
          if ($rectif_euro >= 1) {
            $total_euro++;
            $total_cent -= 100;
          }
        }

        // suite affichage des données
        echo '
            <tr>
              <td>' . $item['name'] . '</td>
              <td>' . $item['amount'] . '</td>
              <td>' . $item['kilos'] . 'Kg ' . $item['gramme'] . 'g</td>
              <td>' . $item['euro'] . '€' . $rectif_cent . $item['centim'] . '</td>
              <!-- sepression de post -->
              <td>
                <form action="delete.php" method="post">
                  <input type="hidden" value="' . $item['id'] . '" name="delete">
                  <button class="btn waves-effect waves-light" type="submit" name="action">
                    <i class="material-icons">delete</i>
                  </button>
                </form>
              </td>
            </tr>
        ';
      };
      // fin de la table des articles
      echo '
        </tbody>
      </table>
      ';
      echo '<div class="total blue-grey darken-4 blue-grey-text text-lighten-5">Coût total : ' . $total_euro . '€' . $rectif_cent . $total_cent . '</div>';
      ?>
    </div>
    </div>
    </section>

    <footer class="section blue-grey darken-4 blue-grey-text text-lighten-5">
      <div class="row">
        <div class="col s12">
          View on <a href="#" target="_blank" class="header center-on-small-only">Github</a>.
          <p class="light blue-grey-text text-lighten-3 center-on-small-only">Application développé par <a href="www.julienmalle.fr" target="_blank" class="header center-on-small-only">Julien Malle</a></p>
        </div>
      </div>
    </footer>
  </div>
</body>
</html>
