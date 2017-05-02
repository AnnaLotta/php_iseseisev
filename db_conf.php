<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 02-May-17
 * Time: 3:55 PM
 */


define('DBUSER', "root"); // db user
define('DBPASS', "pass"); // db password (mention your db password here)
define('DBNAME', "kasutajanimi_web"); // database name
define('DBHOST', "localhost"); // db server

$connect = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
?>