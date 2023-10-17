<?php

class Controls
{
    public static function redirectTo($url)
    {
        header('Location: ' . $url);
        exit();
    }
}



?>