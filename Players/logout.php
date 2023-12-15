<?php

session_start();
session_destroy();
header("Location: ../loginform.php");

?>