function createPost()
{ 	
    $post = $("#post").val();
    $media =    $('input[type=file]').val();
    if($post == '' && $media == ''){
        alert("Please write something or attach photo to post");

    }
    else{
        $.ajax({
            type:  "POST",
            url:   "/ProyectoConnected2.0/Admin/php/Funciones/createPost.php",
            dataType: "json",
            data: { "post":$post, "media":$media,
                    "tag":'post'},
                     
            beforeSend: function(){
                //Lo que se hace antes de enviar el formulario
            },
            success: function(response){
               window.location.href = 'index.php';

            },
            error:  function(xhr,err){ 
                 alert(xhr.responseText);
            }
        }); 

    }   
}

