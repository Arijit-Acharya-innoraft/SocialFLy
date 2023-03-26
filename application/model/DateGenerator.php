<?php

require_once "db_conn.php";
class DateGenerator {


  function createDate()
  {
    $date = date('Y-m-d H:i:s', time());
    return $date;
  }

}


?>
