<?php
defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');

if (! function_exists('Minifier')) 
{
    function Minifier($code) 
    {
        $search = array(
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s',
            '/<!--(.|\s)*?-->/'
        );
        $replace = array('>', '<', '\\1');
        $code = preg_replace($search, $replace, $code);
        return $code;
    }
}

if (! function_exists('CurrentUrl')) 
{
    function CurrentUrl($return=FALSE)
    {
        $output = sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI'],
        );
        if($return)
        {
            return $output;
        }
        else
        {
            echo $output;
        }
    }
}

if (! function_exists('SiteUrl')) 
{
    function SiteUrl($Uri='', $return=FALSE)
    {
        $Path = str_replace($_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);
        $output = sprintf(
            "%s://%s%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $Path,
            $Uri,
        );
        if($return)
        {
            return $output;
        }
        else
        {
            echo $output;
        }
    }
}

if (! function_exists('BaseUrl')) 
{
    function BaseUrl($Uri = '', $return=FALSE)
    {
        $output = BASE . '/' . $Uri;
        if($return)
        {
            return $output;
        }
        else
        {
            echo $output;
        }
    }
}

if (! function_exists('isActiveUrl')) 
{
    function isActiveUrl($uri,$return=FALSE)
    {
        $CurrentUrl = CurrentURL(TRUE);
        $ActiveUrl = SiteUrl($uri,TRUE);
        $output = ''; 
        if(strpos($ActiveUrl,$CurrentUrl)!==FALSE)
        {
            $output = 'active';
        }
        if($return)
        {
            return $output;
        }
        else
        {
            echo $output;
        }
    }
}


if (! function_exists('Redirect')) 
{
    function Redirect($uri='')
    {
        $url = SiteUrl($uri,TRUE);
        header('location: ' . $url);
        exit();
    }
}

if (! function_exists('RandomString')) 
{
    function RandomString($len=6,$type='Alphanumeric') {
        if($type=='alpha')
        {
            $characters = 'abcdefghijklmnopqrstuvwxyz';
        }
        elseif($type=='Alpha')
        {
            $characters = 'abcdefghijklmnopqrstuvwxyz';
        }
        elseif($type=='ALPHA')
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        elseif($type=='AlphA')
        {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        elseif($type=='alphanumeric')
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        }
        elseif($type=='Alphanumeric')
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        }
        elseif($type=='ALPHAnumeric')
        {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        else
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        $RandomString = '';
    
        for ($i = 0; $i < $len; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $RandomString .= $characters[$index];
        }

        if($type=='Alpha' OR $type=='Alphanumeric')
        {
            $RandomString = ucfirst($RandomString);
        }
    
        return $RandomString;
    }
}