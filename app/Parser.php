<?php
namespace App;

use App\CommandList;
use App\Interfaces\CommandListInterface;
use App\Interfaces\ParserInterface;

class Parser implements ParserInterface
{
    private $movmentAndDirectionString;
    private $arrayOfLetters;

    function __construct(string $movmentAndDirectionString )
    {
        $this->movmentAndDirectionString = $movmentAndDirectionString;
    }

   public function getParserParam() :string
   {
       // TODO: Implement getParam() method.
       return $this->movmentAndDirectionString;
   }

   public function returnParserObject() :CommandListInterface
   {
       // TODO: Implement returnParser() method.
       $arrayOfLetters = array();
       $newCommandList = new CommandList();
       $index = 0;
       $chars = str_split($this->movmentAndDirectionString);
       if($chars){
           foreach ($chars as $char){
               if(in_array($char , ["L" , "R" , "W" , "B"])){
                   $index++;
                   $newMovement = self::countMovement($chars , $index);
                   $newCommand = new Command($char ,$newMovement['string']);
                   $newCommandList->addPlace($newCommand);
                   $index = $newMovement['index'];
               }
           }
       }
       return $newCommandList;
   }

   private function countMovement(Array $chars = [] ,int $index ){
        $string = '';
        if(count($chars) <= $index){
            return [
                'string' =>  1 ,
                'index' => $index
            ];
        }
        for($i = $index; $i<count($chars); $i++){
            if(in_array($chars[$i] ,["L","R" ,"W" , "B" ] )){
                return [
                    'string' => ($string != "") ? $string : 1 ,
                    'index' => $i
                ];
            }else{
                $string .= $chars[$i];
            }
        }
       return [
           'string' => $string,
           'index' => $i
       ];
   }
}
