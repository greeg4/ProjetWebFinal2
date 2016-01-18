<?php

header('Content-Type: application/json');
//indique que le retour doit $etre traité en json
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/AjoutDvd.class.php';
require '../classes/AjoutDvdManager.class.php';

$db = Connexion::getInstance($dsn, $user, $pass);

try {
    $mg = new AjoutDvdManager($db);
    $retour = $mg->adddvd($_GET);
    print json_encode(array('retour' => $retour));
} catch (PDOException $e) {
    print $e->getMessage();
}
?>
