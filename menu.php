<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 3:21 PM
 */

$menu = new template('menu.menu'); // in menu directory is file menu.html menu/menu.html
$item = new template('menu.item');
// menu item creation - begin
// add pairs of item template element names and real values
$item->set('name', 'First page');
$link = $http->getLink(array('act'=>'first'));
$item->set('link',$link);
// control created item output
//echo '<pre>';
//print_r($item);
//echo '</pre>'
//add menu item to menu
$menu->set('items',$item->parse());
// menu item creation - end
//
// menu item creation - begin
// add pairs of item template element name and real values
$item->set('name', 'Second page');
$link = $http->getLink(array('act'=>'second'));
$item->set('link', $link);
// control created item output
//echo '<pre>';
//print_r($item);
//echo '</pre>'
// add menu item to menu
$menu->add('items', $item->parse()); // add another item to menu
// menu item creation - end
//
// control created menu output
//echo'<pre>';
//print_r($menu);
//echo'</pre>';
?>