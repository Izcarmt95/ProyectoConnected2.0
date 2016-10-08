<?php
/**
 * This file can be used as a starting point to understand way OrientDB-PHP
 * works.
 * @link https://github.com/AntonTerekhov/OrientDB-PHP
 * @package OrientDB-PHP
 * @subpackage Connection
 */


require_once ('../../../OrientDB/OrientDB.php');

function dbConnect(){
	$rootPassword = 'root';
	$dbName = 'prueba';
	$clusterName = 'default';
	$database = 'prueba';
	try {
    	$db = new OrientDB('localhost', 2424);
	}
	catch (Exception $e) {
    	die('Failed to connect: ' . $e->getMessage());
	}
	try {
    	$connect = $db->connect('root', $rootPassword);
    
	}
	catch (OrientDBException $e) {
    	die('Failed to connect():' . $e->getMessage());
	}
	$db->DBOpen('dataBaseConnect', 'root', 'root');
	return $db;
}

/*$db->DBOpen('prueba', 'root', 'root');

$data = $db->select('select First_name from persona ');
echo $data[0];
*/

