function createPost()
{ 	
    $post = $("#post").val();
    $media =    $('input[type=file]').val();
    if($post == '' && $media == ''){
        alert("Please write something or attach photo to post");

    }
    else if($post != '' && $media == ''){
        alert();
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
    else{
        var data = new FormData();
        data.append('media', $('#media')[0].files[0]);
        data.append('post',$('#post').val());
        $.ajax({
            url: "/ProyectoConnected2.0/Admin/php/Funciones/upload.php",
            type: "POST",
            data:  data,
            dataType: "json",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                window.location.href = 'index.php';
            },
            error:  function(xhr,err){ 
                 alert(xhr.responseText);
            }           
       });
    }  
}

