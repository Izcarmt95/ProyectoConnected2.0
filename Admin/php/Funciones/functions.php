<?php
  include("../../../API/FuncionesPHP/registerPerson.php");
  include("../../../API/FuncionesPHP/getFollow.php");
  
  function getCountry(){
      getCountryDB();
  }

  function getFollowers(){
      getFollowerDB();
 
  }
  function getFollowings(){
  	getFollowingsDB();
  }
	
?>
