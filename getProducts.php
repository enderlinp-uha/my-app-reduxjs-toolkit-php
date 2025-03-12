<?php
/**
 * Created by PhpStorm.
 * User: Jérôme
 * Date: 19/12/2023
 * Time: 19:15
 */
header('Content-Type: application/json');

/**
 * connexion à la base de données
 */
try {
    $connexion = new PDO('mysql:host=db5017430365.hosting-data.io;dbname=dbs13979263','dbu2377481','SfY5f79TKAqHNScB3s&w');
    $retour["success"] = true;
}
catch(Exception $ex) {
    $retour["success"] = false;
}

$typeId = $_POST['type'];
$request = $connexion->prepare("SELECT * FROM products where type_id=:type_id");
$bindings = array(
    ':type_id' => $typeId
);
$request->execute($bindings);

$retour = $request->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($retour);








?>