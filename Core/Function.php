<?php
defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');

if (! function_exists('Minifier')) 
{
    function Minifier($code) 
    {
        // $search = array(
        //     '/\>[^\S ]+/s',
        //     '/[^\S ]+\</s',
        //     '/(\s)+/s',
        //     '/<!--(.|\s)*?-->/'
        // );
        // $replace = array('>', '<', '\\1');
        // $code = preg_replace($search, $replace, $code);
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

if (! function_exists('ParseQuestionFillAnswer')) 
{
    function ParseQuestionFillAnswer($format, $arr) 
    { 
        $arr = explode("\n",$arr);
        $format = str_replace('[....]','<code>%s</code>',$format);
        call_user_func_array('printf', array_merge((array)$format, $arr)); 
    } 
}

if (! function_exists('ParseQuestionFillBlank')) 
{
    function ParseQuestionFillBlank($format, $arr) 
    { 
        $arr = explode("\n",$arr);
        $format = str_replace('[....]','%s',$format);
        call_user_func_array('printf', array_merge((array)$format, $arr)); 
    } 
}

if (! function_exists('TimeAgoIndonesia')) 
{
    function TimeAgoIndonesia($timestamp){  
        $time_ago = strtotime($timestamp);  
        $current_time = time();  
        $time_difference = $current_time - $time_ago;  
        $seconds = $time_difference;  
        $minutes      = round($seconds / 60 );        // value 60 is seconds  
        $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
        $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
        $weeks        = round($seconds / 604800);     // 7*24*60*60;  
        $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
        $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
        if($seconds <= 60) {  
        return "Baru saja";  
        } else if($minutes <=60) {  
        if($minutes==1){  
        return "Satu menit lalu";  
        }else {  
        return "$minutes menit lalu";  
        }  
        } else if($hours <=24) {  
        if($hours==1) {  
        return "Satu jam lalu";  
        } else {  
        return "$hours jam lalu";  
        }  
        }else if($days <= 7) {  
        if($days==1) {  
        return "kemarin";  
        }else {  
        return "$days hari lalu";  
        }  
        }else if($weeks <= 4.3) {  //4.3 == 52/12
        if($weeks==1){  
        return "Seminggu lalu";  
        }else {  
        return "$weeks minggu lalu";  
        }  
        } else if($months <=12){  
        if($months==1){  
        return "Sebulan lalu";  
        }else{  
        return "$months bulan lalu";  
        }  
        }else {  
        if($years==1){  
        return "Setahun lalu";  
        }else {  
        return "$years tahun lalu";  
        }  
        }  
    } 
}