<?php
namespace parser\parser;
require 'IParseFile.php';


use http\Exception;
use parser\parser\IParseFile;


class TextParser implements IParseFile
{
    private $file_path;
    function __construct($file_path)
    {
        $this->file_path = $file_path;

    }

    /**
     * @throws \Exception
     */
    function parse_file()
    {
        $arr = [];
        $file_info = pathinfo($this->file_path);
        if ($file_info['extension'] !== 'txt'){
            throw  new \Exception('The file must be a text file');

        }

        if (file_exists($this->file_path)){
            $file_handle = fopen($this->file_path, 'r');
            while (!feof($file_handle)){
                $line = fgets($file_handle);
                array_push($arr, $line);
            }
            fclose($file_handle);
            for ($i = 0; $i < sizeof($arr); ++$i){
                echo $i.'http://'.$arr[$i];
            }


        }else{
            throw new \Exception("File not found".$this->file_path);
        }
    }
}

