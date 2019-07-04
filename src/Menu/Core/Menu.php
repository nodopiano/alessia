<?php

namespace Nodopiano\Alessia\Menu\Core;

class Menu implements \JsonSerializable
{
    protected $menu;

    public function __construct($items)
    {
        $this->menu = array_filter($items);
    }

    public static function items($items)
    {
        return new static($items);
    }

    public function jsonSerialize()
    {
        return array_filter($this->menu, function ($item) {
            return $item->allow();
        });
    }
}
