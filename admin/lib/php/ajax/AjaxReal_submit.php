<?php

header('Content-Type: application/json');
//indique que le retour doit $etre traité en json
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/AjoutReal.class.php';
require '../classes/AjoutRealManager.class.php';

$db = Connexion::getInstance($dsn, $user, $pass);

try {
    $mg = new AjoutRealManager($db);
    $retour = $mg->addReal($_GET);
    print json_encode(array('retour' => $retour));
} catch (PDOException $e) {
    
}
?>
