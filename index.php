<?php
session_start();

include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
              <label for="article">Nom de l'article</label>
            </div>
            <!-- poid en kilos -->
            <label for="kilos" class="col s6">Kilogramme (Kg)</label>
            <label for="gramme" class="col s6">Gramme (g)</label>
            <div class="range-field col s6">
              <input type="range" id="kilos" name="kilos" value="0" min="0" max="10" step="1" />
            </div>
            <!-- poid en gramme -->
            <div class="range-field col s6">
              <input type="range" id="gramme" name="gramme" value="0" min="0" max="1000" step="10" />
            </div>
            <!-- quantité -->
            <label for="amount" class="col s12">Quantité</label>
            <div class="range-field col s12">
              <input type="range" id="amount" name="amount" value="1" min="1" max="10" step="1" />
            </div>
            <!-- prix en € -->
            <label for="price" class="col s12">Prix</label>
            <div class="range-field col s12">
              <input type="range" id="price" name="price" value="0" min="1" max="100" step="1" />
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
      $list = $db->query('SELECT id, name, kilos, gramme, amount, price FROM list ORDER BY id');
      // affichage des articles
      echo '
      <table class="bordered centered">
        <thead>
          <tr>
            <th>Article</th>
            <th>Poid</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
      ';
      // boucle pour afficher tout les articles
      while ($item = $list->fetch()){
        echo '
            <tr>
              <td>' . $item['name'] . '</td>
              <td>' . $item['kilos'] . 'Kg ' . $item['gramme'] . 'g</td>
              <td>' . $item['amount'] . '</td>
              <td>' . $item['price'] . '€</td>
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
