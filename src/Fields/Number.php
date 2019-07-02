<?php

namespace Nodopiano\Alessia\Fields;

class Number extends Field
{
    protected $type = 'number';
    protected $append = '';

    public function append($append)
    {
        $this->append = $append;
        return $this;
    }

    public function meta()
    {
        return $this->append ? ['append' => $this->append] : [];
    }
}
