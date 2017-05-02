<?php

/**
 * Created by PhpStorm.
 * User: Ari
 * Date: 02-May-17
 * Time: 2:06 PM
 */
class session
{// class begin
    // class variables
    var $sid = false;
    var $vars = array();
    var $http = false;
    var $db = false;
    var $anonymous = true;
    var $timeout = 1800;
    // class methods
    // construct
    function __construct(&$http, &$db)
    {
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid');
        $this->checkSession();
    }// construct
    // set anon
    function setAnonymous($bool){
        $this->anonymous = $bool;
    }// setAnonymous
    // setup timeout
    function setTimeout($t){
        $this->timeout = $t;
    }// setTimeout
    // create session
    function createSession($user = false){
        // anon session
        if($user == false){
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
        }
        // create session id number
        $sid = md5(uniqid(time().mt_rand(1,1000), true));
        // insert data into database
        $sql = 'INSERT INTO session SET '.
            'sid='.fixDb($sid).', '.
            'user_id='.fixDb($user['user_id']).', '.
            'user_data='.fixDb(serialize($user)).', '.
            'login_ip='.fixDb(REMOTE_ADDR).', '.
            'created=NOW()';
        $this->db->query($sql);
        // setup session id number
        $this->sid = $sid;
        $this->http->set('sid', $sid);
    }// create session
    //delete session data from database
    function clearSessions(){
        $sql = 'DELETE FROM session'.' WHERE '.
            time().' - UNIX_TIMESTAMP(changed) > '.
            $this->timeout;
        $this->db->query($sql);
    }// clearSessions

    // control session
    function checkSession(){
        $this->clearSessions();
        if($this->sid === false and $this->anonymous){
            $this->createSession();
        }
        if($this->sid !== false){
            // get data about this session
            $sql = 'SELECT * FROM session WHERE '.
                'sid='.fixDb($this->sid);
            $res = $this->db->getArray($sql);
            if($res == false){
                if($this->anonymous){
                    $this->createSession();
                } else {
                    $this->sid = false;
                    $this->http->del('sid');
                }
                define('ROLE_ID', 0);
                deinfe('USER_ID', 0);
            }
            else {
                $vars = unserialize($res[0]['svars']);
                if(!is_array($vars)){
                    $vars = array();
                }
                $this->vars = $vars;
                $user_data = unserialize($res[0]['user_data']);
                define('ROLE_ID', $user_data['role_id']);
                define('USER_ID', $user_data['user_id']);
                $this->user_data = $user_data;
            }
        } else {
            define('ROLE_ID', 0);
            define('USER_ID', 0);
        }
    }// checkSession
    // delete session by request
    function deleteSession(){
        if($this->sid !== false){
            $sql = 'DELETE FROM session WHERE '.
                'sid='.fixDb($this->sid);
            $this->db->query($sql);
            $this->sid = false;
            $this->http->del('sid');
        }
    }// deleteSession
    // setup data for http object - pairs element_name => element value
    function set($name, $val){
        $this->vars[$name] = $val;
    }// set
    // get element_value according to the element_name
    function get($name){
        // if element with such name exists
        if(isset($this->vars[$name])){
            return $this->vars[$name];
        }
        // if an element with such name does not exist
        return false;
    }// get
    // delet http data element
    function del($name){
        if(isset($this->vars[$name])){
            unset($this->vars[$name]);
        }
    }//del
    //update session data
    function flush(){
        if($this->sid !== false){
            $sql = ' UPDATE session SET changed=NOW(), '.
                'svars='.fixDb(serialize($this->vars)).
                ' WHERE sid='.fixDb($this->sid);
        }
    }

}//class end
?>