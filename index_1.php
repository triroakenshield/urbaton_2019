<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          try {
            $db_connection = pg_connect("host='169.254.74.8' dbname=events_db user=postgres password=test");
            echo 'connected';
          }
          catch(Exception $ex) {
              echo $ex->getMessage();
          }
        ?>
    </body>
</html>
