<?php

    $dbhost='localhost';
    $dbuser="root";
    $dbpassword='';
    $dbname='project';
    $connection=mysqli_connect($dbhost,$dbuser,$dbpassword)
    or die("Couldn't connect to server");

    $db= mysqli_select_db($connection,$dbname);

    if (!$db) 
    {
        $query = 'CREATE DATABASE '.$dbname;

        $result=mysqli_query($connection,$query);
    }

    $query = "CREATE TABLE IF NOT EXISTS products (
                                                    id int(11) AUTO_INCREMENT,
                                                    name varchar(50) NOT NULL,
                                                    price FLOAT(11) NOT NULL,
                                                    image varchar(200) NOT NULL,
                                                    category_id int(11) NOT NULL,
                                                    tag varchar(50) Not Null,
                                                    description varchar(1000) NOT NULL,
                                                    PRIMARY KEY  (id)
                                                    )";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $query = "CREATE TABLE IF NOT EXISTS categories (
                                                    id int(11) AUTO_INCREMENT,
                                                    name varchar(50) NOT NULL,
                                                    PRIMARY KEY  (id)
                                                    )";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $query = "CREATE TABLE IF NOT EXISTS tags (
                                                id int(11) AUTO_INCREMENT,
                                                name varchar(50) NOT NULL,
                                                PRIMARY KEY  (id)
                                                )";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $query = "CREATE TABLE IF NOT EXISTS tags_products (
                                                        product_id int(11) NOT NULL,
                                                        tag_id int(11) NOT NULL
                                                        )";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $query = "CREATE TABLE IF NOT EXISTS colors (
                                                    product_id int(11) NOT NULL,
                                                    color varchar(50) NOT NULL,
                                                    quantity int(11) NOT NULL
                                                    )";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $query = "CREATE TABLE IF NOT EXISTS users (
                                                id int(11) AUTO_INCREMENT,
                                                username varchar(50) NOT NULL,
                                                password varchar(50) NOT NULL,
                                                email varchar(50) NOT NULL,
                                                dob DATE NOT NULL,
                                                address varchar(500) NOT NULL,
                                                PRIMARY KEY  (id)
                                                )";
    $result = mysqli_query($connection, $query);

    $query = "CREATE TABLE IF NOT EXISTS orders (
                                                id int(11) AUTO_INCREMENT,
                                                cartdata varchar(1000) NOT NULL,
                                                total FLOAT(11) NOT NULL,
                                                status varchar(50) NOT NULL,
                                                ordertime datetime NOT NULL,
                                                PRIMARY KEY  (id)
                                                )";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));