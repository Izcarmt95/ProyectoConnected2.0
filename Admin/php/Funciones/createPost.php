<?php
 include("../connection/connection.php");
$post = $_POST['post'];
session_start();
$idPerson = $_SESSION['idPerson'];

$db = dbConnect();
$data = $db->query('select createPost("'.$post.'",'.$idPerson.')');
print("<script>window.location.replace('../../index.php');</script>");
?>

