<?php
namespace App;

use App\Interfaces\BotInterface;
use App\Interfaces\CommandListInterface;
use App\Helpers\DirectionHelpers;

class Bot  implements BotInterface
{
    private $parsers;
    private $xAxis = 0;
    private $yAxis = 0;
    private $currentDirection = "N";
    private $lastDirection = "N";
    function __construct(CommandListInterface $commands)
    {
        $this->parsers = $commands;
    }

    public function getParsers() :CommandListInterface
    {
        // TODO: Implement getParam() method.
        return $this->parsers;
    }

    public function getXAxis(): int
    {
        // TODO: Implement getXAxis() method.
        return $this->xAxis;
    }

    public function getYAxis(): int
    {
        // TODO: Implement getXAxis() method.
        return $this->yAxis;
    }

    public function getDirection(): string
    {
        // TODO: Implement getDirection() method.
        return DirectionHelpers::DIRECTIONS[$this->currentDirection];
    }

    public function executeBot()
    {
        // TODO: Implement executeBot() method.
        foreach ( $this->parsers->getPlaces() as $place){
            $action = $place->getAction();
            $steps = $place->getSteps();
            switch ($place->getAction()) {
                case "R":
                    if($this->lastDirection == DirectionHelpers::NORTH){
                        $this->currentDirection = DirectionHelpers::EAST;
                        $this->lastDirection = DirectionHelpers::EAST;
                    }elseif ($this->lastDirection == DirectionHelpers::EAST){
                        $this->currentDirection = DirectionHelpers::SOUTH;
                        $this->lastDirection = DirectionHelpers::SOUTH;
                    }elseif ($this->lastDirection == DirectionHelpers::SOUTH){
                        $this->currentDirection = DirectionHelpers::WEST;
                        $this->lastDirection = DirectionHelpers::WEST;
                    }elseif ($this->lastDirection == DirectionHelpers::WEST){
                        $this->currentDirection = DirectionHelpers::NORTH;
                        $this->lastDirection = DirectionHelpers::NORTH;
                    }
                    break;
                case "L":
                    if($this->lastDirection == DirectionHelpers::NORTH){
                        $this->currentDirection = DirectionHelpers::WEST;
                        $this->lastDirection = DirectionHelpers::WEST;
                    }elseif ($this->lastDirection == DirectionHelpers::WEST){
                        $this->currentDirection = DirectionHelpers::SOUTH;
                        $this->lastDirection = DirectionHelpers::SOUTH;
                    }elseif ($this->lastDirection == DirectionHelpers::SOUTH){
                        $this->currentDirection = DirectionHelpers::EAST;
                        $this->lastDirection = DirectionHelpers::EAST;
                    }elseif ($this->lastDirection == DirectionHelpers::EAST){
                        $this->currentDirection = DirectionHelpers::NORTH;
                        $this->lastDirection = DirectionHelpers::NORTH;
                    }
                    break;
                case "W":
                    if($this->currentDirection == DirectionHelpers::NORTH){
                        $this->yAxis += $place->getSteps();
                    }elseif ($this->currentDirection == DirectionHelpers::WEST){
                        $this->xAxis -= $place->getSteps();
                    }elseif ($this->currentDirection == DirectionHelpers::SOUTH){
                        $this->yAxis -= $place->getSteps();
                    }elseif ($this->currentDirection == DirectionHelpers::EAST){
                        $this->xAxis += $place->getSteps();
                    }
                    break;
                case "B":
                    if($this->currentDirection == DirectionHelpers::NORTH){
                        $this->yAxis -= $place->getSteps();
                    }elseif ($this->currentDirection == DirectionHelpers::WEST){
                        $this->xAxis += $place->getSteps();
                    }elseif ($this->currentDirection == DirectionHelpers::SOUTH){
                        $this->yAxis += $place->getSteps();
                    }elseif ($this->currentDirection == DirectionHelpers::EAST){
                        $this->xAxis -= $place->getSteps();
                    }
                    break;
                default:
            }
        }
//        return "X : " . $this->xAxis . " Y : " . $this->yAxis .
//            " Direction : " . DirectionHelpers::DIRECTIONS[$this->currentDirection];
    }
}
