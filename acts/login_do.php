<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 02-May-17
 * Time: 1:59 PM
 */

$username = $http->get('username');
$password = $http->get('password');
$sql = 'select * FROM user WHERE '.'username ='.fixDb($username).' AND '.'password='.fixDb(md5($password)).' AND '.' is_active=1';
$res =$db->getArray($sql);
if ($res === false){
    $sess->set ('login_error', tr('Viga sisselogimisel'));
    $link = $http->geLink(array('act'=>'login'), array('username'));
    $http->redirect($link);
}
else{
    $sess->createSession($res[0]);
    $http->redirect();
    //now we have to redirect to index.php
}