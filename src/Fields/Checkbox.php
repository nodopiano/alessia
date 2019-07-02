<?php

namespace Nodopiano\Alessia\Fields;

class Checkbox extends Field
{
    protected $type = 'checkbox';
    protected $value;

    public function value($value)
    {
        $this->value = $value;
        return $this;
    }

    public function meta()
    {
        return $this->value ? ['value' => $this->value] : [];
    }
}
