<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 1:45 PM
 */

// require the object creating and using class
require_once('OOP/text.php');
// create an object
$sentence = new text();
// control object output
echo '<pre>';
print_r($sentence);
echo '</pre>';
//set text
$sentence->setText('Text object');
//control object output
echo '<pre>';
print_r($sentence);
echo '</pre>';
// show object output
$sentence->show();

?>