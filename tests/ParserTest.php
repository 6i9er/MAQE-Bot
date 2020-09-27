<?php

/** @test */

use App\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    private $myClass;
    private $command;

    public function testGetParserParam(){
        $string = "W15W1RRW1L";
        $actualString = "W15W1RRW1L";
        $newParser = new Parser($string);
        $newParser->getParserParam();
        $this->assertEquals($actualString , $newParser->getParserParam());
    }


    public function testReturnParserObject(){
        $string = "W5RRW15R";
        $returnArray =  array(["W",5] ,["R",1] ,["R",1] ,["W",15] ,["R",1]  );
        $actualArray =  array();
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        foreach ($object->getPlaces() as $place){
            $objectArray = array();
            $objectArray[] = $place->getAction();
            $objectArray[] = $place->getSteps();
            $actualArray[] = $objectArray;
        }
        $this->assertEquals($returnArray , $actualArray);
    }
}

// for Testing one method in test file
//./vendor/bin/phpunit --filter testIsTheSameInput  tests/EmailTest
