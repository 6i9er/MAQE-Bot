<?php
namespace App\Interfaces;

use Iterator;

interface CommandListInterface extends Iterator
{
    function __construct();
    public function getPlaces() :array;
    public function totalCount() :int;
}
