<?php

/** @test */

use App\Command;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    private $myClass;

    public function testCreateValidConstructor(){
        $this->myClass = new Command("W" , "5");
        $this->assertEquals(
            "W",
            $this->myClass->getAction()
        );
        $this->myClass = null;
    }
    public function testGetTrueSteps(){
        $this->myClass = new Command("W" , "5");
        $this->assertEquals(
            "5",
            $this->myClass->getSteps()
        );
        $this->myClass = null;
    }


    public function testGetTrueAction(){
        $this->myClass = new Command("W" , "5");
        $this->assertEquals(
            "W",
            $this->myClass->getAction()
        );
        $this->myClass = null;
    }








}

// for Testing one method in test file
//./vendor/bin/phpunit --filter testIsTheSameInput  tests/EmailTest
