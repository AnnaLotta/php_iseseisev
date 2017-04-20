<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 1:45 PM
 */

// require the object creating and using classes
require_once('text.php');
require_once('ctext.php');
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

echo '<hr/>';
// create an object
$sentence2 = new text ('Text by construct');
// control object output
echo '<pre>';
print_r($sentence2);
echo '</pre>';
//show object output
$sentence2->show();
echo '<hr/>';
// create and object
$sentence3 = new text ('Hello colored text by construct');
// control object output
echo '<pre>';
print_r($sentence3);
echo '</pre>';
// show object output

$sentence3->show();
// set object color
$sentence3->setColor('#FF0000');
echo '<pre>';
print_r($sentence3);
echo '</pre>';
//show object output
$sentence3->show();
?>