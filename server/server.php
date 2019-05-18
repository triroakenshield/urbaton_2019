<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $login = !empty($_POST['name']) ? $_POST['name'] : '';
    $password = !empty($_POST['location']) ? $_POST['location'] : '';
    
    try {
      $db_connection = mysqli_connect("127.0.0.1", "postgres", "test", "events_db");
      //echo 'connected';
    }
    catch(Exception $ex) {
        //echo $ex->getMessage();
    }
    echo 'great';