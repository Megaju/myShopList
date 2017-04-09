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
      <input type="int" name="amount" value="1" placeholder="Quantité">
      <input type="int" name="price" value="0" placeholder="Prix">
      <input type="submit" name="post" value="Ajouter">
    </form>
  </section>

  <footer>
    <p>Une petite appli web pour gérer nos courses à la maison.</p>
  </footer>
</body>
</html>
