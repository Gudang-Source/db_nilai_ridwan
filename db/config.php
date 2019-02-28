<?php
class database{
  var $host = "localhost";
  var $uname = "root";
  var $pass = "";

  var $db = "db_nilai";

  function __construct(){
    mysql_connect($this->host,$this->uname,$this->pass);
    mysql_select_db($this->db);
  }

  function tampil($table){
    $q = mysql_query("SELECT * FROM $table");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

  function tambah($table,$value){
    $q = mysql_query("INSERT INTO $table VALUES ($value) ");
  }

  function edit($table,$value,$where){
    $q = mysql_query("UPDATE $table SET $value WHERE $where");
  }

  function hapus($table,$where){
    $q = mysql_query("DELETE FROM $table WHERE $where ");
  }

  function tampil_join1($table,$table_join1,$join1){
    $q = mysql_query("SELECT * FROM $table LEFT JOIN $table_join1 ON $join1");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

  function tampil_join2($table,$table_join1,$join1,$table_join2,$join2){
    $q = mysql_query("SELECT * FROM $table LEFT JOIN $table_join1 ON $join1 LEFT JOIN $table_join2 ON $join2");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

  function tampil_join3($table,$table_join1,$join1,$table_join2,$join2,$table_join3,$join3){
    $q = mysql_query("SELECT * FROM $table LEFT JOIN $table_join1 ON $join1 LEFT JOIN $table_join2 ON $join2 LEFT JOIN $table_join3 ON $join3");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

  function tampil_join4($table,$table_join1,$join1,$table_join2,$join2,$table_join3,$join3,$table_join4,$join4){
    $q = mysql_query("SELECT * FROM $table LEFT JOIN $table_join1 ON $join1 LEFT JOIN $table_join2 ON $join2 LEFT JOIN $table_join3 ON $join3 LEFT JOIN $table_join4 ON $join4");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

  function tampil_join1_where($table,$table_join1,$join1,$where){
    $q = mysql_query("SELECT * FROM $table LEFT JOIN $table_join1 ON $join1 WHERE $where");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

  function tampil_join2_where($table,$table_join1,$join1,$table_join2,$join2,$where){
    $q = mysql_query("SELECT * FROM $table LEFT JOIN $table_join1 ON $join1 LEFT JOIN $table_join2 ON $join2 WHERE $where");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

  function tampil_join5_where($table,$table_join1,$join1,$table_join2,$join2,$table_join3,$join3,$table_join4,$join4,$table_join5,$join5,$where){
    $q = mysql_query("SELECT * FROM $table LEFT JOIN $table_join1 ON $join1 LEFT JOIN $table_join2 ON $join2 LEFT JOIN $table_join3 ON $join3 LEFT JOIN $table_join4 ON $join4 LEFT JOIN $table_join5 ON $join5 WHERE $where");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

  function tampil_where($table,$where){
    $q = mysql_query("SELECT * FROM $table where $where");
    $result = array();
    while ($d = mysql_fetch_assoc($q)) {
      $result[] = $d;
    }
    return $result;
  }

}
 ?>
