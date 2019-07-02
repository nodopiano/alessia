<?php

namespace Nodopiano\Alessia\Fields;

class Select extends Field
{
    protected $type = 'select';
    protected $options = [];
    protected $url = '';

    public function url($url)
    {
        $this->url = $url;
        return $this;
    }

    public function options($options)
    {
        $this->options = $options;
        return $this;
    }

    public function meta()
    {
        return array_filter([
            'options' => $this->options,
            'options_url' => $this->url
        ]);
    }
}
