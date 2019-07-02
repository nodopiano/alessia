<?php

namespace Nodopiano\Alessia\Factories;

use App;

class Page
{
    public function __construct(String $resource, String $item = null, String $action = 'index')
    {
        return self::make($resource, $item, $action);
    }

    public static function make(String $resource, String $item = null, String $action = 'index')
    {
        $class = 'App\\Pages\\' . ucfirst($resource) . '\\' . ucfirst($action);
        $instance = App::makeWith($class, ['item' => $item ]);
        return $instance;
    }
}
