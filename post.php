<?php


// prepare request
$req = $db->prepare('INSERT INTO list (name, amount, price) VALUES(?, ?, ?)');
// execute request
$req->execute(array($_POST['name'], $_POST['amount'], $_POST['prince']);
// return to the index (and not the future !)
header('Location: index.php');

?>
