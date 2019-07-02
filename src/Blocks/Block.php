<?php

namespace Nodopiano\Alessia\Blocks\Block;

use JsonSerializable;

abstract class Block implements JsonSerializable
{
    protected $name;
    protected $label;
    protected $fields = [];
    protected $type;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function make($name)
    {
        return new static($name);
    }

    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    public function fields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function jsonSerialize()
    {
        return array_merge([
            'label' => $this->label,
            'type' => $this->type,
            'fields' => $this->fields
        ], $this->meta());
    }

    public function meta()
    {
        return [];
    }
}
