<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 1:40 PM
 */
require_once 'conf.php';
// create and template object
// define('CLASSES_DIR', 'classes/');
// define ('TMPL_DIR', 'tmpl/');
// define('STYLE_DIR', 'css/');
require_once CLASSES_DIR.'template.php';
// and use it
// create a template object
// set up the file name for template
// load template file content
$tmpl = new template('main.html');
// add pairs of template element names and real values
// $tmpl->set('menu', 'Menu');
require_once 'menu.php';
require_once 'act.php';
$tmpl->set('nav_bar', $sess->user_data['username']);
$tmpl->set('lang_bar', 'Languages');
$tmpl->set('content', 'Content');
$tmpl->set('style', STYLE_DIR.'main.css');
$tmpl->set('header', 'Page title');
// control the content of template object
echo '<pre>';
//print_r($sess);
echo '</pre>';
// output template content set up with real values
echo $tmpl->parse();

?>