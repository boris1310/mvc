<?php

<<<<<<< HEAD
//namespace boris1310\my_logger;
=======
namespace boris1310\my_logger;
>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd

class Logger
{

    public static function setWarning($message,$log){
        $file = fopen($log,"a");
        fwrite( $file ,"[ " .date("h:i:s d.M.Y") . " ] \n ----Warning---- \n [".$message."] \n \n");
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
