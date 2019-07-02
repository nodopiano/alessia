<?php

namespace Nodopiano\Alessia\Actions;

use JsonSerializable;

abstract class Action implements JsonSerializable
{
    protected $type = 'action';
    protected $icon = '';
    protected $color = '';
    protected $label = 'action';
    protected $text = '';
    protected $title = '';
    protected $on_success = '';
    protected $update;
    protected $url;
    protected $method = 'post';
    protected $resource;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function make($name)
    {
        return new static($name);
    }

    public function color($color)
    {
        $this->color = $color;
        return $this;
    }

    public function url($url)
    {
        $this->url = $url;
        return $this;
    }

    public function text($text)
    {
        $this->text = $text;
        return $this;
    }

    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    public function update($update)
    {
        $this->update = $update;
        return $this;
    }

    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    public function gate($gate = true)
    {
        $this->gate = $gate;
        if (!$this->gate) {
            return;
        }
        return $this;
    }

    public function method($method)
    {
        $this->method = $method;
        return $this;
    }

    public function resource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    public function when($traverse, $condition = '', $compare = '', $not = false)
    {
        $this->when = [
            'traverse' => $traverse,
            'condition' => $condition,
            'compare' => $compare,
            'not' => $not
        ];
        return $this;
    }

    public function jsonSerialize()
    {
        return array_merge([
            'type' => $this->type,
            'label' => $this->label,
            'traverse' => $this->name,
            'url' => $this->url,
            'method' => $this->method,
            'resource' => $this->resource,
            'show_if' => $this->when,
            'update' => $this->update,
            'color' => $this->color,
            'title' => $this->title,
            'text' => $this->text,
            'icon' => $this->icon
        ], $this->meta());
    }

    public function meta()
    {
        return [];
    }
}
