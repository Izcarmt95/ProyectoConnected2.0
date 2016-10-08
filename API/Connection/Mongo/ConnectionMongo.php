<?php

function dbConnectMongo() {
// Include composer features.
  require 'vendor/autoload.php';

  $client = new MongoDB\Client("mongodb://localhost:27017");

  return $client;
}
?>