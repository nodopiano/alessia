<?php

namespace Nodopiano\Alessia\Fields;

use JsonSerializable;

abstract class Field implements JsonSerializable
{
    protected $name;
    protected $type = '';
    protected $sortable = false;
    protected $readonly = false;
    protected $required = false;
    protected $label = false;
    protected $placeholder = false;
    protected $field = [];
    protected $value;
    protected $gate = true;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function make($name)
    {
        return new static($name);
    }

    public function sortable()
    {
        $this->sortable = true;
        return $this;
    }

    public function required()
    {
        $this->required = true;
        return $this;
    }

    public function gate($gate = true)
    {
        $this->gate = $gate;
        return $this;
    }

    public function readonly($readonly = true)
    {
        $this->readonly = $readonly;
        return $this;
    }

    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function jsonSerialize()
    {
        if (!$this->gate) {
            return null;
        }
        return array_merge([
            'type' => $this->type,
            'sortable' => $this->sortable,
            'label' => $this->label,
            'readonly' => $this->readonly,
            'required' => $this->required,
            'traverse' => $this->name,
            'placeholder' => $this->placeholder
        ], $this->meta());
    }

    public function meta()
    {
        return [];
    }
}
