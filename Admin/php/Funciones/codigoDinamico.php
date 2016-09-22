<?php

 include("../../php/connection/connection.php");
 /**
    Function for creation of code requiered in people.php
 */

function userProfile($userName,$email){

	echo  '<br><br><br>';
	echo '<section class="content">';
    echo               '<form method="post"
                             action="../../php/Funciones/follow.php">';
    echo  '<!-- Widget: user widget style 1 -->';
    echo  '<div class="col-md-3">';
    echo      '<div class="box box-widget widget-user">';
    echo        '<!-- Add the bg color to the header using any of the bg-* classes -->';
    echo        '<div class="widget-user-header bg-aqua-active">';
    echo          '<h3 class="widget-user-username">'.$userName.'</h3>';
    echo          '<h5 class="widget-user-desc" >Profession</h5>';
    echo        '</div>';
    echo        '<div class="widget-user-image">';
    echo          '<img class="img-circle" src="../../dist/img/user1-128x128.jpg" alt="User Avatar">';
    echo        '</div>';
    echo        '<div class="box-footer">';
    echo          '<div class="row">';
    echo            '<!-- /.col -->';
    echo            '<div class="col-sm-4 border-right">';
    echo              '<div class="description-block">';
    echo                 '<h5 class="description-header">#</h5>';
    echo                '<span class="description-text">FOLLOWERS</span>';
    echo              '</div>';
    echo              '<!-- /.description-block -->';
    echo            '</div>';
    echo            '<!-- /.col -->';
    echo          '</div>';
    echo			'<div class="row">';
    echo            '<div class="col-xs-12">';
    
    echo                '<button id="submit" name="btnFollow" value="'.$email.'" type="submit" class="btn      btn-primary   btn-block btn-flat">Follow</button>';
    echo              '</form>';

    echo            '</div>';
    echo          '</div>';
    echo        '</div>';
    echo      '</div>';
    echo    '</div>';
    echo '</section>';
};


function getPerson(){
    $db4 = dbConnect();
     $db = dbConnect();
     $result = $db->selectGremlin('g.V', '*:-1');
     $i = 0;
     $idSession = $_SESSION['idPerson'];
     $Following = $db4->selectGremlin("g.v('".$idSession."').outE('Follows').inV.id",'*:-1');
     foreach ($result as $key => $value) {
        $db2 = dbConnect();
        $db3 = dbConnect(); 
        $db5 = dbConnect();
        $idPerson = $db5->selectGremlin("g.V[".$i."].id");
        if ($Following == []){$Following = ["empty"];}
        if (!is_array($Following)){$Following = [$Following];}
        
            try{
                if (!in_array($idPerson, $Following) && $idPerson != $idSession){
                    $data = $db2->selectGremlin("g.V[".$i."].email",'*:-1');
                    $data2 = $db3->selectGremlin('g.V("email", '.$data.').firstName', '*:-1');
                  
                    $data2 = str_replace('"','',$data2);
                    $data = str_replace('"','',$data);
                    userProfile($data2,$data);  
                }
            }
            catch(Exception $e){
     
            }
        
        $i++;
    }
}


function profileConectedUser(){
    //Connection
    $db = dbConnect();
    $db2 = dbConnect();

    //Global variables
    $fullName = $_SESSION['fullName'];
    $id = $_SESSION['idPerson'];
   
    //Querys
    $following = $db->selectGremlin('g.v("'.$id.'").outE("Follows").inV.id','*:-1');

    if (empty($following) ){
        $following = 0;
    }
    else{
        $following =  count($following);    
    }
    
    $followers = $db2->selectGremlin('g.v("'.$id.'").inE("Follows").outV.id','*:-1');

    if (empty($followers)){
        $followers = 0;
    }
    else{
        $followers =  count($followers);    
    }


    //Print into profile.php
    echo '<div class="box box-primary">';
    echo        '<div class="box-body box-profile">';
    echo          '<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user2-160x160.jpg" alt="User profile picture">';

    echo          '<h3 class="profile-username text-center">'.$fullName.'</h3>';

    echo          '<p class="text-muted text-center">Profession</p>';
    echo              '<ul class="list-group list-group-unbordered">';
    echo            '<li class="list-group-item">';
    echo              '<b>Followers</b> <a class="pull-right">'.$followers.'</a>';
    echo            '</li>';
    echo            '<li class="list-group-item">';
    echo              '<b>Following</b> <a class="pull-right">'.$following.'</a>';
    echo            '</li>';
    echo          '</ul>';
    echo        '</div>';
    echo        '<!-- /.box-body -->';
    echo      '</div>';
}


?>