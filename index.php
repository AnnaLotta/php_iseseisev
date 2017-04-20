<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 1:40 PM
 */
// create and template object
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
require_once TMPL_DIR.'template.php';
// and use it
// create a template object
// set up the file name for template
// load template file content
$tmpl = new template('main.php');
// control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';

?>