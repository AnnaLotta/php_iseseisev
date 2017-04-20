<?php

/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 20-Apr-17
 * Time: 1:43 PM
 */
class text
{
    // class text begin
    // class variables = instance variables

    var $str = '';

// constructor
    function __construct($s = '')
    {
        $this->setText($s);
    }//construct

    //methods
    //set text function
    function setText($s)
    {
        $this->str = $s;
    }// setText
    //show text function
    function show(){
        echo $this->str.'<br/>';
    }//show
}//text class end

?>