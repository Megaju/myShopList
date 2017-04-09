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
</head>
<body>

  <?php
  $_SESSION['pwd'] = 'tinap';
  ?>

  <header>
    <h1>ShopList</h1>
  </header>

  <section>
    <h2>Ajouter un truc cool à la liste de course !</h2>

    <form action="post.php" method="post">
      <input type="text" name="name" value="name" placeholder="Nom de l'article">
      <input type="int" name="kilos" value="0" placeholder="Kilos">
      <input type="int" name="amount" value="1" placeholder="Quantité">
      <input type="int" name="price" value="0" placeholder="Prix">
      <input type="submit" name="post" value="Ajouter">
    </form>
  </section>

  <section>
    <h2>Liste de cours</h2>

    <?php
      // preparation des articles
      $list = $db->query('SELECT id, name, kilos, amount, price FROM list ORDER BY id');
      // affichage des articles
      echo '
      <table>
        <tbody>
          <tr>
            <td>Article</td>
            <td>Kilos</td>
            <td>Quantité</td>
            <td>Prix</td>
            <td>Supprimer</td>
          </tr>
      ';
      // boucle pour afficher tout les articles
      while ($item = $list->fetch()){
        echo '
            <tr>
              <td>' . $item['name'] . '</td>
              <td>' . $item['kilos'] . 'Kg</td>
              <td>' . $item['amount'] . '</td>
              <td>' . $item['price'] . '€</td>
              <!-- sepression de post -->
              <td>
                <form action="delete.php" method="post">
                  <input type="hidden" value="' . $item['id'] . '" name="delete">
                  <input type="submit" value="X">
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
  </section>

  <footer>
    <p>Une petite appli web pour gérer nos courses à la maison.</p>
  </footer>
</body>
</html>
