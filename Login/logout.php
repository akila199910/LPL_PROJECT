<?php

session_start();
unset($_SESSION['user_id']);
header("Location: loginform.php");

/*session_start();

if (isset($_SESSION['user_id'])) {
    session_destroy();
    header("Location: loginform.php");


} else {
    header("Location: loginform.php");
}*/

?>