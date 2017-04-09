<?php

include ('db.php');

$del = $db->prepare("DELETE FROM list WHERE id=" . $_POST['delete'] . "");
$del->execute();
header('Location: index.php');
