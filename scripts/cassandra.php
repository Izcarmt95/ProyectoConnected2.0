<?php
$cluster   = Cassandra::cluster()->build();                 // connects to localhost by default
$session   = $cluster->connect();        // create session, optionally scoped to a keyspace



/*$session->execute(new Cassandra\SimpleStatement(" CREATE KEYSPACE Connected WITH replication = {'class': 'SimpleStrategy','replication_factor' : 1}"));*/

    

$session->execute(new Cassandra\SimpleStatement(" CREATE TABLE Connected.Message ( idChat int, idPerson int, message text,date timestamp,PRIMARY KEY (idChat, date, idPerson));"));

/*$session->execute(new Cassandra\SimpleStatement(" drop TABLE Connected.Message ;"));*/



?>
