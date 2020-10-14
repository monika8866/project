<?php

    $dbhost='localhost';
    $dbuser="root";
    $dbpassword='';
    $dbname='project';
    $connection=mysqli_connect($dbhost,$dbuser,$dbpassword)
    or die("Couldn't connect to server");

    $db= mysqli_select_db($connection,$dbname);
    