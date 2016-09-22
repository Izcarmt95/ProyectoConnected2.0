<?php

  include("../connection/connection.php");/*incluye el archivo donde esta la coneccion */
    // Empezamos la sesión /
    session_start();
 
    // Creamos la sesión /
    $_SESSION['email'] = $_POST['email'];
    $db = dbConnect();
    $db2 = dbConnect();
    $db1 = dbConnect();
    $db3 = dbConnect();
    $db4 = dbConnect();
    
    
    $email = $_POST["email"] ;
     $password = $_POST["password"];
     $password = '"'.$password.'"';
     

     $firstName = $db2->selectGremlin('g.V("email", "'.$email.'").firstName', '*:-1');
     $lastName = $db1->selectGremlin('g.V("email", "'.$email.'").lastName', '*:-1');
     $country = $db3->selectGremlin('g.V("email", "'.$email.'").country', '*:-1');
     $person = $db4->selectGremlin('g.V("email", "'.$email.'").id', '*:-1');
     $fullName = $firstName.' '.$lastName;

     $_SESSION['idPerson'] = "".$person."";
     $_SESSION['country'] = str_replace('"','',$country);
     $_SESSION['fullName'] = str_replace('"','',$fullName);

     try{

        $result = $db->selectGremlin('g.V("email", "'.$email.'").password', '*:-1');
       if($result == $password){
        
          print("<script>window.location.replace('../../index.php');</script>"); 
        }
        else{
         $mensaje = 'Incorrect password or user';
             print ("<script>alert('$mensaje')</script>");
         print("<script>window.location.replace('../../pages/examples/login.html');</script>");
        }
      }
      catch(Exception $e){
        $mensaje = 'Cannot access';
            print ("<script>alert('$mensaje')</script>");
        print("<script>window.location.replace('../../pages/examples/login.html');</script>");
      }
?>