<?php
namespace App\Interfaces;


interface CommandInterface
{
    function __construct(string $action ,int $steps);
//    public function setCommand(string $command);
    public function getAction() :string;
    public function getSteps() :int;
}
