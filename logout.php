<?php
    //session_start();
   // 

// Initialize the session.
// If you are using session_name("something"), don't forget it now!
//session_start();

// Unset all of the session variables.
//$_SESSION['user'] = [];

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
//if (ini_get("session.use_cookies")) {
  //  $params = session_get_cookie_params();
    //setcookie(session_name(), '', time() - 42000,
      //  $params["path"], $params["domain"],
        //$params["secure"], $params["httponly"]
   // );
//}

// Finally, destroy the session.
//session_destroy();

   session_start();
   // session_unset();
   $_SESSION= array();
    session_destroy();
//session_write_close();
   // setcookie(session_name(),'',0,'/');
    //session_regenerate_id(true);


       header("location:index.php");
?>