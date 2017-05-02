<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 02-May-17
 * Time: 1:42 PM
 */

$act = $http->get('act');
// define act file path according to the act element value
$fn = ACTS_DIR.str_replace('.','/', $act).'.php';
// control act file
if(file_exists($fn) and is_file($fn) and is_readable($fn)){
    // import act file
    require_once $fn;
} else {
    // if act file is not exists
    // define default act file path
    $fn = ACTS_DIR.DEFAULT_ACT.'.php';
    // define new value for act element in url
    $http->set('act', DEFAULT_ACT);
    // use default act
    require_once $fn;
}
?>