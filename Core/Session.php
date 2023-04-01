<?php
defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');

class Session
{
    public string $name = 'MYSESSION';
    
    public function __construct($name='')
    {
        if(session_status() === PHP_SESSION_NONE) 
        {
            ini_set('session.save_path',BASE.'/Temp');
            ini_set('session.gc_probability', 1);
            session_start();
        }
        if(!empty($name))
        {
            $this->name = $name;
        }
        return $this;
    }
    
    public function Set($name,$value)
    {
        $_SESSION[$this->name][$name] = $value;
    }

    public function Get($name)
    {
        if(isset($_SESSION[$this->name][$name]))
        {
            return $_SESSION[$this->name][$name];
        }
        else
        {
            return FALSE;
        }
    }

    public function isSet($name)
    {
        if(isset($_SESSION[$this->name][$name]))
        {
            return TRUE;
        }
        return FALSE;
    }

    public function Del($name)
    {
        unset($_SESSION[$this->name][$name]);
        return $this;
    }

    public function Clear($name)
    {
        $_SESSION[$name] = array();
        return $this;
    }

    public function Destroy()
    {
        $_SESSION = array();
        session_destroy();
        return $this;
    }

}
