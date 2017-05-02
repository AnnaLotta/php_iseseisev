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
$tmpl->set('menu', 'Menu');
$tmpl->set('nav_bar', 'Navigation');
$tmpl->set('lang_bar', 'Languages');
$tmpl->set('content', 'Content');
$tmpl->set('style', STYLE_DIR.'main.css');
$tmpl->set('header', 'Page title');
// control the content of template object
echo $tmpl->parse();

// echo '<pre>;
//print_r($db);
?>