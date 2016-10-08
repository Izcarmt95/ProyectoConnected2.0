<?php

require_once 'vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

function dbConnectNeo4j(){
	try{
		$client = ClientBuilder::create()

        ->addConnection('default', 'http://neo4j:root@localhost:7474') // Example for HTTP connection configuration (port is optional)
        ->build();
        
    	return $client; 
	}
	catch(Exception $e){
		echo "Neo4j is not running";
	}
	

}

 ?>
