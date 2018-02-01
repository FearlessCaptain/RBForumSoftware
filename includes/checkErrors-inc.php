<?php

include_once 'includes/deleteThread-inc.php';

// load threads for the main forum page
// id here refers to the thread i


// will have more functionality later
function errorCheck($conn, $var){
  if ($var === "nobody"){;
    return "Your post has no body. Please type something." ;
  }
  if ($var === "notitle"){;
    return "Your post has no title. Please add a title." ;
  }
  if ($var === "newavatarsuccess"){;
    return "New avatar loaded." ;
  }


  else{
    return $var;
  }
}
