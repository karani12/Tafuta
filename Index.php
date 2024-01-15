<?php

require __DIR__.'/src/parser/TextParser.php';

use parser\parser\TextParser;
const file_path = __DIR__.'/text.txt';
$text_parser = new TextParser(file_path);
try {
    $text_parser->parse_file();
} catch (Exception $e) {
    print $e;
}
