<?php

/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 2:51 PM
 */
// if TMPL_DIR is not defined
if(!defined('TMPL_DIR')){
    // define this constatnt and use in class template
    define('TMPL_DIR', '../tmpl/');
}

class template
{
    // class variables
    var $file = ''; // template file name
    var $content = false; // template content is now empty
    var $vars = array(); // table for real values of html template output
    // class methods
    // construct
    function __construct($f)
    {
        $this->file = $f;
        $this->loadFile();
    }// construct

    function loadFile()
    {
        $f = $this->file; // use file name variable
        // if theres a problem with tmpl directory
        if (!is_dir(TMPL_DIR)) {
            echo 'Kataloogi' . TMPL_DIR . ' ei leitud <br/>';
            exit;
        }
        // if we are in tmpl directory already - $this->file is 'tmpl/file.html'
        if (file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }
        // we can set path to template file: tmpl/file.html, $this->file is file.html
        $f = TMPL_DIR . $this->file;
        if (file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }
        // we can ser only file name, $this->file is file
        $f = TMPL_DIR . $this->file . '.html';
        if (file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }
        if ($this->content === false) {
            echo 'Ei suutnud lugeda ' . $this->file . '<br/>';
            exit;
        }
    }// loadfile

    function readFile($f)
    {
        $this->content = file_get_contents($f);
    } // readfile
} // class end