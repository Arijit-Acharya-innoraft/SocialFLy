<?php
// Including the dependencies.
require_once "db_conn.php";

/**
 * This class create the date and time.
 * It has 1 method.
 */
class DateGenerator {

/**
 * This method is used to create the current time and date when called.
 */
  function createDate()
  {
    $date = date('Y-m-d H:i:s', time());
    return $date;
  }

}

?>
