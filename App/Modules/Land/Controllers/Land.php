<?php
defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');

class Land extends Controller
{
    public function index()
    {
        new View('Land/Views/land',$this->data);
    }
}