<!-- Credit to my soen 287 teacher Denis Rinfret :) session4.php-->
<?php
session_start();
?>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('Location: login.php'); 
?>