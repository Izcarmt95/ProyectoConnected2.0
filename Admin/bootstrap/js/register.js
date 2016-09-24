function registerPerson()
{ 	
    var data = $(this).serializeArray();
	data.push({name:'tag',value :'register'})
        $.ajax({

            dataType: "json",
            data: data,
            url:   '../../../API/Principal/principal.php',
            type:  'post',
            beforeSend: function(){
                //Lo que se hace antes de enviar el formulario
            },
            success: function(){
                //lo que se si el destino devuelve algo
                //var_dump(respuesta.html);
              
            },
            error:  function(xhr,err){ 

                alert("readyState: "+ xhr.readyState +"\nstatus: "+xhr.status+"\n \n responseText: "+ xhr.responseText);
            }
        });
}
