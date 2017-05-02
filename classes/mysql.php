<?php

/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 02-May-17
 * Time: 1:00 PM
 */
class mysql
{ // class begin
    // class variables
    var $conn = false; // connection to database server
    var $host = false; // database server name / ip
    var $user = false; // database server user
    var $pass = false; // database server user password
    var $dbname = false; // database server user database
    var $history = array(); // database query log array
    // class methods
    // construct
    function __construct($h, $u, $p, $dn)
    {
        $this->host = $h;
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $dn;
        $this->connect();
    }// construct
    // connect to database server and use database
    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->conn){
            echo 'Probleem andmebaasiga uhendamisel <br />';
            exit;
        }
    }// connect
    // control query time
    function getMicrotime(){
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + ((float)$sec));
    }// getMicrotime
    // query to database
    function query($sql){
        $begin = $this->getMicrotime();
        $res = mysqli_query($this->conn, $sql); // query result
        if($res === FALSE){
            echo 'Viga paringus <b>'.$sql.'</b><br />';
            echo mysqli_error($this->conn).'<br />';
            exit;
        }
        $time = $this->getMicrotime() - $begin;
        $this->history[] = array(
            'sql' => $sql,
            'time' => $time
        );
        return $res;
    }// query
    // query with data result
    function getArray($sql){
        $res = $this->query($sql);
        $data = array();
        while($record = mysqli_fetch_assoc($res)){
            $data[] = $record;
        }
        if(count($data) == 0){
            return false;
        }
        return $data;
    }// getArray
    // output query history log array
    function showHistory(){
        if(count($this->history) > 0){
            echo '<hr />';
            foreach ($this->history as $key=>$val){
                echo '<li>'.$val['sql'].'<br />';
                echo '<strong>'.round($val['time'], 6).'</strong><br /></li>';
            }
        }
    }// showHistory

}// class end
?>