<?php

   include 'components/connect.php';

   setcookie('com_id', '', time() - 1, '/');

   header('location:index.php');

?>