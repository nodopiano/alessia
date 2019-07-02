<?php

namespace Nodopiano\Alessia\Fields;

class Double extends Number
{
    protected $type = 'double';

    protected $precision = 0.1;

    public function precision($precision)
    {
        $this->precision = $precision;
        return $this;
    }

    public function meta()
    {
        return $this->precision ? ['precision' => $this->precision] : [];
    }
}
