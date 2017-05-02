<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 02-May-17
 * Time: 2:52 PM
 */

function fixDb($val){
    return '"'.addslashes($val).'"';
}
?>