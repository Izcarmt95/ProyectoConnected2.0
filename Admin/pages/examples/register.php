<!--PHP-->
<?php
$rootPassword = 'pass12sol';
$dbName = 'prueba';
$clusterName = 'default';

require_once 'OrientDB/OrientDB.php';

echo 'Connecting to server...' . PHP_EOL;
try {
    $db = new OrientDB('localhost', 2424);
}
catch (Exception $e) {
    die('Failed to connect: ' . $e->getMessage());
}

echo 'Connecting as root...' . PHP_EOL;
try {
    $connect = $db->connect('root', $rootPassword);
    echo 'Connected' . PHP_EOL;

}
catch (OrientDBException $e) {
    die('Failed to connect(): ' . $e->getMessage());
}
$db->DBOpen('prueba', 'root', 'pass12sol');

$query = $db->select('select rid from person ');
foreach ($query as $value){
	echo $value;
}

?>