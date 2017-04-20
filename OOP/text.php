<?php

/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 1:43 PM
 */
// create a template object
define('CLASSES_DIR', '../classes');
define('TMPL_DIR', 'tmpl/');
require_once CLASSES_DIR.'template.php';
// and use it
// create an empty template object
$tmpl = new template();
// set up the file name for template
$tmpl->file = 'main.html';
// control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';
// load template file content
$tmpl->loadFile();
// control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';
echo '<hr/>';
$main = new template('main.html');
echo '<pre>';
print_r($main);
echo '</pre>';
?>