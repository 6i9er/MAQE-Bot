<?php

/** @test */

use App\Command;
use App\CommandList;
use PHPUnit\Framework\TestCase;

class CommandListTest extends TestCase
{
    private $myClass;
    private $command;

    public function testAppendNewCommandListInstance(){
        $this->myClass = new CommandList();
        $this->command = new Command("W" , 5);
        $this->assertInstanceOf(CommandList::class, $this->myClass);
    }

    public function testAddPlaces(){
        $this->myClass = $this->createMock(CommandList::class);
        $this->command = new Command("W" , 5);
        $this->assertEquals( ''  , $this->myClass->addPlace($this->command));
    }


//    public function testTotalCount(){
//        $stub = $this->createMock(CommandList::class);
//        $this->command = new Command("W" , 5);
//        $new_array = [];
//        $new_array [] = $stub->addPlace($this->command);
//        $new_array [] = $stub->addPlace(new Command("R" , 1));
//        $new_array[] =$stub->addPlace(new Command("W" , 11));
//        $this->assertEquals( '3'  , count($new_array) );
//    }

    public function testTotalCount(){
        $newCommandList = new CommandList();
        $this->command = new Command("W" , 5);
        $newCommandList->addPlace($this->command);
        $newCommandList->addPlace(new Command("R" , 1));
        $this->assertEquals( '2'  , $newCommandList->totalCount() );
    }

    public function testGetCurrent(){
        $expectedArray = array(["W" , 5]);
        $newCommandList = new CommandList();
        $this->command = new Command("W" , 5);
        $newCommandList->addPlace($this->command);
        $newCommandList->addPlace(new Command("R" , 1));
        $current = $newCommandList->current();
        $actualArray = array([$current->getAction() , $current->getSteps()]);
        $this->assertEquals( $expectedArray  , $actualArray);
    }

    public function testGetNext(){
        $expectedArray = array(["R" , 1]);
        $newCommandList = new CommandList();
        $newCommandList->addPlace(new Command("W" , 5));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->next();
        $current = $newCommandList->current();
        $actualArray = array([$current->getAction() , $current->getSteps()]);
        $this->assertEquals( $expectedArray  , $actualArray);
    }

    public function testRewind(){
        $expectedArray = array(["W" , 5]);
        $newCommandList = new CommandList();
        $newCommandList->addPlace(new Command("W" , 5));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->next();
        $newCommandList->rewind();
        $current = $newCommandList->current();
        $actualArray = array([$current->getAction() , $current->getSteps()]);
        $this->assertEquals( $expectedArray  , $actualArray);
    }

    public function testGETKey(){
        $newCommandList = new CommandList();
        $newCommandList->addPlace(new Command("W" , 5));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->addPlace(new Command("W" , 10));
        $newCommandList->next();
        $newCommandList->next();
        $newCommandList->next();
        $currentKey = $newCommandList->key();
        $this->assertEquals( 3  , $currentKey);
    }
    public function testIsValidKey(){
        $newCommandList = new CommandList();
        $newCommandList->addPlace(new Command("W" , 5));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->addPlace(new Command("W" , 10));
        $newCommandList->next();
        $newCommandList->next();
        $newCommandList->next();
        $newCommandList->next();
        $currentKey = $newCommandList->valid();
        $this->assertFalse( $currentKey);
    }

    public function testReverseArray(){
        $expectedArray = array(["W" , 25]);
        $newCommandList = new CommandList();
        $newCommandList->addPlace(new Command("W" , 5));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->addPlace(new Command("W" , 10));
        $newCommandList->addPlace(new Command("W" , 25));
        $newCommandList->reverse();
        $current = $newCommandList->current();
        $actualArray = array([$current->getAction() , $current->getSteps()]);
        $this->assertEquals( $expectedArray , $actualArray);
    }

    public function testRemoveCommand(){
        $expectedCount = 4;
        $expectedArray = array(["W" , 25]);
        $deleteCommand = new Command("W" , 112);
        $newCommandList = new CommandList();
        $newCommandList->addPlace(new Command("W" , 5));
        $newCommandList->addPlace(new Command("R" , 1));
        $newCommandList->addPlace(new Command("W" , 112));
        $newCommandList->addPlace(new Command("W" , 10));
        $newCommandList->addPlace(new Command("W" , 25));
        $newCommandList->removePlace($deleteCommand);
        $actualCount = $newCommandList->totalCount();
            $this->assertEquals( $expectedCount , $actualCount);
    }


}

// for Testing one method in test file
//./vendor/bin/phpunit --filter testIsTheSameInput  tests/EmailTest
