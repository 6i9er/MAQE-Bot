<?php
namespace App\Interfaces;

interface BotInterface
{
    function __construct(CommandListInterface $movmentAndDirectionString);
//    public function getArgs();
    public function getParsers() :CommandListInterface;
    public function executeBot() ;
    public function getXAxis():int;
    public function getYAxis():int;
    public function getDirection():string;
}
