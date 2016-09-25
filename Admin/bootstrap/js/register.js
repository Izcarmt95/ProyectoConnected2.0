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
            success: function(response){
               

            },
            error:  function(xhr,err){ 
                alert("readyState: "+ xhr.readyState +"\nstatus: "+ xhr.status+"\n \n responseText: "+ xhr.responseText);
                if(xhr.responseText == "Registered"){
                    window.location.href = '../../pages/examples/login.html';
                }
            }
        });
    }
    
}
