<?php
    include("/var/www/html/ProyectoConnected2.0/API/FuncionesPHP/getPost.php");
function postingText($post,$user,$date){
    echo '<div class="nav-tabs-custom">';
    echo        '<div class="tab-content">';
    echo          '<div class="active tab-pane" id="activity">';
    echo            '<div class="post">';
    echo              '<div class="user-block">';
    echo                '<img class="img-circle img-bordered-sm" src="dist/img/user1-128x128.jpg" alt="user image">';
    echo                    '<span class="username">';
    echo                      '<a href="#">'.$user.'</a>';
    echo                      '<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>';
    echo                    '</span>';
    echo                '<span class="description">'.$date.'</span>';
    echo              '</div>';
    echo              '<p>
                    '.$post.'
                  </p>';
    echo              '<ul class="list-inline">';
    echo                '<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>';
    echo                '<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>';
    echo                '</li>';
    //echo                '<li class="pull-right">';
    //echo                  '<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments(5)</a></li>';
    echo              '</ul>';

    echo            '</div>';
    echo          '</div>';
    echo      '</div>';
    echo    '</div>';

}

function postingImage($post,$user,$date,$string){
    echo '<div class="nav-tabs-custom">';
    echo        '<div class="tab-content">';
    echo          '<div class="active tab-pane" id="activity">';
    echo            '<div class="post">';
    echo              '<div class="user-block">';
    echo                '<img class="img-circle img-bordered-sm" src="dist/img/user1-128x128.jpg" alt="user image">';
    echo                    '<span class="username">';
    echo                      '<a href="#">'.$user.'</a>';
    echo                      '<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>';
    echo                    '</span>';
    echo                '<span class="description">'.$date.'</span>';
    echo              '</div>';
    echo            '<div class="wrapperP">';
    echo             '<div class="containerP">';
    echo              '<div id="two-columns" class="grid-container" style="display:block;">';
    echo            '<ul class="rig columns-2">';
    echo               '<li>';
    echo                   '<img src="data:image/gif;base64,'.$string.'"   width="400px" height="200px" />';
    echo               '</li>';
    echo             '</ul>';
    echo            '</div>';
    echo            '</div>';
    echo            '</div>';
    echo              '<p>
                    '.$post.'
                  </p>';
    echo              '<ul class="list-inline">';
    echo                '<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>';
    echo                '<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>';
    echo                '</li>';
    //echo                '<li class="pull-right">';
    //echo                  '<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments(5)</a></li>';
    echo              '</ul>';

    echo            '</div>';
    echo          '</div>';
    echo      '</div>';
    echo    '</div>';

}

function getPost(){
    $post = getPostDB(); 
    foreach ($post as $key) {
          if($key['media'] == ''){
            postingText($key['text'],$key['fullName'],$key['date']);
          }
          else{
            postingImage($key['text'],$key['fullName'],$key['date'],$key['media']);
          }
      }  

}
?>