<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 3:21 PM
 */

$menu = new Template('menu.menu');
$menu->set('items', false); // if not logged in, cant see the menu
$item = new Template('menu.item');

// show menu
$sql = 'SELECT content_id, title FROM content WHERE '.
    'parent_id="0" AND '.
    'show_in_menu="1"';
// if not an admin can only see some contenct, when hidden = 1 - is available only for admins
if(ROLE_ID != ROLE_ADMIN) {
    $sql .= ' and is_hidden="0"';
}
$sql .= ' ORDER BY sort ASC';
$res = $db->getArray($sql);

if($res != false){
    foreach ($res as $page) {
        $link = $http->getLink(array('page_id' => $page['content_id']));
        $item->set('link', $link);
        $item->set('name', $page['title']);
        $menu->add('items', $item->parse());
    }
}
// if the user is logged in - either admin or normal user
// we create them a way to log out
if(USER_ID != ROLE_NONE){
    $link = $http->getLink(array('act' => 'logout'));
    $item->set('link', $link);
    $item->set('name', 'Log out');
    $menu->add('items', $item->parse());
}
$tmpl->set('menu', $menu->parse());

?>