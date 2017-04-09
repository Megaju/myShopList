<?php
session_start();
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
    <h2>Nos courses</h2>
  </section>

  <footer>
    <p>Une petite appli web pour gérer nos courses à la maison.</p>
  </footer>
</body>
</html>
