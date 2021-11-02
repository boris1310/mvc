<?php

namespace boris1310\my_logger;

class Logger
{

    public static function setWarning($message,$log){
        $file = fopen($log,"a");
        fwrite($file,"[ " .date("h:i:s d.M.Y") . " ] \n ----Warning---- \n [".$message."] \n \n");
        fclose($file);
    }

    public static function setNotice($message,$log){
        $file = fopen($log,"a");
        fwrite($file,"[ " .date("h:i:s d.M.Y") . " ] \n ----Notice---- \n [".$message."] \n \n");
        fclose($file);
    }

    public static function setError($message,$log){
        $file = fopen($log,"a");
        fwrite($file,"[ " .date("h:i:s d.M.Y") . " ] \n ----Error---- \n [".$message."] \n \n");
        fclose($file);
    }

}

Logger::setError("Hello","current.log");