<?php

// connection to database
include ('db.php');

// prepare request
$req = $db->prepare('INSERT INTO list (name, kilos, gramme, amount, price) VALUES(?, ?, ?, ?, ?)');
// execute request
$req->execute(array($_POST['name'], $_POST['kilos'], $_POST['gramme'], $_POST['amount'], $_POST['price']));
// return to the index (and not the future !)
header('Location: index.php');

?>
