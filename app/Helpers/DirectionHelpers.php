<?php

namespace App\Helpers;

class DirectionHelpers
{
    const RIGHT = "R";
    const LEFT = "L";
    const WALK = "W";
    const NORTH = "N";
    const SOUTH = "S";
    const EAST = "E";
    const WEST = "W";
    const N = "North";
    const S = "South";
    const E = "East";
    const W = "West";
    const DIRECTIONS = array(
        "W" => "West",
        "S" => "South",
        "E" => "East",
        "N" => "North",
    );
    const ACTIONS = array(
        "1" => "W",
        "2" => "L",
        "3" => "R",
        "R" => 3,
        "L" => 2,
        "W" => 1,
    );
}
