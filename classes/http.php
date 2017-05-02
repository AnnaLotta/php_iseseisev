<?php
/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 02-May-17
 * Time: 12:13 PM
 */


// useful function

function fixHtml($val){
    return htmlentities($val);
}//fixHtml
class http
{ // http begin
    // class variables
    var $server = array(); //server data
    var $vars = array(); // http data
    var $cookie = array(); // cookies data
    // class methods
    // construct
    // object creation and initializing by init() and initConst methods
    function __construct()
    {
        $this->init();
        $this->initConst();
    }// __construct
    // initialise class variables
    function init(){
        $this->server = $_SERVER; // real server data
        $this->cookie = $_COOKIE; // real cookie data
        $this->vars = array_merge($_GET, $_POST, $_FILES); // real http data
    } // init
    // initialise class constants
    function initConst(){
        $vars = array('REMOTE_ADDR', 'PHP_SELF', 'SCRIPT_NAME', 'HTTP_HOST');
        foreach($vars as $var){
            if(!defined($var) and isset($this->server[$var])){
                define($var, $this->server[$var]);
            }
        }
    }// initConst
    // set u data for http object - pairs element_name => element value
    function set($name, $val){
        $this->vars[$name] = $val;
    }// set
    // get element_value according to the element_name
    function get ($name, $fix = true){
        // if element with such name is exists
        if(isset($this->vars[$name])){
            if($fix){
                return fixHtml($this->vars[$name]);
            }
            return $this->vars[$name];
        }
        // if element with such name does not excist
        return false;
    }// get

    // delete http data element
    function del($name){
        if(isset($this->vars[$name])){
            unset($this->vars[$name]);
        }
    } // del
} // http end