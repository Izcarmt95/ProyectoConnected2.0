function sendMessage()
{ 	
   
    $message = $("#message").val();
    

    if($message == ""){
        alert("empty message");
    }



    else{
        $.ajax({

            type:  "POST",
            url:   "../../php/Funciones/chat.php",
            dataType: "json",
            data: {"message": $message , 'tag': 'createMessage'},
            
                        
            beforeSend: function(){
                //Lo que se hace antes de enviar el formulario
            },
            success: function(result){
                    var height = $('#chat1').prop('scrollHeight');
                    $('#chat1').scrollTop(height);
                     $('#message').val("");
                
          
                
            },
            error:  function(xhr,err){ 
                alert(xhr.responseText);
                
            }
        });
    }
    
}
function loadMessage(){

     $.ajax({

            type:  "POST",
            url:   "../../php/Funciones/loadChat.php",
            dataType: "json",
            data: {},
          
            beforeSend: function(){
                //Lo que se hace antes de enviar el formulario
            },
            success: function(result){

                    $('#chat').html(result);
                    var height = $('#chat1').prop('scrollHeight');
                    $('#chat1').scrollTop(height);
                     
            },
            error:  function(xhr,err){ 
                alert(xhr.responseText);
                
            }
        });
}


setInterval('loadMessage()', 1000);


