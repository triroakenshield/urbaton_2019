<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $categories = !empty($_POST['categories']) ? $_POST['categories'] : '';
    $dates = !empty($_POST['dates']) ? $_POST['dates'] : '';
    $position = !empty($_POST['position']) ? $_POST['position'] : '';
    
    // стартовая позиция
    //$position = [56.838011, 60.597465];
    
    try {
      $db_connection = mysqli_connect("127.0.0.1", "postgres", "test", "events_db");
      //echo 'connected';
      $req_str = "SELECT e.descr "
                . "     ,e.coords "
                . "     ,e.url "
                //. "     ,e.start_date"
                //. "     ,e.end_date"
                . "FROM events e ";
                /*. "WHERE categories in () "
                 . " and e.end_date >= " . dates[0]
                 . " and <=" . dates[1]
                 . " and distance < 0.05";*/
      $result = mysqli_query($db_connection,$req_str);
      /*$row=mysql_fetch_array($result);
      
      $desc = array(); $views = array();
        while($row = mysql_fetch_array($result)) {
                $desc[] = $row["video_desc"]; // or smth like $row["video_title"] for title
                $views[] = $row["video_views"];
        }
        $res = array($desc, $views);*/
        //echo json_encode($result);
      
      mysqli_free_result($result);
      
      
    }
    catch(Exception $ex) {
        echo json_encode('{result:"error"}');
    }
    echo json_encode('{"result":"ok","data":"' . $req_str. '"}');