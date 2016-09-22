<?php
include("php/connection/connectionAux.php");


function posting($post,$user){
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
    echo                '<span class="description">Shared publicly - Time of Publication</span>';
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

function getPost(){
    $db4 = dbConnect();
   $db = dbConnect();
   $result = $db->selectGremlin('g.V', '*:-1');
     $i = 0;
     $idSession = $_SESSION['idPerson'];
     $Following = $db4->selectGremlin("g.v('".$idSession."').outE('Follows').inV.id",'*:-1');
     foreach ($result as $key => $value) {
        $db2 = dbConnect();
        
        $db5 = dbConnect();
        $db6 = dbConnect();
        $db7 = dbConnect();


        $idPerson = $db5->selectGremlin("g.V[".$i."].id");
        if ($Following == []){$Following = ["empty"];}
        if (!is_array($Following)){$Following = [$Following];}
        
            try{
                if (in_array($idPerson, $Following) || $idPerson == $idSession){

                    $idPost = $db2->selectGremlin("g.V[".$i."].outE('ToPost').inV.id",'*:-1');
                    
                    $firstName = $db6->selectGremlin("g.V[".$i."].firstName",'*:-1');
                    $lastName = $db7->selectGremlin("g.V[".$i."].lastName",'*:-1');
                    $fullName = $firstName.' '.$lastName;
                    $fullName = str_replace('"','',$fullName);
                    
                    if (!is_array($idPost)){$idPost = [$idPost];}
                    
                    if (!empty($idPost)){
                        foreach ($idPost as $key => $value) {
                        
                            $db3 = dbConnect(); 
                            $data2 = $db3->selectGremlin("g.v('".$value."').description", '*:-1');
                            $data2 = str_replace('"','',$data2);
                            posting($data2,$fullName); 
                        }
                    }


                     
                }
            }
            catch(Exception $e){
     
            }
        
        $i++;
     //$v = $db->selectGremlin('g.V[1]','*:-1');
     //$data = $db->selectGremlin("g.V[1].outE",'*:-1');
     //echo $data->content;
    }
}
?>