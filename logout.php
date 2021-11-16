<?php
session_start();
session_destroy();
include 'inc.php';
redirect('login.php');
?>