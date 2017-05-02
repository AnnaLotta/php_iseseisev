<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 02-May-17
 * Time: 1:54 PM
 */

$form = new Template ('login');
$form-> set('error', $sess->get('login_error'));
$sess->del('login_error');
$form->set('username_str', 'Username');
$form->set('password_str', 'Password');
$form->set('username', $http->get('username', true));
$link = $http->getLink(array('act' => 'login_do'));
$form -> set('action', $link);
$tmpl->set('content', $form->parse());
?>