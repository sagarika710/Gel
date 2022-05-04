<?php

session_start();
unset( $_SESSION["username"] );
unset( $_SESSION["article_small_desc"] );
unset( $_SESSION["article_long_desc"] );
header("Location: ./login.php");
die();

?>