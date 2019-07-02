<?php

namespace Nodopiano\Alessia\Fields;

class TextArea extends Field
{
    protected $type = 'textarea';

    public function oneline()
    {
        $this->oneline = true;
        return $this;
    }

    public function meta()
    {
        return $this->oneline ? ['oneline' => $this->oneline] : [];
    }
}
