<?php
namespace App;

use App\Interfaces\CommandInterface;

class Command implements CommandInterface
{
    private $action;
    private $steps = 1;

    public function __construct(string $action ,int $steps)
    {
        
        $this->action = $action;
        $this->steps = $steps;

    }

    public function getAction() :string
    {
        // TODO: Implement getAction() method.
        return $this->action;
    }

    public function getSteps() :int
    {
        // TODO: Implement getSteps() method.
        return $this->steps;
    }
}
