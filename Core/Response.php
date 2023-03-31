<?php
defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
class Response
{
    public int $Code = 200;
    public string $File = '';
    public string $Module = 'Land';
    public string $Class = 'Land';
    public string $Function = 'index';
    public array $Params = [];
}