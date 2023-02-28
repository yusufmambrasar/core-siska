<?php
defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
class Request
{

    public string $Agent = ''; 
    public string $Method = 'GET';
    public string $Protocol = 'HTTP/1.1'; 
    public string $Scheme = 'http';
    public string $Host = 'localhost';
    public string $Port = '80';
    public string $Uri = '';
    public string $Query = '';

    public function __construct()
    {
        $this->Agent = $_SERVER['HTTP_USER_AGENT'];
        $this->Method = $_SERVER['REQUEST_METHOD'];
        $this->Protocol = $_SERVER['SERVER_PROTOCOL'];
        $this->Scheme = $_SERVER['REQUEST_SCHEME'];
        if($_SERVER['SERVER_ADDR']=='::1')
        {
            if(!empty($_SERVER['SERVER_NAME']))
            {
                $this->Host = $_SERVER['SERVER_NAME'];
            }
            else
            {
                $this->Host = $_SERVER['HTTP_HOST'];
            }
        }
        else
        {
            $this->Host = $_SERVER['SERVER_ADDR'];
        }
        $this->Uri = $_SERVER['REQUEST_URI'];
        $this->Query = $_SERVER['QUERY_STRING'];
    }
}