function registerPerson()
{ 	
    $name = $("#name").val();
    $lastname = $("#lastname").val();
    $birthdate = $("#datepicker").val();
    $gender = $('input[name="gender"]:checked').val();
    $country= $("#country").val();
    $profession = $("#profession").val();
    $description = $("#description").val();
    $email = $("#email").val();
    $password =$("#password").val();
    $passwordConfirm = $("#passwordconfirm").val();


    if($password != $passwordConfirm){
        alert("Contraseña incorrecta");
        
    }

    else{
        $.ajax({

            type:  "POST",
            url:   "../../php/Funciones/registerPerson.php",
            dataType: "json",
            data: {"name": $name, "lastname": $lastname, "birthdate":$birthdate, 
                    "gender":$gender, "country":$country, "profession":$profession,
                    "description": $description, "email":$email, "password":$password,
                    "tag":'register'},
            
                        
            beforeSend: function(){
                //Lo que se hace antes de enviar el formulario
            },
            success: function(result){
               
                    window.location.href = '../../pages/examples/login.php';
                
            },
            error:  function(xhr,err){ 
                alert(xhr.responseText);
                
            }
        });
    }
    
}

function login()
{   
    
    $email = $("#email").val();
    $password = $("#password").val();    
        $.ajax({

            type:  "POST",
            url:   "/ProyectoConnected2.0/Admin/php/Funciones/log.php",
            dataType: "json",
            data: { "email":$email, "password":$password,
                    "tag":'log'},
            
                        
            beforeSend: function(){
                //Lo que se hace antes de enviar el formulario
            },
            success: function(response){
               window.location.href = '../../index.php';

            },
            error:  function(xhr,err){ 
                alert("readyState: "+ xhr.readyState +"\nstatus: "+ xhr.status+"\n \n responseText: "+ xhr.responseText);
            }
        });    
}

