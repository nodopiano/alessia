<?php

namespace Nodopiano\Alessia\Fields;

class Date extends Field
{
    protected $type = 'date';

    protected $format;

    public function format($format = 'd/m/Y')
    {
        $this->format = $format;
        return $this;
    }

    public function meta()
    {
        return $this->format ? ['format' => $this->format] : [];
    }
}
