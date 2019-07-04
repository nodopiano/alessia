<?php

namespace Nodopiano\Alessia\Menu;

class MenuList implements \JsonSerializable
{
    public static function make($items)
    {
        return new static($items);
    }

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function get($item)
    {
        if (array_key_exists($item, $this->items)) {
            return $this->items[$item];
        }
        return [];
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
}
