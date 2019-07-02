<?php

namespace Nodopiano\Alessia\Fields;

class Text extends Field
{
    protected $type = 'text';
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
