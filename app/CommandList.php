<?php
namespace App;

use App\Interfaces\CommandListInterface;

class CommandList implements CommandListInterface
{
    private $places = [];
    private $count = 0;
    private $index = 0;

    function __construct(){
    }

    public function current() :Command
    {
        return $this->places[$this->index];
    }

    public function next()
    {
        $this->index++;
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function key() :int
    {
        return $this->index;
    }

    public function valid() :bool
    {
        return isset($this->places[$this->key()]);
    }

    public function reverse()
    {
        $this->places = array_reverse($this->places);
        $this->rewind();
    }

    public function addPlace(Command $place)
    {
        array_push($this->places, $place);
        $this->count++;
    }

    public function removePlace(Command $place)
    {
        $index = array_search($place, $this->places);
        if(isset($this->places[$index])) {
            unset($this->places[$index]);
            $this->count--;
        }
    }

    public function getPlaces() :array
    {
        return $this->places;
    }

    public function totalCount() :int
    {
        return count($this->places);
    }
}
