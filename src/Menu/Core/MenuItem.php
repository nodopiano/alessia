<?php

namespace Nodopiano\Alessia\Menu\Core;

use JsonSerializable;

class MenuItem implements JsonSerializable
{
    protected $name;
    protected $url;
    protected $label;
    protected $icon;
    protected $gate = true;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function make($name)
    {
        return new static($name);
    }

    public function url($url)
    {
        $this->url = $url;
        return $this;
    }

    public function gate($gate = true)
    {
        $this->gate = $gate;
        return $this;
    }

    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function allow()
    {
        return $this->gate;
    }

    public function jsonSerialize()
    {
        if (!$this->gate) {
            return ;
        }
        return array_merge([
            'label' => $this->label,
            'url' => $this->url,
            'name' => $this->name,
            'icon' => $this->icon,
        ], $this->meta());
    }

    public function meta()
    {
        return [];
    }
}
