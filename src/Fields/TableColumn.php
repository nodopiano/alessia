<?php

namespace Nodopiano\Alessia\Fields;

class TableColumn extends Field
{
    protected $type = 'column';
    protected $subtext = [];
    protected $link;
    protected $double = false;

    public function __construct($name)
    {
        $this->name = $name;
        $this->label = $name;
    }

    public function double($precision)
    {
        $this->double = $precision;
        return $this;
    }

    public function link($resource, $id)
    {
        $this->link = [
            'base' => $resource,
            'field' => $id
        ];
        return $this;
    }

    public function subtext(array $attributes)
    {
        $this->subtext = $attributes;
        return $this;
    }

    public function meta()
    {
        return array_filter([
            'link' => $this->link,
            'subtext' => $this->subtext,
            'double' => $this->double
        ]);
    }
}
