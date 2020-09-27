<?php
namespace App\Interfaces;

interface ParserInterface
{
//    function __construct();
    function __construct(string $movmentAndDirectionString );
    public function getParserParam() :string;
    public function returnParserObject():CommandListInterface;
}
