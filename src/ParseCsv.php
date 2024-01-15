<?php

namespace parser;

class ParseCsv
{

public function read_text()
{
    $file_handle = fopen("text.txt", "r");

    while (!feof($file_handle)) {
        $line = fgets($file_handle);
        var_dump($line."\n");
        if(preg_match('/^\d+/',$line)) {
            $tmp = preg_split('/\s+/', $line);
            var_dump($tmp);
            $rank = trim($tmp[0]);
            $url = trim($tmp[1]);
            if($url != 'Hidden profile') { # Hidden profile appears sometimes just ignore then
                echo $rank.' http://'.$url."/\n";
            }
        }
    }
    fclose($file_handle);

}
}

$parse = new ParseCsv();

$parse->read_text();