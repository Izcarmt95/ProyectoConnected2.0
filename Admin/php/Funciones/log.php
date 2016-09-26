<?php
    include("../../../API/FuncionesPHP/validateUserAPI.php");

    $tag = $_POST['tag'];
    if($tag == 'log'){
        validateUserPass( $_POST["email"], $_POST["password"]);
        return 1;
    
    }

  
?>