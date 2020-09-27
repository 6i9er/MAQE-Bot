<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Bot;
use App\Parser;

$fileName = $argv[1];
//$parser = new Parser($argv[1]);
//$newBot = new Bot($parser->returnParserObject());
//print_r($newBot->getParsers());
//print_r($newBot->executeBot());

//
$inputArray = array();
if ($fh = fopen($fileName, 'r')){
    while (!feof($fh)) {
        array_push($inputArray , fgets($fh));
    }
    fclose($fh);
}

$newFile = fopen('uploads/section3.out' , 'w');
$index = 0;
foreach ($inputArray as $botCommandList){
    if($index != "0"){
        $parser = new Parser(str_replace(array("\n", "\r") , '' , $botCommandList));
        $newBot = new Bot($parser->returnParserObject());
        $executionString = $newBot->executeBot();
        $string = "Case #1: X: ".$newBot->getXAxis()." Y: ".$newBot->getYAxis()." Direction: ".$newBot->getDirection();
        fwrite($newFile, $string."\n");
    }
    $index++;
//print_r($newBot->getParsers());
//print_r($newBot->executeBot());
}
fclose($newFile);

