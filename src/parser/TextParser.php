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
        $file_info = pathinfo($this->file_path);
        if ($file_info['extension'] !== 'txt'){
            throw  new \Exception('The file must be a text file');

        }

        if (file_exists($this->file_path)){
            $file_handle = fopen($this->file_path, 'r');
            while (!feof($file_handle)){
                $line = fgets($file_handle);
                $t_line = trim($line);
                if (preg_match('/^\d+/', $t_line)){
                    if ($line[0] !== '#' ){
                        printf("line %s", $t_line);
                        var_dump(explode(".", $line));

                    }

                }
            }
            fclose($file_handle);


        }else{
            throw new \Exception("File not found".$this->file_path);
        }
    }
}

