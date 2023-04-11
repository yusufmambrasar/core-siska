<?php
defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');

class Controller 
{   
    public array $data = [];
    public array $config = [];
    private array $_loaded = [];

    public function __construct()
    {
        $this->Load('Core/Database');
        $this->Load('Core/Session');
        $file = BASE . '/App/Configs/App.php';
        if(file_exists($file))
        {
            $config = [];
            include($file);
            foreach($config as $k => $v)
            {
                $this->config[$k] = $v;
                $this->data['config'][$k] = $v;
            } 
        }
    }

    public function Load($path='')
    {
        if(!empty($path))
        {
            $path = BASE . '/' . $path . '.php';
            $pathinfo = pathinfo($path);
            if($pathinfo['extension']!=='php')
            {
                $path = $path . '.php';
            }
            if(!isset($this->_loaded[$pathinfo['filename']]))
            {
                if(file_exists($path))
                {
                    include($path);
                    if(class_exists($pathinfo['filename']))
                    {
                        $class = $pathinfo['filename'];
                        $this->$class = new $class();
                        $this->_loaded[$class] = TRUE;
                    }
                }
            }
        }
        else
        {
            return NULL;
        }
    }

}