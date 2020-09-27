<?php

/** @test */

use App\CommandList;
use App\Command;
use App\Parser;
use App\Bot;
use PHPUnit\Framework\TestCase;

class BotTest extends TestCase
{
    private $myClass;
    private $command;

    public function testCreateInstance(){
        $this->myClass = new CommandList();
        $this->command = new Command("W" , 5);
        $this->assertInstanceOf(CommandList::class, $this->myClass);
    }

    public function testGetParser(){

        $string = "W5RRW15RLW10";
        $returnArray =  array(["W",5] ,["R",1] ,["R",1] ,["W",15] ,["R",1],["L",1],['W',10]  );
        $actualArray =  array();
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        //create object from Bot
        $newBot = new Bot($object);
        $parsers = $newBot->getParsers();
        foreach ($parsers->getPlaces() as $place){
            $objectArray = array();
            $objectArray[] = $place->getAction();
            $objectArray[] = $place->getSteps();
            $actualArray[] = $objectArray;
        }
        $this->assertEquals($returnArray , $actualArray);
    }



    public function testGetXAxis(){

        $string = "W5RRW15RLW10";
//        $expectedString = "X : 0 Y : -20 Direction : South";
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        //create object from Bot
        $newBot = new Bot($object);
        $newBot->executeBot();
        $this->assertEquals(0 ,$newBot->getXAxis());
    }

    public function testGetYAxis(){

        $string = "W5RRW15RLW10";
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        //create object from Bot
        $newBot = new Bot($object);
        $newBot->executeBot();
        $this->assertEquals(-20 ,$newBot->getYAxis());
    }

    public function testGetDirection(){

        $string = "W5RRRRW15RLW10B";
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        //create object from Bot
        $newBot = new Bot($object);
        $newBot->executeBot();
        $this->assertEquals("North" ,$newBot->getDirection());
    }

    public function testGetDirection1(){

        $string = "W5RBRWB15RBBLW10B";
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        //create object from Bot
        $newBot = new Bot($object);
        $newBot->executeBot();
        $this->assertEquals("South" ,$newBot->getDirection());
    }

    public function testGetDirection2(){

        $string = "W5RBRWB15RW1RRW1";
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        //create object from Bot
        $newBot = new Bot($object);
        $newBot->executeBot();
        $this->assertEquals("East" ,$newBot->getDirection());
    }

    public function testGetDirection3(){

        $string = "W5RBRWB15RW1RRW1LL";
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        //create object from Bot
        $newBot = new Bot($object);
        $newBot->executeBot();
        $this->assertEquals("West" ,$newBot->getDirection());
    }

    public function testGetDirection4(){

        $string = "W5RBRWB15RW1RRW1LLLL";
        $newParser = new Parser($string);
        $object = $newParser->returnParserObject();
        //create object from Bot
        $newBot = new Bot($object);
        $newBot->executeBot();
        $this->assertEquals("East" ,$newBot->getDirection());
    }

}

// for Testing one method in test file
//./vendor/bin/phpunit --filter testIsTheSameInput  tests/EmailTest
